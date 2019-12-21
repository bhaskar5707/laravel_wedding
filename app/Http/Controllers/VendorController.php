<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail,Config,\Crypt,DB, Hash,Session,File,Charts;
use Illuminate\Routing\Controller as BaseController;

use App\Vendor,App\VendorStoreImages,App\Country,App\State,App\City;
use App\Models\Admin\AdminFaq;
use App\Models\Admin\AdminFaqAns;
use App\VendorPromotionOther;
use Carbon\Carbon;
class VendorController extends BaseController
{
	use AuthorizesRequests,  ValidatesRequests;

	public function Business_login()
    {
        return View('front.wedding_planner.vendor.login');
    }
    public function signUp()
    {
        $cat = DB::table('wed_category')->orderBy('sort')->get();
        return View('front.wedding_planner.vendor.registration')->with(array('category'=>$cat));
    }
    public function vendor_store_first(Request $request)
	{
	    //dd($request->all());
	    $this->validate($request,[
	    'country' => 'required',
	    'business' => 'required',
	    'email' => 'required|email|max:255',
	    'phone' => 'required',
	    //'brand' => 'required',
	    'category' => 'required',
	    'sub_category' => 'required',
	    'city' => 'required',
	    'state' => 'required'
	  ]);


	  $Vendor = Vendor::where('email', '=', Input::get('email'))->first();
	  if ($Vendor === null) {
	   $userdata= new Vendor();
	   $userdata->username = preg_replace('/([^@]*).*/', '$1', request('email'));
	   $userdata->country= request('country');
	   $userdata->business_name= request('business');
	   $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', request('business'))));
	   $userdata->business_name_slug= isset($request->slug) ? $request->slug : $slug;
	   $userdata->email= request('email');
	   $userdata->phone= request('phone');
	   $userdata->business_category= request('category');
	   $userdata->sub_category= request('sub_category');
	   $userdata->category_id= request('category_id');
	   $userdata->subcategory_id= request('subcategory_id');
	   $userdata->city= request('city');
	   $userdata->state= request('state');
	   $userdata->locality= (null !== request('city')) ? request('city') : '';

	   if($userdata->save())
	   {
	      $id = Crypt::encrypt($userdata->id);    
	      $userdata->businessinfo()->create([
	        'vendor_id'=>$userdata->id,
	        'user_name'=> $userdata->username,
	        'email' => $userdata->email,
	        'telephone' => $userdata->phone,
	        
	      ]);
	      $userdata->location()->create([
	        'vendor_id' => $userdata->id,
	        'country' => $userdata->country,
	        'state' => $userdata->state,
	        'city' => $userdata->city,
	      ]);
	      
	      \Session::flash('success_message', 'Check Your Email inbox for forthur Process!');
	    }else{
	      \Session::flash('error_message', 'Please Try Again!!!');
	    }
	    return redirect()->route('vendor-signUp');
	  }
	  else
	  {
	    \Session::flash('success_message', 'Already with us!!! Please login! OR check Your Email Inbox for next Process!!');
	    return redirect()->route('vendor-signUp');
	  }
	}

	public function vendor_store_next($id)
	{
	    //$vid = Crypt::decrypt($id);
	    $vid = $id;
	    $Vendor = vendor::where('id', '=', $vid)->first();
	    //dd($vid,$Vendor);
	    if ($Vendor->email_verified === null) {    

	    $vendors_cat = DB::table('vendors')->where('id', $vid)->get();
	    $category=$vendors_cat[0]->business_category;
	    $sub_category=$vendors_cat[0]->sub_category;
	    $uploadphoto = VendorStoreImages::where('vendor_id',$vid)->count();
	    //$faq_answer = DB::table('admin_faq_answer')->where('vendor_id', $vid)->get();
	    $data1 = AdminFaq::with(['faq_answers'])->where('category',$category)->where('sub_category',$sub_category)->get();
	    $faq_answers = AdminFaqAns::where('vendor_id',$vid)->get();
	    $image = DB::table('vendor_store_image')->where('vendor_id',$vid)->orderBy('id','desc')->get();
	    //dd($uploadphoto);
	    return View('front.wedding_planner.vendor.vendor-registration-next')->with(array('id'=>$id,'data1'=>$data1,'faq_answers'=>$faq_answers,'vendor_id'=> $vid,'image'=>$image,'uploadphoto'=>$uploadphoto));
	    }
	    else
	    {
	        \Session::flash('success_message', 'Already Verified, Please SignIn');
	        return redirect()->route('vendor-login');
	    }
	}
	public function vendor_store(Request $request)
	{
	    
	  //$id = Crypt::decrypt(request('vendor_id')); 
	  $id= request('vendor_id');

	  $this->validate($request, [
	   //'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	   'fname' => 'required|max:255',
	   'vendor_id' => 'required',
	   'lname' => 'required|max:255',
	   'password' => 'required|max:30',
	   //'terms' => 'required'
	 ]);

	  $userdata= vendor::find($id);
	  $userdata->first_name= request('fname');
	  $userdata->last_name= request('lname');
	  $userdata->password= bcrypt(request('password'));
	  $userdata->email_verified= 'yes' ;
	  $userdata->status= 0 ;
	  $userdata->save();

	  $include_p = "";
	  $puja_t = "" ;
	  $m_payment = "";
	  $travel_outstation = "";

	    if(!empty($_POST['include_price']))
	    {
	     $include_p=implode(',', $_POST['include_price']);
		 }
		 if(!empty($_POST['puja_type']))
		 {
		   $puja_t=implode(',', $_POST['puja_type']);
		 }
		 if(!empty($_POST['mod_payment']))
		 {
		   $m_payment=implode(',', $_POST['mod_payment']);
		 }

		 if(!empty($_POST['tow']))
		 {
		   $travel_outstation = $_POST['tow'] ; 
		 }
	 //dd($_POST);
	 $faq_data = array(
	  'vendor_id' => $id,
	  'start_price' => isset($_POST['start_price']) ? $_POST['start_price']: 0,  
	  'include_price' => $include_p,
	  'puja_type' => $puja_t,
	  'base_loc' => isset($_POST['base_loc']) ? $_POST['base_loc'] : '',
	  'popular_package_price' => isset($_POST['popular_package_price']) ? $_POST['popular_package_price'] : '',
	  'popular_package_include' => isset($_POST['popular_package_include']) ? $_POST['popular_package_include'] : '',
	  'travel_outstation' => $travel_outstation, 
	  'mod_payment' => $m_payment,
	  'book_amount_perc' => isset($_POST['book_amount_perc']) ? $_POST['book_amount_perc'] : '',
	  'advance_amount' => isset($_POST['advance_amount']) ? $_POST['advance_amount'] : '',
	  'cancel_policy' => isset($_POST['cancel_policy']) ? $_POST['cancel_policy'] : '',
	  'start_year' => isset($_POST['start_year']) ? $_POST['start_year'] : '',
	  'awards' => isset($_POST['awards']) ? $_POST['awards'] : ''
	);

	DB::table('vendor_faq')->insert($faq_data);
	$userdata= vendor::find($id);
	Auth::guard('vendor')->login($userdata);
	//return redirect()->route('vendor-Dashboard');
	 \Session::flash('success_message', 'You have successfully registred please login for further process!');

	}

    public function login(Request $request)
	{
	    //print_r($_POST); die;
		$validator = Validator::make($request->all(), [
		    'email' => 'required',
		    'password' => 'required'
		]);
		if ($validator->fails()) {
		   \Session::flash('error_message', 'Please fill all the Fields !!!');
		   return redirect()->route('vendor-login');
		}else{
			
			$credentials = $request->only('email', 'password');
			if(Auth::guard('vendor')->attempt($credentials)) 
			{
				$vendor_id = Auth::guard('vendor')->id();
				$ven_data= DB::table('vendors')->where('id',$vendor_id)->get();
                $vendor_name=$ven_data[0]->business_name;
                $table ="vendor_business_information,vendor_faq,vendor_location";
                $tb_name  = explode(',',$table);
			    $tb_count = count($tb_name);
			    $count = 0;

			    foreach($tb_name as $name)  
			    {
			      $data = DB::table($name)->where('vendor_id',$vendor_id)->count();  
			      if($data > 0){
			          $count++;
			      }
			    } 
			    $perc = (int)(($count/$tb_count)*100);
  
			    Session::put('progressbar', $perc);
			    Session::put('progressbar_value', $count);
			    Session::put('progressbar_outof', $tb_count);

                $packages = DB::table('vendor_package')->get();
    			return redirect()->route('vendor-Dashboard')->with(array('packages'=>$packages,'ven_data'=>$ven_data));
			}
			else
			{
			   \Session::flash('error_message', 'Invalid Login Details !!!');
			   return redirect()->route('vendor-login');
		    }
 
		}
	}

	public function vendor_dashboard() 
	{
		$packages = DB::table('vendor_package')->get();
	    $vendor_id = Auth::guard('vendor')->id();
	    $ven_data= DB::table('vendors')->where('id',$vendor_id)->get();
	    $vendor_name = isset($ven_data[0]->business_name) ? $ven_data[0]->business_name : '';
		return View('front.wedding_planner.vendor.vendor-dashboard');
	}

	public function vendor_store_front()
    {
       $vendor_id = Auth::guard('vendor')->id();
	   $ven_data= vendor::find($vendor_id);
	   $vendor_name=$ven_data->business_name;
	   $business_username = preg_replace('/([^@]*).*/', '$1', $ven_data->email);
	   $username = !empty($ven_data->username) ? $ven_data->username : $business_username;
	   $business_info= DB::table('vendor_business_information')->where('vendor_id',$vendor_id)->first();
	   $personal_info= vendor::where('id',$vendor_id)->first();
	   $personal_info->setAttribute('countryname',Country::where('id',$personal_info->country)->first()->name);
	   $personal_info->setAttribute('statename',State::where('id',$personal_info->state)->first()->name);
	   $personal_info->setAttribute('cityname',City::where('id',$personal_info->city)->first()->name);
	   //dd($personal_info);
	   return View('front.wedding_planner.vendor.vendor-dashboard-storefront-business-information')->with(array('business_info'=>$business_info,'ven_data'=>$ven_data,'username'=>$username,'personal_info'=>$personal_info));
    }

    public function business_information(Request $request, Vendor $vendor)
	{
	    $vendor_id = Auth::guard('vendor')->id();
	    if(isset($request->password) || isset($request->old_password)){//dd($request->all());
	     $validate = $this->validate($request, [
	      'current' => 'required',
	      'password' => 'required|confirmed',
	      'password_confirmation' => 'required'
	    ]);
	    $vendor = vendor::find($vendor_id);
	    if (!Hash::check($request->current, $vendor->password)) {
	      return back()->with('error_message','The specified password does not match the database password');
	    }
	    $vendor->password = Hash::make($request->password);
	    $vendor->save();
	    Session::flash('success_message', 'Password has been updated.');
	    return redirect('/storefront-business');
	  }
	  $this->validate($request, [
	   'user_name' => 'required',
	   'description' => 'required|max:2000',
	   'name' => 'required',
	     //'email' => 'email|required',
	   'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
	   'telephone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
	   'alternate_email'=> 'nullable|string|email|max:255',
	   'gstno' => 'required|numeric',
	   'fax' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
	   'gstinholdername' => 'required',
	 ],[
	  'alternate_email.email' => "Enter valid alternate email address." ,

	]);
	  $business_data = array(
	    'user_name' => $_POST['user_name'], 
	    'description' => $_POST['description'],
	    'name' => $_POST['name'],
	      //'email' => $_POST['email'],
	    'alternateemail'=>$_POST['alternate_email'],
	    'gstinaddress'=> isset($_POST['gstinaddress']) ? $_POST['gstinaddress'] : '',
	    'gstno'=>isset($_POST['gstno']) ? $_POST['gstno'] : '',
	    'address'=>isset($_POST['address']) ? $_POST['address'] : '',
	    'gstinholdername'=>$_POST['gstinholdername'],
	    'companyname'=>isset($_POST['companyname']) ? $_POST['companyname'] : '',
	    'companyaddress'=>isset($_POST['companyaddress']) ? $_POST['companyaddress'] : '',
	    'fax'=>$_POST['fax'],
	    'mobile' => $_POST['mobile'],
	    'telephone' => $_POST['telephone'], 
	    'website' => $_POST['website'],
	    'website' => $_POST['website'],
	    'vendor_id' => $vendor_id,
	  );
	  
	    vendor::where('id', $vendor_id)->update(['username'=>$_POST['user_name']]); // username update on vendor table

	    $exists = DB::table('vendor_business_information')->where('vendor_id', $vendor_id)->first();
	     
	     
	    if(!$exists)
	    {
	       $add = DB::table('vendor_business_information')->insert($business_data);//dd($add,$request->all(),$business_data);
	    }
	    else
	    {
	       DB::table('vendor_business_information')
	       ->where('vendor_id', $vendor_id)
	       ->update($business_data); 
	    }

	    Session::flash('success_message', 'Business Information updated !!!!!!');
	    return redirect('/storefront-business');
	}

	public function vendor_storefront_location() {
	    $vendor_id = Auth::guard('vendor')->id();
	    $loc = DB::table('vendor_location')->where('vendor_id',$vendor_id)->first();
	    $ven_data= DB::table('vendors')->where('id',$vendor_id)->get();
	    
	    $country = ((int)($ven_data[0]->country) > 0) ? Country::where('id',$ven_data[0]->country)->first() : Country::where('name',$ven_data[0]->country)->first() ; 
	    $state = ((int)($ven_data[0]->state) > 0) ? State::where('id',$ven_data[0]->state)->first() : State::where('name',$ven_data[0]->state)->first();
	    $city = ((int)($ven_data[0]->city) > 0) ? City::where('id',$ven_data[0]->city)->first() : City::where('name',$ven_data[0]->city)->first();
	    //dd($loc,$ven_data,$country,$state,$city);
	    return View('front.wedding_planner.vendor.vendor-dashboard-storefront-location')->with(array('loc'=>$loc,'ven_data'=>$ven_data,'country'=>$country,'state'=>$state,'city'=>$city));
	  
	}

	public function vendor_location(Request $request)
	{
		//echo "<pre>";print_r($_POST);die;
	    $vendor_id = Auth::guard('vendor')->id();
	    $this->validate($request, [
	     'postal_code' => 'required',
	     'city' => 'required',
	     'country' => 'required',
	     'address' => 'required',
	    ]);
	    $location_data = array(
	      'postal_code' => $_POST['postal_code'], 
	      'city' => $_POST['city'],
	      
	      'address' => $_POST['address'],
	      'country' => $_POST['country'],
	      'Latitude' => isset($_POST['Latitude']) ? $_POST['Latitude'] : '',
	      'longitude' => isset($_POST['longitude']) ? $_POST['longitude'] : '',
	      'shopno' => $_POST['shopno'],
	      'landmark' => $_POST['landmark'],
	      'area' => isset($_POST['area']) ? $_POST['area'] : '',
	      'location' => isset($_POST['location']) ? $_POST['location'] : '',
	      'state' => $_POST['state'],
	      'vendor_id' => $vendor_id,
	    );
	    
	    $exists = DB::table('vendor_location')->where('vendor_id', $vendor_id)->first();
	    if(!$exists)
	    {
	     DB::table('vendor_location')->insert($location_data);
	   }
	   else
	   {
	     DB::table('vendor_location')
	     ->where('vendor_id', $vendor_id)
	     ->update($location_data); 
	   }

	   \Session::flash('success_message', 'Location updated !!');
	   return redirect('/vendor-dashboard-storefront-location');
	}

	public function vendor_dashboard_storefront_faq() {
	
	    $vendor_id = Auth::guard('vendor')->id();
	    $ven_data= DB::table('vendors')->where('id',$vendor_id)->first();
	    $data1 = collect();
	    if(isset($ven_data->category_id)){
	       $data1 = AdminFaq::where('category_id',$ven_data->category_id)->orWhere('sub_category_id',$ven_data->subcategory_id)->get(); //dd($data1);
	        foreach($data1 as $ques){
	            $ques->setAttribute('ans',AdminFaqAns::where('faq_que_id',$ques->id)->where('vendor_id',$vendor_id)->first());
	        }
	    }
	     
	   return View('front.wedding_planner.vendor.vendor-dashboard-storefront-faq')->with(array('vendor_id' => $vendor_id,'data1'=>$data1,'ven_data'=>$ven_data));
	
	}

	public function vendor_update_faq_answer_reg(Request $request)  
	{
	    
	  $vendor_id = $request->vendor_id;
	  $vendor = vendor::find($vendor_id); //dd($vendor);
	  $this->validate($request,['vendor_price'=>'nullable']);
	  $data = AdminFaq::with(['faq_answers'])->where('category_id',$vendor->category_id)->orWhere('sub_category_id',$vendor->subcategory_id)->get();
	  $i=0; //dd($data);
	  //dd($request->all(),$data);
	  if(isset($request->vendor_price))
	  {
	      $vendor->update(['price_range'=>$request->vendor_price]);
	  }
	  
	  foreach($data as $val)
	  { 
	        //$vendor_id = Auth::guard('vendor')->id();
	        if(is_array(Input::get($data[$i]->id))){
	            $field_name = json_encode(Input::get($data[$i]->id)); 
	        }else{
	            $field_name = Input::get($data[$i]->id); 
	        }
	        $faq_que_id = $val->id;
	        $faq_data = [
	                'faq_answer' => $field_name,
	                'faq_que_id' => $faq_que_id,
	                'vendor_id' => $vendor_id,
	                ];
	        $exists = AdminFaqAns::where('vendor_id',$vendor_id)->where('faq_que_id',$faq_que_id)->count();  
	        if($exists){
	            AdminFaqAns::where('vendor_id',$vendor_id)->where('faq_que_id',$faq_que_id)->update( [
	                'faq_answer' => $field_name,
	                'faq_que_id' => $faq_que_id,
	                ]);
	        }else{
	            AdminFaqAns::insert($faq_data);
	        }
	        //$dsr = DB::table('admin_faq_answer')->updateOrInsert(['faq_que_id' => $faq_que_id], $faq_data);
	    $i=$i+1;
	  } 
	  return redirect()->back()->with('success_message','FAQ Updated..');
	}
    
    public function vendor_dashboard_promotion() {

    	$vendor_id = Auth::guard('vendor')->id();
    	$ven_data= DB::table('vendors')->where('id',$vendor_id)->get();
    	$promo = DB::table('vendor_promotion')->where('vendor_id',$vendor_id)->first();
	    $pro = VendorPromotionOther::where('vendor_id',$vendor_id)->get();
	    $now = Carbon::now()->format('d-m-Y'); 
	    $d = $pro->pluck('expire_date');
	    //dd($pro);
	    foreach($pro as $element){

	       $expired_update = $element->where('expire_date','<',$now)->update(['status'=> 'expired']);  // For Expire the promotion
	       $pending_update = $element->where('expire_date','>',$now)->where('status','!=','active')->update(['status'=> 'pending']);
	    }

	    $otherpromo_active = DB::table('vendor_other_promotion')->where('vendor_id',$vendor_id)->where('status','active')->latest()->take(6)->get();
	    $otherpromo_pending = DB::table('vendor_other_promotion')->where('vendor_id',$vendor_id)->where('status','pending')->latest()->take(6)->get();
	    $otherpromo_expired = DB::table('vendor_other_promotion')->where('vendor_id',$vendor_id)->where('status','expired')->latest()->take(6)->get();

	    return View('front.wedding_planner.vendor.vendor-dashboard-storefront-promotion')->with(array('promo'=>$promo,'ven_data'=>$ven_data,'otherpromo_active' => $otherpromo_active,'otherpromo_pending' => $otherpromo_pending,'otherpromo_expired' => $otherpromo_expired));
	}

	public function vendor_promotion_perc(Request $request)
	{
	    $vendor_id = Auth::guard('vendor')->id();
	    $this->validate($request, [
	        'promotion_perc' => 'required',
	    ]);
	    $promotion_data = array(
	        'base_promotion_perc' => $_POST['promotion_perc'],
	        'vendor_id' => $vendor_id,
	    );
	    $exists = DB::table('vendor_promotion')->where('vendor_id', $vendor_id)->first();
	    if(!$exists)
	    {
	        DB::table('vendor_promotion')->insert($promotion_data);
	    }
	    else
	    {
	        DB::table('vendor_promotion')
	        ->where('vendor_id', $vendor_id)
	        ->update($promotion_data); 
	    }
	    Session::flash('success_message', $promotion_data['base_promotion_perc'] . ' Promotion updated !!!!!!');
	    return redirect('/vendor-dashboard-storefront-promotion');
	   
	}

	public function vendor_add_promotion() {
	 
	   return View('front.wedding_planner.vendor.vendor-dashboard-storefront-promotion-add-promotion');
	
	}

	public function vendor_other_promotion(Request $request)
	{
	    $promotionidid = 0;
	    $vendor_id = Auth::guard('vendor')->id();
	    $this->validate($request, [
	        'name' => 'required|unique:vendor_other_promotion,name,id',
	        'type' => 'required',
	        'expire_date' => 'required',
	        'description' => 'required|max:500',
	   ]);
	    if($request->file('promo_image'))
	    {
		    foreach($request->file('promo_image') as $image)
		    {
		        $name=$vendor_id.time().$image->getClientOriginalName();
		        $image->move(public_path().'/front/wedding_planner/image/vendors', $name);  
		        $data[] = $name;  
		    }

		    $promotion_data = array(
		        'name' => $_POST['name'],
		        'type' => $_POST['type'],
		        'expire_date' => $_POST['expire_date'],
		        'description' => $_POST['description'],
		        'promo_image' => implode(',',$data),
		        'vendor_id' => $vendor_id,
		    );
	    }
	    else
	    {
		    $promotion_data = array(
		        'name' => $_POST['name'],
		        'type' => $_POST['type'],
		        'expire_date' => $_POST['expire_date'],
		        'description' => $_POST['description'],
		        'promo_image' => '',
		        'vendor_id' => $vendor_id,
		    );
	    }
	    $exists = DB::table('vendor_other_promotion')->where('id', $promotionidid)->first();
	    if(!$exists)
	    {
	        DB::table('vendor_other_promotion')->insert($promotion_data);
	    }
	   else
	   {
	        DB::table('vendor_other_promotion')
	        ->where('vendor_id', $vendor_id)
	        ->update($promotion_data); 
	   }
	        \Session::flash('success_message', 'Other Promotion updated !!!!!!');
	        return redirect('/vendor-dashboard-storefront-promotion');
	   
	 
	}
	public function promotion_edit($id)
    {
        $data = VendorPromotionOther::find($id);
        return view('front.wedding_planner.vendor.vendor-dashboard-storefront-promotion-edit-promotion',compact('data'));
    }
    public function vendor_other_promotion_update(Request $request,$id)
    {
        $promotionidid = $id;
           
        $vendor_id = Auth::guard('vendor')->id();
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'expire_date' => 'required',
            'description' => 'required|min:3',
            'promo_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
           'promo_image.*' => 'Upload valid image upto maximum 2MB in size.'
        ]);
       
       
        $oldImage = $request->promo_img_src;
        if($request->hasfile('promo_image'))
        {
            
            foreach($request->file('promo_image') as $image)
            {
	            $name=$vendor_id.time().$image->getClientOriginalName();
	            $image->move(public_path().'/front/wedding_planner/image/vendors', $name);  
	            $data[] = $name;  
            }
            if ($oldImage) {
                if (file_exists(public_path('front/wedding_planner/image/vendors/' . $oldImage))) {
                    unlink(public_path('front/wedding_planner/image/vendors/' . $oldImage));
                } 
            }
             
            $promotion_data = array(
	            'name' => $_POST['name'],
	            'type' => $_POST['type'],
	            'expire_date' => $_POST['expire_date'],
	            'description' => $_POST['description'],
	            'promo_image' => implode(',',$data),
	            'vendor_id' => $vendor_id,
            );
        }
        else
        {
            $promotion_data = array(
	            'name' => $_POST['name'],
	            'type' => $_POST['type'],
	            'expire_date' => $_POST['expire_date'],
	            'description' => $_POST['description'],
	            'promo_image' => $oldImage,
	            'vendor_id' => $vendor_id,
            );
        }
        $exists = DB::table('vendor_other_promotion')->where('id', $promotionidid)->first();
        if(!$exists)
        {
            DB::table('vendor_other_promotion')->insert($promotion_data);
       }
       else
       {
            DB::table('vendor_other_promotion')
            ->where('id', $id)
            ->update($promotion_data); 
       }
       \Session::flash('success_message', 'Other Promotion updated !!!!!!');
       return redirect()->back();
       
    }
    
    public function promotion_delete($id)
    {
        if($vendor_id = Auth::guard('vendor')->id())
        {
            $exists = DB::table('vendor_other_promotion')->where('id', $id)->first();
            $image_path = public_path().'/front/wedding_planner/image/vendors/'.$exists->promo_image;
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
	        DB::table('vendor_other_promotion')->where('id', $id)->delete();
	        Session::flash('success_message', 'Promotion Deleted Successfully..');
	        return redirect('/vendor-dashboard-storefront-promotion');
        }
    }




    
    public function vendor_dashboard_my_account_settings() {
	    $vendor_id = Auth::guard('vendor')->id();
	    $setting = DB::table('acc_setting')->where('vendor_id',$vendor_id)->first();   
	    $ven_data= DB::table('vendors')->where('id',$vendor_id)->get();
	    
	    return view('front.wedding_planner.vendor.vendor-dashboard-my-account-settings',compact('setting','ven_data'));
	}

	public function acount_setting(Request $request) 
	{
        $vendor_id = Auth::guard('vendor')->id();
	    if(!empty($_POST['acc_setting']))
	    {
		    $acc_setting = array(
            'vendor_id' => $vendor_id,
            'acc_setting' => json_encode($_POST['acc_setting'])
        );
	    }
	    else
	    {
	       $acc_setting = array(
	        'vendor_id' => $vendor_id,
	        'acc_setting' => ''
	      ); 
	    }
	    $exists = DB::table('acc_setting')->where('vendor_id', $vendor_id)->first();
	    if(!$exists)
	    {
	       DB::table('acc_setting')->insert($acc_setting);
	    }
	    else
	    {
	       DB::table('acc_setting')
	       ->where('vendor_id', $vendor_id)
	       ->update($acc_setting); 
	    }
	    \Session::flash('success_message', 'Acount setting updated !!!!!!');
		    return redirect('/vendor-dashboard-my-account-settings');
  
    }
    public function account_collaboration(){
	  
	   return View('front.wedding_planner.vendor.vendor-dashboard-my-account-collaboration');
	
	}


	public function logout(Request $request) {
      Auth::guard('vendor')->logout();
      Session::flush();
      return redirect()->route('vendor/vendor-login');
    }

 
}