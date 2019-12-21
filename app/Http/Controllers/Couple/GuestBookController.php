<?php

namespace App\Http\Controllers\Couple;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GuestBook;
use App\GuestBookGroup;
use App\Country,App\State,App\City;
use Maatwebsite\Excel\Facades\Excel;
use Mail, Config, \Crypt, DB, Session;
use App\User; use App\GuestBookMenu;
use App\GuestInvitation;use App\GuestBookAttendence;
use Carbon\Carbon;
use Validator;
use Response;
use App\Exports\GuestExport;
class GuestBookController extends Controller
{
 
    public function couple_guest_book(Request $request)
    {     
        $data = [];DB::enableQueryLog();
        $userid = Auth::user()->id;                
        //dd($data['allGuest']->toArray());
        $allGuest   = GuestBook::with(['group','menu','user','attendence'])
                    ->where('user_id',$userid);
                    if (isset(Auth::user()->partner_id)) {
                        $allGuest->orWhere('user_id',Auth::user()->partner_id);
                    }   
        $data['allGuest'] = $allGuest->get();  
        $data['countries']  = Country::whereIn('id',[101,102,109,111,113])->orderBy('name')->get();  
        $data['states']     = State::orderBy('name')->get(); 
        $data['cities']     = City::whereIn('state_id',[10,11,12,13,14,38,39])->orderBy('name')->get();         
        $data['groups']     = GuestBookGroup::with(['guests'])->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        $data['menus']      = GuestBookMenu::with(['guests'])->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        $data['ungroups']   = GuestBook::where('group_id',null)->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        $data['unmenu']   = GuestBook::where('menu_id',null)->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();   
        $data['attendence'] = GuestBookAttendence::with(['guests'])->get(); 
        $data['companions'] =  isset($guest->companions) ? GuestBook::whereIn('id',json_decode($guest->companions))->select('id','firstname','lastname')->get() : [];  

        $total = 0;
        $guestByAge = $allGuest->whereIn('age',['infant','child','adult'])->get()->groupBy('age'); 
        //dd($guestByAge);
        foreach ($guestByAge as $key => $value) { 
            $data['countGuest'][$key]['count'] = $ageCount = count($value);            
            $total = $total + $ageCount;
            if($value[0]->age == 'adult'){
                $data['countGuest'][$key]['icon'] = 'adult.png';
            }if($value[0]->age == 'child'){
                $data['countGuest'][$key]['icon'] = 'child.png';
            }if($value[0]->age == 'infant'){
                $data['countGuest'][$key]['icon'] = 'infant.png';
            }            
        }
        //dd($data['countGuest']);
        $data['countGuestTotal'] = $total;

        return View('front.wedding_planner.couple.couple-dashboard-guest-book',$data);
    }
    
    public function groupstore(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:guest_book_group',			
		]);
        $userid = Auth::user()->id;
		$data = GuestBookGroup::create(['name'=>$request->name,'user_id' => $userid]);		
		if($data){
			return redirect()->route('guestbook.index')->with('success','Group added successfully');
		}
		return back()->with('danger','Something was wrong');		
	}

	public function menustore(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:guest_book_group',			
			'description' => 'required|min:3|max:60',			
		]);
        $userid = Auth::user()->id;
		$data = GuestBookMenu::create(['name'=>$request->name,'description'=>$request->description,'user_id' => $userid]);		
		if($data){
			return redirect()->route('guestbook.index')->with('success','Menu added successfully');
		}
		return back()->with('danger','Something was wrong');		
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'firstname' => 'required|alpha',
			'lastname' => 'nullable|alpha',
			'email' 	=> 'required|email|unique:guest_books',
			'group_id' 	=> 'required|numeric',
			'age' 	=> 'required',
			'gender' 	=> 'required',
			'mobile' 	=> 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'postalcode' => 'min:6|regex:/\b\d{6}\b/',
		],[
            'firstname.*' => 'Enter valid firstname...',
            'lastname.alpha' => 'Enter valid lastname...',
            'group_id.required' => 'Select Group...',
            'group_id.numeric' => 'Select Group...',
            'gender.required'      => 'Select Gender..',
            'age.required'      => 'Select Age..',
            'postalcode.regex' => 'Enter valid pin code.',
            'postalcode.min' => 'Enter valid pin code.'
        ]);

		//dd($request->all());
		$guestBook = new GuestBook($request->all());
        $guestBook->user_id = Auth::user()->id;
		$guestBook->city_id = $request->country;
		$guestBook->country_id = $request->country;	
		$save = GuestBook::create($guestBook->toArray());
		if($save){
			return redirect()->route('guestbook.index')->with('success','Guest added successfully');
		}
		return back()->with('danger','Something was wrong with add the guest.');		
	}
	public function groupupdate(Request $request)
	{
        $id = $request->id;
        $groupname = $request->groupname;
		$this->validate($request, [
			'groupname' => 'required|unique:guest_book_group,name,id',			
		]);
        $userid = Auth::user()->id;
		$data = GuestBookGroup::find($id);
        $data->update(['name'=>$groupname]);
        //dd($groupname,$data);
		if($data){
			return redirect()->route('guestbook.index')->with('success','Group update successfully');
		}
		return back()->with('danger','Something was wrong');		
	}
	public function groupdelete($id)
    {
        $data = GuestBookGroup::find($id);
        if(!$data->admin_id)
        {            
            GuestBook::where('group_id',$data->id)->update(['group_id'=>0]);
            $delete = $data->delete();
        }
        if($delete){
            return redirect()->route('guestbook.index')->with('success','Group deleted successfully');
        }
    }

    public function online_invitation()
    {
        $data = [];
        $authUser = Auth::user();
        $invite = GuestInvitation::with('user')->where('user_id',$authUser->id)->get();
        $authUser->wedding_date = $authUser->wedding_date;
        /*dd($authUser);*/
        $data['userDetail'] = $authUser;        
        $data['partnerData'] = $authUser->partner;//($this->findPartnerData()) ? $this->findPartnerData() : [];
        $data['invitationData'] = $invite;
        //$data['preview'] = HelperFunctionController::onlineInvitationPreview($authUser,$invite);
        //dd($data);
        return view('front.wedding_planner.couple.couple-guest-online_invitation',$data);
        
    }
    public function invitationSave(Request $request,$send=null)
    {
        $user = Auth::user();
        $this->validate($request, [
            'title' => 'required|unique:guest_invitation',           
            'txt_message' => 'required|min:3|max:250',           
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'image' => 'required',             
        ]);
        $imageName = $request->image;
        if($request->hasfile('image'))
        {            
            $image = $request->file('image');
            $imageName = Auth::user()->id."-" .time().$image->getClientOriginalName();
            $image->move(public_path().'/front/wedding_planner/image/couple/invitation/', $imageName);           
        }
       
        $data = GuestInvitation::create([
                'user_id'=>$request->user_id, 
                'bridge_name'=>$request->bridge_name, 
                'partner_name'=>$request->partner_name, 
                'wedding_date'=>$request->wedding_date, 
                'wedding_place'=>$request->wedding_place,
                'title'=>$request->title, 
                'txt_message'=>$request->txt_message, 
                'website' => isset($request->website) && ($request->website == 'on') ? url('web/'.Auth::user()->website) : '', 
                'rsvp_confirm'=>($request->rsvp_confirm == 'on') ? 1:0, 
                'invitation_sent'=>$request->invitation_sent,
                'image' => !empty($imageName) ? $imageName : '', 
                'rsvp_sent'=> ($request->rsvp_confirm == 'on') ? 1:0,
                'address_sent' => 0,            
        ]);     
            
        $invteGuest = GuestInvitation::find($data->id);

        /*if($request->send){*/
            return redirect()->route('invitation.preview',$data->id)->with('success','Invitation saved')->with('autofocus', true);
        /*}*/
        return back()->with('success','Invitation saved');    
    }

    public function invitation_preview($id)
    {
        $data = [];        
        $userData = GuestInvitation::find($id);   
        $data['invitation'] =        $userData;
        $data['guest'] = GuestBook::where('user_id',Auth::user()->id)->get();
        return view('front.wedding_planner.couple.couple-guest-invitation_preview',$data);
    }

}