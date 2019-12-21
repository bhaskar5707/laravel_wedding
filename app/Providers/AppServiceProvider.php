<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
         
        view()->composer('front.wedding_planner.couple.couple-header', function($view){
            $user = User::with(['partner'])->where('id',Auth::user()->id)->first();
             $leftImage = asset('front/wedding_planner/image/imggroom.jpg');
             $rightImage = asset('front/wedding_planner/image/imgbride.jpg');
            if ($user->gender == 1) {
                $leftImage = isset($user->profile_img) && !empty($user->profile_img) ? asset('front/wedding_planner/image/couple/'.$user->profile_img) : asset('front/wedding_planner/image/imggroom.jpg') ;
                $rightImage = isset($user->partner->profile_img) && !empty($user->partner->profile_img) ? asset('front/wedding_planner/image/couple/'.$user->partner->profile_img) : asset('front/wedding_planner/image/imgbride.jpg');
            }
            if ($user->gender == 2) {
                $leftImage = isset($user->partner->profile_img) && !empty($user->partner->profile_img) ? asset('front/wedding_planner/image/couple/'.$user->partner->profile_img) : asset('front/wedding_planner/image/imggroom.jpg');
                $rightImage = isset($user->profile_img) && !empty($user->profile_img) ? asset('front/wedding_planner/image/couple/'.$user->profile_img) : asset('front/wedding_planner/image/imgbride.jpg') ;
            }
            if ($user->gender == 3) {
                $leftImage = asset('front/wedding_planner/image/imggroom.jpg');
                $rightImage = asset('front/wedding_planner/image/imgbride.jpg');
            }
            
            /*$homepageid = AdsLocation::where('title','vendor List')->first()->id;
            $banners = Ads::where('location_id',$homepageid)
                    ->whereIn('adspackage_id',[1,2,3])
                    ->whereRaw('? between start_date and end_date', [date('d-m-Y')])
                    ->orderBy('adspackage_id')
                    ->take(7)
                    ->get();*/
            $view->with(['user' => $user, 'leftImage' => $leftImage, 'rightImage' => $rightImage/*,'banners'=>$banners*/]);
        });


        /*view()->composer('pages.vendor-head', function($view){
            $vendor_id = Auth::guard('vendor')->id();
            $ven_data= Vendor::where('id',$vendor_id)->get();

            $data = VendorStorefront::where('vendor_id', $vendor_id)->get();
            $homepageid = AdsLocation::where('title','storefront')->first()->id;  
            $banners = Ads::where('location_id',$homepageid)
                    ->whereIn('adspackage_id',[1,2,3])
                    ->whereRaw('? between start_date and end_date', [date('d-m-Y')])
                    ->orderBy('adspackage_id')
                    ->take(7)
                    ->get(); 

            $vendorpackage = isset($ven_data[0]->package_id) && ($ven_data[0]->package_id >0) ? DB::table('vendor_package')->where('id',$ven_data[0]->package_id)->first() : '';
            $view->with(['ven_data'=>$ven_data,'data'=>$data,'vendorpackage'=>$vendorpackage,'banners'=>$banners]);
        });*/
    }
}
