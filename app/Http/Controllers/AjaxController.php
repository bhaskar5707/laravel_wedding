<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User,DB;
use Auth;
use Response,Notification;
use App\GuestBook,App\GuestBookGroup,App\GuestBookMenu,App\GuestBookAttendence;
use App\Country,App\State,App\City;
class AjaxController extends Controller
{
    public function getCountryList()
    {
        $countries = Country::pluck("name","id");
        return response()->json($countries);
    }
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
        ->where("country_id",$request->country_id)
        ->pluck("name","id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
        ->where("state_id",$request->state_id)
        ->pluck("name","id");
        return response()->json($cities);
    }
    public function selectguestforrsvp(Request $request)
    {
        if($request->ajax()){
            $idArray = $request->idArray;
            $guests = isset($request->idArray) ? GuestBook::whereIn('id',$idArray)->select('firstname','lastname')->get() : [];

            return response()->json($guests);
        }
    }
    
    public function storeCompanions(Request $request)
    {       
        $guestid            = $request->guestid;       
        $guest              = new GuestBook();
        $guest->user_id     = $request->user_id;
        $guest->companions  = json_encode([$guestid]);;
        $guest->firstname   = $request->fname;
        $guest->lastname    = $request->lname;
        $guest->menu_id     = $request->menu;
        $guest->group_id    = $request->group;
        $guest->gender      = $request->gender;
        $guest->age         = $request->age;
        $guest->save();
        return response()->json($guest->id);
    }

    public function loadGuest($request)
    {
        $data = [];
        $userid = $request->userid;
        $data['attendence'] = GuestBookAttendence::with(['guests'])->get();
        $data['groups']     = $group = GuestBookGroup::with(['guests'])->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();   
        $data['menus']      = GuestBookMenu::with(['guests'])->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        $data['ungroups']   = GuestBook::whereNotIn('group_id',$group->pluck('id'))->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        $data['unmenu']   = GuestBook::where('menu_id',null)->where('user_id',$userid)
                                ->orWhere('user_id',Auth::user()->partner_id)->get();
        return $data;
    }

    public function showgroup(Request $request)
    {  
        return view('front.wedding_planner.couple.guest.group-tab',$this->loadGuest($request));
    }

    public function showmenu(Request $request)
    {   
        return view('front.wedding_planner.couple.guest.menu-tab',$this->loadGuest($request));
    }

    public function showattendance(Request $request)
    {
        return view('front.wedding_planner.couple.guest.attendence-tab',$this->loadGuest($request));
    }
    public function changeAttendence(Request $request)
    {
        //echo $request->value;die;
        if($request->ajax()){

            $id = $request->id;
            $value = $request->value;
            $res = new GuestBookAttendence();
            $att = $res->pluck('id')->toArray(); //print_r($att);die;
            $att_name = $res->where('id',$value)->pluck('name');
            //echo $att_name[0];die;
            if(in_array($value, $att))
            { 
                //echo $value;die;    
                $guest = GuestBook::findOrFail($id);
                $guest->update(['attendence_id'=>$value]);               
                $result['src'] = asset('front/wedding_planner/image/attendance/'.strtolower($att_name[0]).'.png');
                return response()->json($result);
            }           
        }       
    }

    public function changeMenu(Request $request)
    {
        if($request->ajax()){
            $id = $request->userid;
            $value = (int)$request->menuid; 
            $guest = GuestBook::findOrFail($id);
            $guest->update(['menu_id'=>$value]);   
            //dd($guest);
            //$result['src'] = asset('image/'.strtolower($value).'.png');     
            return response()->json($guest);
        }       
    }
    public function changeGroup(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $value = (int)$request->value; 
            $guest = GuestBook::findOrFail($id)->update(['group_id'=>$value]);   
            //$result['src'] = asset('image/'.strtolower($value).'.png');     
            return response()->json($guest);
        }       
    }
    public function changeBulkStatus(Request $request)
    {
        $idArray = $request->id;
        $value = $request->value;
        $column = $request->column;
        //dd($idArray,$value);
        $update = GuestBook::whereIn('id', $idArray)
            ->update([
                $column => $value,// Add as many as you need        
            ]);
        return response()->json($update);
    }
    public function deleteBulkGuest(Request $request)
    {
        $idArray = $request->id;        
        $delete = GuestBook::whereIn('id', $idArray)
            ->delete();
        return response()->json($delete);
    }
}