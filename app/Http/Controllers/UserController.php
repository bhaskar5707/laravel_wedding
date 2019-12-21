<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB,Mail;
use App\User;use App\OurStory; use App\GuestBookAlbum;use App\WeddingCeremony;use App\WeddingBlog;use App\GuestBookGroup;use App\GuestBook;use App\AblumPhotoComment;
use App\WeddingBlogComment;
use Illuminate\Support\Facades\Validator;
use Auth;use Image;
use Config, \Crypt, Session,Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{ 
    public function couple_dashboard() 
    { 
    	$user = User::where('id', Auth::user()->id)->first();
    	$data['user']=$user;
        return View('front.wedding_planner.couple.couple-dashboard',$data);
    }

    public function updateUser(Request $request, $id)
    { 
        $data = User::findOrFail($id);
        $this->validate($request, [
            'ownerName' => 'required',
            'partnerName' => 'required',
            'wedding_date' => 'required',  
            //'foto_owner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',   
            
        ]);
        if($request->hasfile('foto_owner'))
        {
            $oldImage = $data->profile_img;
            $image = $request->file('foto_owner');
            $foto_owner_name = $data->id. "_couple_" .$image->getClientOriginalName();
            $image->move(public_path().'/front/wedding_planner/image/couple/', $foto_owner_name);   
            $data->profile_img = $foto_owner_name;       
            
            if ($oldImage) {
                if (file_exists(public_path('/front/wedding_planner/image/couple/' . $oldImage))) {
                    unlink(public_path('/front/wedding_planner/image/couple/' . $oldImage));
                } 
            }  
            //dd($foto_owner_name,$request->all());
        }
        //dd($request->all(),$id);
        $fullname           = explode(' ', $request->ownerName);
        $data->first_name   = $fullname[0];
        unset($fullname[0]);
        $data->last_name    = implode(' ', $fullname);
        $data->name         = $request->ownerName;
        $data->wedding_date = $request->wedding_date;
        $data->provider_id  = $request->suProvider_id;
        $data->provider     = $request->suProvider;        
        $data->gender       = $request->user_gender;
        $data->save();
        
        /*  Add partner */
        
        $partnerData = ($data->partner_id > 0) ? User::findOrFail($data->partner_id) : new User();
        $fullname = explode(' ', $request->partnerName);
        $partnerData->first_name = $fullname[0];
        unset($fullname[0]);
        $partnerData->last_name = implode(' ', $fullname);
        $partnerData->name = $request->partnerName;
        $partnerData->wedding_date = $request->wedding_date;
        $partnerData->provider_id = $request->suProvider_id;
        $partnerData->provider = $request->suProvider;
        //dd($fullname,$data->first_name, $data->last_name,$fullname);
        $partnerData->partner_id     = $data->id;
        $partnerData->partner_email     = $data->email;
        $partnerData->gender     = $request->partner_gender;
        if($request->hasfile('foto_partner'))
        {
            $oldImage = $partnerData->profile_img;
            $image = $request->file('foto_partner');
            $foto_partner_name = $data->partner_id. "_couple_" .$image->getClientOriginalName();
            $image->move(public_path().'/front/wedding_planner/image/couple/', $foto_partner_name);  
            $partnerData->profile_img = $foto_partner_name; 
            
            if ($oldImage) {
                if (file_exists(public_path('/front/wedding_planner/image/couple/' . $oldImage))) {
                    unlink(public_path('/front/wedding_planner/image/couple/' . $oldImage));
                }
            }         
        } 
        $partnerData->save();
        
        $data->update(['partner_id'=>$partnerData->id, 'partner_email'=>$partnerData->email]);
        //dd($data,$partnerData);
        return redirect()->back();
    }
    public function partner_invitation(Request $request)
    {
        $userId = Auth::user()->id;        
        $this->validate($request,['mail' => 'required|email|unique:users,email']);
        $update = User::where('id',$userId)->update(['partner_email'=>$request->mail]);
        if($update){            
            $linkUrl = url('/couple-registration/'.Crypt::encrypt($userId));               
            $url = "<h2> Please follow the bellow link to verify </h2><br><a href='$linkUrl'>Click</a>";  echo $url;die;          
            \Mail::send([], [], function ($message) use($url){
             $message->from(Auth::user()->email, 'Taiyaariyaan');
             $message->to(request('mail'))
             ->subject('Verify Your Email !!!!!')             
             ->setBody('<h1>Hi, Welcome To Tayaariyan!</h1><br>'.$url, 'text/html'); // for HTML rich messages
            });
            
            //return view('mailsend')->with('userid',$userId)->with('url',$url);
            return redirect()->back()->with('success_message','Check Your Email inbox for forthur Process!');
        }       
            
        return redirect()->back()->with('error_code', 'Something goes wrong');
    }
           ####################################
    ################ Wedding Website #################
           ####################################


    ############### Couple/Guest Album #################

    public function couple_album()
    {
        $userid = Auth::user()->id;
        $userData = User::find($userid); //echo $userData->partner;die; print_r($userData);die;
        $partnerData = isset($userData->partner) ? $userData->partner : [];
        $userAlbum = GuestBookAlbum::with('guest')->where(['user_id'=>$userid])->get();
         
        $guest  = GuestBook::with('albums')->where('user_id',$userid)->get(); 
        $guestCount = DB::table('guest_book_album')
                        ->select(DB::raw('count(*) as guest_count, guest_id'))
                        ->where('user_id', $userid)
                        ->groupBy('guest_id')
                        ->get();
                        //GuestBookAlbum
        //dd($UserId,$guestCount->count());
        return view('front.wedding_planner.couple.couple-dashboard-album')->with(compact('userData','partnerData','userAlbum','guest','guestCount'));
    }

    function editAblumUrl(Request $request , $id = null)
    {
        $UserId = Auth::user()->id;
        $userData = User::where(['id'=>$UserId])->first();
        $partnerData = User::where(['partner_id'=>$UserId])->first();
        $userAlbum = GuestBookAlbum::with('guest')->where(['user_id'=>$UserId])->get();
        if($request->isMethod('post'))
        {
            $this->validate($request,['album_url'=>'nullable|alpha_dash|max:200']);
            $data = $request->all(); //echo "<pre>";print_r($data);die;
            User::where(['id'=>$id])->update(['album_url'=>$data['album_url'],'website'=>$data['album_url']]);
            return redirect()->back()->with('flash_message_success','Album url has been update successfully');
        }
        $guest  = GuestBook::with('albums')->where('user_id',$UserId)->get(); 
        $guestCount = DB::table('guest_book_album')
                        ->select(DB::raw('count(*) as guest_count, guest_id'))
                        ->where('user_id', $UserId)
                         ->groupBy('guest_id')
                         ->get();
        return view('front.wedding_planner.couple.couple-dashboard-album-edit')->with(compact('userData','partnerData','userAlbum','guest','guestCount'));
    }

    public function verifyGuest(Request $request , $user_name = null ,$id=null)
    {
       //dd($id);
        $user_id = $id;
        Session::put('UserId', $user_id);
        return View('front.wedding_planner.pages.verify-guest')->with(compact('user_id'));
    }
    public function ChechGuestMobileNumber(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all();
            $mobile= $data['mobile'];
            $guestDetails = GuestBook::where('mobile',$data['mobile'])->first();
            if(!$guestDetails){
                $mobile = Auth::user()->phone;
            }
            $usersCount = ($guestDetails) ? $guestDetails->count() : Auth::user()->phone;

            if($usersCount > 0)
            {
                $otp = 1234;
                Session::put('MobileNumber', $mobile);
                Session::put('VerificationCode', $otp);
                Session::put('GuestId', isset($guestDetails->id) ? $guestDetails->id : 0);
                if(isset($guestDetails->id)){
                    GuestBook::where(['mobile'=>$mobile])->update(['otp'=>$otp]);
                }else{
                    User::find(Auth::user()->id)->update(['otp'=>$otp]);
                }
                
                return View('front.wedding_planner.pages.verify-guest-otp');

            }
            else
            {
                return redirect()->back()->with('flash_message_error','Sorry mobile number not found');
            }
        }
        return View('front.wedding_planner.pages.verify-guest-otp');
    }

    public function ChechVerificationCode(Request $request)
    {
        //$GuestId = GuestBook::where('mobile',Session::get('MobileNumber'))->first(); 
        $GuestId = GuestBook::where('mobile','9910625707')->first(); 
        //print_r($GuestId);die;
        $guestalbum = GuestBookAlbum::where('guest_id',$GuestId->id)->get(); 
        if($request->isMethod('post'))
        {
            $data= $request->all(); 
            $otp = Session::get('VerificationCode');//echo $otp;die;
            $mobile = Session::get('MobileNumber');
                //dd($data['otp']);
            $otpNumber = (int)$data['otp'];
            //dd($otp,$otpNumber);
            if($otp != $otpNumber)
            {
                return redirect()->back()->with('flash_message_error','Sorry you have wrong verification code');
            }
            else
            {
                GuestBook::where(['mobile'=>$mobile])->update(['otp'=>0]);
                return View('front.wedding_planner.pages.guest-upload-ablum-photo',compact('guestalbum'));
            }
        }
        //return View('pages.guest-upload-ablum-photo');
        return View('front.wedding_planner.pages.guest-upload-ablum-photo',compact('guestalbum'));
    }

    public function fileStore(Request $request)
    { 
        $vendor_id = Auth::guard('vendor')->id();
        $image = $request->file('file');
        //print_r($image);die;
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('front/wedding_planner/image/guest_album'),$imageName);
          
        $img = Image::make(public_path('front/wedding_planner/image/guest_album/'.$imageName));  
        $img->text('Tayariyan ', 300, 200);  
        $img->save(public_path('front/wedding_planner/image/guest_album/'.$imageName));  
          
        $UserId = Session::get('UserId');
        $GuestId = Session::get('GuestId');
        $sd = GuestBookAlbum::insert(['filename'=>$imageName,'title'=>'','description'=>'','user_id'=>$UserId,'guest_id'=>$GuestId]);
         
        return response()->json(['status'=>true,'message'=>'Image(s) Uploaded.']);              
    }

    public function fileDestroy(Request $request)
    {
        //dd($request->all());
        $filename =  $request->get('filename');
        GuestBookAlbum::where('filename',$filename)->delete();
        $path=public_path().'/front/wedding_planner/image/guest_album/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

     public function guestPhotoDelete($id=null)
    {
        $photo = GuestBookAlbum::find($id);
        $path = public_path('/front/wedding_planner/image/guest_album/'.$photo->filename);
        GuestBookAlbum::where('id',$id)->delete();
        if (file_exists($path)) {
            unlink($path);
        } 
        return redirect()->back();
    }

    public function album_download($name)
    {
        $zip_file = $name.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = public_path('ront/wedding_planner/image/guest_album/'); //dd($path);
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'guest_album/' . substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }


    ############### Couple/Guest Album #################


    public function couple_website()
    {
        $user = Auth::user();
        $websitelink =  $user->website;
        if(empty($user->website)){
            $first = $user->first_name;
            $second = isset($user->partner->first_name)?$user->partner->first_name:'';
            $user->update(['website'=>$first.'-'.$second.'-'.$user->id]);
        }
        if(empty($user->album_url)){
            $first = $user->first_name;
            $second = isset($user->partner->first_name)?$user->partner->first_name:'';
            $user->update(['album_url'=>$first.'-'.$second.'-'.$user->id]);
        }
        return View('front.wedding_planner.couple.couple-dashboard-website')->with(compact('websitelink'));
    }
   
            ############ Our Story ##########

    public function our_story_list(Request $request ,$template_id=null)
    {
        $UserId = Auth::user()->id;
        $partnetId = User::where(['id'=>$UserId])->first();
        $partnetId =  $partnetId->id;
        $ourList = OurStory::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();

        User::where(['id'=>$UserId])->update(['website_template'=>$template_id]);

        return view('front.wedding_planner.couple.couple-dashboard-our-story-list')->with(compact('ourList'));
    }
    public function our_story()
    {
        $UserId = Auth::user()->id;
        $userData = User::where(['id'=>$UserId])->first();
        $partnerData = User::where(['partner_id'=>$UserId])->first();
        return view('front.wedding_planner.couple.couple-dashboard-our-story')->with(compact('userData','partnerData'));
    }
    public function add_our_story(Request $request )
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo '<pre>';
            //print_r($data);die;
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-our-story')->with('flash_message_error','Please fill all required filed');
            }
            $ourstory = new OurStory;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/our_story/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/our_story/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/our_story/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $ourstory->image = $filename;
                }
            }
            $ourstory->user_id=$UserId;
            $ourstory->title= $data['title'];
            $ourstory->our_story_date= $data['date'];
            $ourstory->description= $data['description'];
            $ourstory->save();
            return redirect('/couple-dashboard-our-story')->with('flash_message_success','Our story has been created successfully');
        }
    }

    public function editOurStory(Request $request , $id = null)
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo '<pre>';
            //print_r($data);die;
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-our-story')->with('flash_message_error','Please fill all required filed');
            }
            $ourstory = new OurStory;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    /* Delete Old File */
                    $OurStoryImage = OurStory::find($id);
        
                    //echo $OurStoryImage->image;die;
                    $large_image_path = public_path("front/wedding_planner/image/couple/our_story/large/");
                    $medium_image_path = public_path("front/wedding_planner/image/couple/our_story/medium/");
                    $small_image_path = public_path("front/wedding_planner/image/couple/our_story/small/");
        
                    if(file_exists($large_image_path.$OurStoryImage->image)){
                       unlink($large_image_path.$OurStoryImage->image);
                    }
                    if(file_exists($medium_image_path.$OurStoryImage->image)){
                       unlink($medium_image_path.$OurStoryImage->image);
                    }
                    if(file_exists($small_image_path.$OurStoryImage->image)){
                       unlink($small_image_path.$OurStoryImage->image);
                    }

                    
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/our_story/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/our_story/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/our_story/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $ourstory->image = $filename;
                }
            }
            else
            {
                $filename = $data['oldImage'];
            }

            ourstory::where(['id'=>$id])->update(['title'=>$data['title'],'description'=>$data['description'],'our_story_date'=>$data['date'],'image'=>$filename]);
            return redirect('/couple-dashboard-our-story-list/1')->with('flash_message_success','Our story has been updated successfully');
        }
        $ourStory = OurStory::where(['id'=>$id])->first();
        //dd($ourStory);
        return view('front.wedding_planner.couple.couple-dashboard-our-story-edit')->with(compact('ourStory'));
    }

    function deleteOurStory(Request $request , $id = null)
    {
        if(!empty($id))
        {
            
            $OurStoryImage = OurStory::where(['id'=>$id])->first();

            //echo $OurStoryImage->image;die;
            $large_image_path = public_path("front/wedding_planner/image/couple/our_story/large/");
            $medium_image_path = public_path("front/wedding_planner/image/couple/our_story/medium/");
            $small_image_path = public_path("front/wedding_planner/image/couple/our_story/small/");

            if(file_exists($large_image_path.$OurStoryImage->image)){
               unlink($large_image_path.$OurStoryImage->image);
            }
            if(file_exists($medium_image_path.$OurStoryImage->image)){
               unlink($medium_image_path.$OurStoryImage->image);
            }
            if(file_exists($small_image_path.$OurStoryImage->image)){
               unlink($small_image_path.$OurStoryImage->image);
            }

            OurStory::where(['id'=>$id])->delete();

            return redirect('/couple-dashboard-our-story-list/1')->with('flash_message_success','Data deleted successfully');
        }
    }

               ############ Our Story ##########
 
               ############ Wedding Ceremony ##########
    public function wedding_ceremony()
    {
        $UserId = Auth::user()->id;
        $userData = User::where(['id'=>$UserId])->first();
        $partnerData = User::where(['partner_id'=>$UserId])->first();
        return view('front.wedding_planner.couple.couple-dashboard-wedding-ceremony')->with(compact('userData','partnerData'));
    }
    public function wedding_ceremony_list()
    {
        $UserId = Auth::user()->id;
        $partnetId = User::where(['partner_id'=>$UserId])->first();
        $partnetId =  $partnetId->id;
        $weddingCeremony = WeddingCeremony::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        return view('front.wedding_planner.couple.couple-dashboard-wedding-ceremony-list')->with(compact('weddingCeremony'));
    }
    public function add_wedding_ceremony(Request $request )
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo '<pre>';
            //print_r($data);die;
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-wedding-ceremony')->with('flash_message_error','Please fill all required filed');
            }
            $weddingceremony = new WeddingCeremony;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $weddingceremony->image = $filename;
                }
            }
            $weddingceremony->user_id=$UserId;
            $weddingceremony->title= $data['title'];
            $weddingceremony->date= $data['date'];
            $weddingceremony->description= $data['description'];
            $weddingceremony->save();
            return redirect('/couple-dashboard-wedding-ceremony')->with('flash_message_success','Wedding Ceremony has been created successfully');
        }
    }

    public function editwedding_ceremony(Request $request , $id = null)
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-wedding-ceremony-list')->with('flash_message_error','Please fill all required filed');
            }
            $weddingceremony = new WeddingCeremony();
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    
                    $WeddingCeremonyImage = WeddingCeremony::find($id);

                    //echo $WeddingCeremonyImage->image;die;
                    $large_image_path   = public_path("front/wedding_planner/image/couple/wedding_ceremony/large/");
                    $medium_image_path  = public_path("front/wedding_planner/image/couple/wedding_ceremony/medium/");
                    $small_image_path   = public_path("front/wedding_planner/image/couple/wedding_ceremony/small/");
        
                    if(file_exists($large_image_path.$WeddingCeremonyImage->image)){
                       unlink($large_image_path.$WeddingCeremonyImage->image);
                    }
                    if(file_exists($medium_image_path.$WeddingCeremonyImage->image)){
                       unlink($medium_image_path.$WeddingCeremonyImage->image);
                    }
                    if(file_exists($small_image_path.$WeddingCeremonyImage->image)){
                       unlink($small_image_path.$WeddingCeremonyImage->image);
                    }
            
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;

                    $large_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/wedding_ceremony/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $weddingceremony->image = $filename;
                }
            }
            else
            {
                $filename = $data['oldImage'];
            }

            WeddingCeremony::where(['id'=>$id])->update(['title'=>$data['title'],'description'=>$data['description'],'date'=>$data['date'],'image'=>$filename]);
            return redirect('/couple-dashboard-wedding-ceremony-list')->with('flash_message_success','Wedding Ceremony has been updated successfully');
        }
        $weddingceremony = WeddingCeremony::where(['id'=>$id])->first();
        //dd($ourStory);
        return view('front.wedding_planner.couple.couple-dashboard-wedding-ceremony-edit')->with(compact('weddingceremony'));
    }

    function delete_wedding_ceremony(Request $request , $id = null)
    {
        if(!empty($id))
        {
            
            $WeddingCeremonyImage = WeddingCeremony::where(['id'=>$id])->first();

            //echo $WeddingCeremonyImage->image;die;
            $large_image_path=public_path("front/wedding_planner/image/couple/wedding_ceremony/large/");
            $medium_image_path=public_path("front/wedding_planner/image/couple/wedding_ceremony/medium/");
            $small_image_path=public_path("front/wedding_planner/image/couple/wedding_ceremony/small/");

            if(file_exists($large_image_path.$WeddingCeremonyImage->image)){
               unlink($large_image_path.$WeddingCeremonyImage->image);
            }
            if(file_exists($medium_image_path.$WeddingCeremonyImage->image)){
               unlink($medium_image_path.$WeddingCeremonyImage->image);
            }
            if(file_exists($small_image_path.$WeddingCeremonyImage->image)){
               unlink($small_image_path.$WeddingCeremonyImage->image);
            }

            WeddingCeremony::where(['id'=>$id])->delete();

            return redirect('/couple-dashboard-wedding-ceremony-list')->with('flash_message_success','Data deleted successfully');
        }
    }
               ############ Wedding Ceremony ##########



                ############ Lovable Family ###########


    public function wedding_group_list(Request $request)
    {
        $userid = Auth::user()->id;
        $groups = GuestBookGroup::with(['guests'])->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        return view('front.wedding_planner.couple.couple-dashboard-wedding-guest-list')->with(compact('groups'));                 
        /*foreach ($groups as $key => $value) {
            echo "<br> ". $value->name;
            foreach ($value->guests as $key => $guest) {
                echo "<br> ". $guest->firstname . " " . $guest->lastname;
            }
        }*/

        //dd($groups[2]->name);
    }

    function editwedding_guest(Request $request , $id = null){
    //echo $id;die;
    $UserId = Auth::user()->id;
        $gender = Auth::user()->gender;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //dd($data);
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $guests = new GuestBook;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/wedding_guest/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/wedding_guest/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/wedding_guest/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $guests->image = $filename;
                }
            }
            else
            {
                $filename = $data['oldImage'];
            }

            if($gender == 1){
                $relation ='Groom'.' '.$data['title'];
            }
            if($gender == 2){
                $relation ='Bride'.' '.$data['title'];
            }
            if($gender == 3){
                $relation ='Other'.' '.$data['title'];
            }

            GuestBook::where(['id'=>$id])->update(['relation'=>$relation,'image'=>$filename,'facebook_link'=>$data['facebook_link'],'instagram_link'=>$data['instagram_link'],'twitter_link'=>$data['twitter_link']]);
            return redirect('/couple-dashboard-wedding-group-list')->with('flash_message_success','Wedding guest has been updated successfully');
        }
        $guests = GuestBook::where(['id'=>$id])->first();
        //dd($ourStory);
        return view('front.wedding_planner.couple.couple-dashboard-wedding-guest-edit')->with(compact('guests'));
    }


                ############ Lovable Family ###########



               ############ Wedding Blog ##############



    public function wedding_blog()
    {
        $UserId = Auth::user()->id;
        $userData = User::where(['id'=>$UserId])->first();
        $partnerData = User::where(['partner_id'=>$UserId])->first();
        $userAlbum = WeddingBlog::where(['user_id'=>$UserId])->get();
        return view('front.wedding_planner.couple.couple-dashboard-wedding-blog')->with(compact('userData','partnerData','userAlbum'));
    }
    public function wedding_blog_list()
    {
        $UserId = Auth::user()->id;
        $partnetId = User::where(['partner_id'=>$UserId])->first();
        $partnetId =  $partnetId->id;
        $weddingBlog = WeddingBlog::where(['user_id'=>$UserId])->orWhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        return view('front.wedding_planner.couple.couple-dashboard-wedding-blog-list')->with(compact('weddingBlog'));
    }
    public function add_wedding_blog(Request $request )
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo '<pre>';
            //print_r($data);die;
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-wedding-blog')->with('flash_message_error','Please fill all required filed');
            }
            $weddingblog = new WeddingBlog;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/blog/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/blog/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/blog/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $weddingblog->image = $filename;
                }
            }
            $weddingblog->user_id=$UserId;
            $weddingblog->title= $data['title'];
            $weddingblog->description= $data['description'];
            $weddingblog->save();
            return redirect('/couple-dashboard-wedding-blog')->with('flash_message_success','Wedding blog has been created successfully');
        }
    }


    public function editwedding_blog(Request $request , $id = null)
    {
        $UserId = Auth::user()->id;
        if($request->isMethod('post'))
        {
            $data= $request->all();
            //echo '<pre>';
            //print_r($data);die;
            $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect('/couple-dashboard-wedding-blog')->with('flash_message_error','Please fill all required filed');
            }
            $weddingblog = new WeddingBlog;
            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $WeddingBlogImage = WeddingBlog::find($id);

                //echo $WeddingBlogImage->image;die;
                $large_image_path=public_path("front/wedding_planner/image/couple/blog/large/");
                $medium_image_path=public_path("front/wedding_planner/image/couple/blog/medium/");
                $small_image_path=public_path("front/wedding_planner/image/couple/blog/small/");
    
                if(file_exists($large_image_path.$WeddingBlogImage->image)){
                   unlink($large_image_path.$WeddingBlogImage->image);
                }
                if(file_exists($medium_image_path.$WeddingBlogImage->image)){
                   unlink($medium_image_path.$WeddingBlogImage->image);
                }
                if(file_exists($small_image_path.$WeddingBlogImage->image)){
                   unlink($small_image_path.$WeddingBlogImage->image);
                }
            
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('front/wedding_planner/image/couple/blog/large/'.$filename);
                    $medium_image_path = public_path('front/wedding_planner/image/couple/blog/medium/'.$filename);
                    $small_image_path = public_path('front/wedding_planner/image/couple/blog/small/'.$filename);

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(100,100)->save($small_image_path);

                    $weddingblog->image = $filename;
                }
            }
            else
            {
                $filename = $data['oldImage'];
            }

            WeddingBlog::where(['id'=>$id])->update(['title'=>$data['title'],'description'=>$data['description'],'image'=>$filename]);
            return redirect('/couple-dashboard-wedding-blog-list')->with('flash_message_success','Wedding blog has been updated successfully');
        }
        $weddingblog = WeddingBlog::where(['id'=>$id])->first();
        //dd($ourStory);
        return view('front.wedding_planner.couple.couple-dashboard-wedding-blog-edit')->with(compact('weddingblog'));
    }

    function delete_wedding_blog(Request $request , $id = null)
    {
        if(!empty($id))
        {
            
            $WeddingBlogImage = WeddingBlog::where(['id'=>$id])->first();

            //echo $WeddingBlogImage->image;die;
            $large_image_path=public_path("front/wedding_planner/image/couple/blog/large/");
            $medium_image_path=public_path("front/wedding_planner/image/couple/blog/medium/");
            $small_image_path=public_path("front/wedding_planner/image/couple/blog/small/");

            if(file_exists($large_image_path.$WeddingBlogImage->image)){
               unlink($large_image_path.$WeddingBlogImage->image);
            }
            if(file_exists($medium_image_path.$WeddingBlogImage->image)){
               unlink($medium_image_path.$WeddingBlogImage->image);
            }
            if(file_exists($small_image_path.$WeddingBlogImage->image)){
               unlink($small_image_path.$WeddingBlogImage->image);
            }

            WeddingBlog::where(['id'=>$id])->delete();

            return redirect('/couple-dashboard-wedding-blog-list')->with('flash_message_success','Data deleted successfully');
        }
    }



    public function couple_wedding_website(Request $request , $mywedding)
    {
        $website = $mywedding;
        if(!$mywedding){
            return redirect()->back();
        }
        Session::put('WeddingWebsite', $website); 
        $userData = User::with(['partner'])->where(['website'=>$website])->first();
        $UserId = $userData->id;
        $WeddingTemplate = $userData->website_template;

        $partnetId = User::where(['partner_id'=>$UserId])->first();
        $partnetId =  $partnetId->id;

        $guests = GuestBook::with('albums')->where('user_id',$UserId)->get(); 
        $ourstory = OurStory::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        $weddingceremony = WeddingCeremony::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        $weddingblog = Weddingblog::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        $lovablefamily = GuestBook::where(['user_id'=>$UserId])->orwhere(['user_id'=>$partnetId])->orderBy('id','DESC')->get();
        if($WeddingTemplate == 1){
            $webTemplate = 'wedding_website1';
        }
        if($WeddingTemplate == 2){
            $webTemplate = 'wedding_website2';
        }
        if($WeddingTemplate == 3){
            $webTemplate = 'wedding_website3';
        }
        if($WeddingTemplate == 4){
            $webTemplate = 'wedding_website4';
        }
        if($WeddingTemplate == 5){
            $webTemplate = 'wedding_website5';
        }
        return View('front/wedding_site/'.$webTemplate.'')->with(compact('guests','userData','ourstory','weddingceremony','weddingblog','lovablefamily'));
    }


    function photoCommentLike(Request $request ,$id= null)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all(); //print_r($data);die;
            $comment = new AblumPhotoComment;
            $comment->name=$data['name'];
            $comment->email=$data['email'];
            $comment->comment=$data['comment'];
            $comment->image_id=$id;
            $comment->save();
            return redirect()->back()->with('flash_message_success','Comment has been submited successfully');
        }
        $photo = GuestBookAlbum::find($id);
        $website =  Session::get('WeddingWebsite');
        $userData = User::with(['partner'])->where(['website'=>$website])->first();
        $imageId= $id;
        $comment = AblumPhotoComment::where(['image_id'=>$id])->get();
        return View('front.wedding_site.wedding_photoshot')->with(compact('userData','imageId','comment','photo'));
    }
    public function wedding_blog_details(Request $request , $id=null)
    {
        if($request->isMethod('post'))
        {
            $data= $request->all(); //print_r($data);die;
            $comment = new WeddingBlogComment;
            $comment->name=$data['name'];
            $comment->email=$data['email'];
            $comment->title=$data['title'];
            $comment->comment=$data['comment'];
            $comment->blog_id=$id;
            $comment->save();
            return redirect()->back()->with('flash_message_success','Comment has been submited successfully');
        }
        $WeddingWebsite = Session::get('WeddingWebsite');
        $userData = User::with(['partner'])->where(['website'=>$WeddingWebsite])->first();
        $blogDetails = WeddingBlog::where(['id'=>$id])->first();
        $blogId= $id;
        $comment = WeddingBlogComment::where(['blog_id'=>$id])->get();
        //dd($userData);
        //echo $userData->name;die;
        return View('front.wedding_site.wedding_website-blog-details',compact('WeddingWebsite','userData','blogDetails','blogId','comment'));
    }


    public function ajaxRequestPost(Request $request)
    {
        if($request->isMethod('get'))
        {
            $data = $request->all(); //print_r($data);die;            
            $usersCount1 = GuestBook::where('firstname',$data['name'])->whereNotIn('attendence_id',[1,3])->get();
            $usersCount = $usersCount1->count();
            if($usersCount > 0)
            {
                return view('front.wedding_site.rsvp_guest_list',compact('data','usersCount','usersCount1'));
            }
            else{
                echo '<p style="text-align: center;color: wheat;">We have found 0 guests matching '.$data['name'].' '.$data['lname'].'</p>';
            }
        }
    }
    public function ajaxRequestInvitationPost(Request $request)
    {
        //echo 'Test';die;
        if($request->isMethod('get'))
        {           
            $data = $request->all(); 
            //dd($request->all(),$data['username']);
            $update = GuestBook::where('id',$data['username'])->update(['attendence_id'=>$data['invitation'],'companions'=>$data['message']]);
           //dd($update);
        }
    }

            ####################################
    ################ Wedding Website ###################
            ####################################
}