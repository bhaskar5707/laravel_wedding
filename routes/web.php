<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wedding', function () {
    return view('front/wedding_site/wedding_website1');
});
Route::get('/wedding1', function () {
    return view('front/wedding_planner/index');
});
Route::get('/couple-reg', function () {
    return view('front/wedding_planner/couple/registration');
});
Route::get('/couple-login', function () {
    return view('front/wedding_planner/couple/login');
});
Route::get('/couple-budget', function () {
    return view('front/wedding_planner/couple/couple-budget');
});
Route::get('/couple-checklist', function () {
    return view('front/wedding_planner/couple/couple-checklist');
});
Route::get('/couple-dashboard', function () {
    return view('front/wedding_planner/couple/couple-dashboard');
});
Route::get('/couple-guestlist', function () {
    return view('front/wedding_planner/couple/couple-guestlist');
});
Route::get('/couple-profile', function () {
    return view('front/wedding_planner/couple/couple-profile');
});
Route::get('/couple-wishlist', function () {
    return view('front/wedding_planner/couple/couple-wishlist');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*  Couple  Login Credential        */
Route::get('/couple-registration/{referId?}', 'HomeController@signUp')->name('signUp');
Route::post('couple-registration', 'HomeController@couple_store');
Route::get('/couple-login', 'HomeController@couple_login')->name('couple-login');
Route::post('couple-login', 'HomeController@login');
Route::post('/couple/reset', 'HomeController@login');
Route::get('/couple-logout', 'HomeController@logout');
Route::post('customer-review', 'HomeController@customer_review');
Route::get('get-state-list','AjaxController@getStateList');
Route::get('get-city-list','AjaxController@getCityList');
/*  Couple  Login Credential End    */


Route::group(['middleware'=>'auth'], function(){
/* Couple Dashboard start */
Route::get('/Dashboard', 'UserController@couple_dashboard')->name('couple.dashboard');
Route::post('/couple/dashboard/update/{id}', 
    ['uses'=>'UserController@updateUser','as'=>'couple.dashboard.update']);
Route::post('/couple/dashboard/send-invitation/', 
    ['uses'=>'UserController@partner_invitation','as'=>'couple.partner.invitation']);
Route::get('/couple/guest/invitation/{id}/edit',
    ['uses'=>'Couple\GuestBookController@invitationEdit','as'=>'guest.invitation.edit']);
Route::post('/couple/guest/invitation/{id}/edit',
    ['uses'=>'Couple\GuestBookController@invitationUpdate','as'=>'guest.invitation.update']);
Route::get('/couple/guest/invitation/{id}/delete',
    ['uses'=>'Couple\GuestBookController@invitationDelete','as'=>'guest.invitation.delete']);


/******   GuestBook     *****/
Route::get('/couple-dashboard-guest-book/{ord?}', 
    ['uses'=> 'Couple\GuestBookController@couple_guest_book','as'=>'guestbook.index']);
Route::get('/couple-guests-showgroup', 'AjaxController@showgroup');
Route::get('/couple-guests-showmenu', 'AjaxController@showmenu');
Route::get('/couple-guests-showattendance', 'AjaxController@showattendance');

Route::post('/couple/guestbook/group/store', 
    ['uses'=> 'Couple\GuestBookController@groupstore','as'=>'guest.group.store']);
Route::post('/couple/guestbook/menu/store', 
    ['uses'=> 'Couple\GuestBookController@menustore','as'=>'guest.menu.store']);
Route::post('/couple/guestbook/store', 
    ['uses'=> 'Couple\GuestBookController@store','as'=>'guest.store']);
Route::post('/guest/add/companions/store','AjaxController@storeCompanions');

Route::get('/couple/guest/{id}/edit', 
    ['uses'=> 'Couple\GuestBookController@guestedit','as'=>'couple.guest.edit']);
    Route::post('group/delete/{id}','Couple\GuestBookController@groupdelete')->name('guest.group.delete');
Route::post('couple/guest/{guest}/delete', 
    ['uses'=> 'Couple\GuestBookController@guestDelete','as'=>'couple.guest.delete']);
Route::post('/changeAttendence','AjaxController@changeAttendence');
Route::post('/changeMenu','AjaxController@changeMenu');
Route::post('/changeGroup','AjaxController@changeGroup');
Route::post('group/update','Couple\GuestBookController@groupupdate')->name('guest.group.update');

            /*    Online Invitation  */
Route::get('/couple/guest/online-invitation/', 
    ['uses'=>'Couple\GuestBookController@online_invitation','as'=>'couple.guest.invitation']);
Route::post('/couple/guest/invitation/save/',
    ['uses'=>'Couple\GuestBookController@invitationSave','as'=>'guest.invitation.store']);
Route::get('/couple/guest/invitation/{id}/sent',
    ['uses'=>'Couple\GuestBookController@invitation_preview','as'=>'invitation.preview']);
Route::get('/mail/{id}/sent',
    ['Couple\GuestBookController@mailpreview','as'=>'invitation.mail.preview']);
Route::post('/rsvp/guest/select','AjaxController@selectguestforrsvp');



################ Wedding Website ##################

Route::get('/couple-dashboard-album', 'UserController@couple_album');
Route::match(['get','post'],'/edit-ablum-url/{id}','UserController@editAblumUrl');

########## Album #########
Route::match(['get','post'],'/my-album/{user_name}/{id}','UserController@verifyGuest');

Route::get('check-mobile-number','UserController@ChechGuestMobileNumber');
Route::post('check-mobile-number','UserController@ChechGuestMobileNumber');

Route::get('check-mobile-otp','UserController@ChechVerificationCode');
Route::post('check-mobile-otp','UserController@ChechVerificationCode');

Route::post('guest-photos/upload/store','UserController@fileStore');
Route::get('guest-photos/delete','UserController@fileDestroy');

Route::get('/guest-albumby-id/delete/{id}','UserController@guestPhotoDelete');
Route::get('/album/download/{name}','UserController@album_download');

Route::match(['get','post'],'/album/share/{name}','UserController@album_share');
########## Album #########

Route::get('/couple-dashboard-website', 'UserController@couple_website');
Route::get('/couple-dashboard-our-story-list/{id}', 'UserController@our_story_list')->name('ourstory');
Route::get('/couple-dashboard-our-story', 'UserController@our_story')->name('add.ourstory');
Route::post('/add-our-story', 'UserController@add_our_story');
Route::get('/delete-our-story/{id}','UserController@deleteOurStory');
Route::match(['get','post'],'/edit-our-story/{id}','UserController@editOurStory')->name('edit.ourstory');

Route::get('/couple-dashboard-wedding-ceremony-list', 'UserController@wedding_ceremony_list')->name('ceremony');
Route::get('/couple-dashboard-wedding-ceremony', 'UserController@wedding_ceremony')->name('add.ceremony');
Route::post('/add-wedding-ceremony', 'UserController@add_wedding_ceremony');
Route::get('/delete-wedding-ceremony/{id}','UserController@delete_wedding_ceremony');
Route::match(['get','post'],'/edit-wedding-ceremony/{id}','UserController@editwedding_ceremony')->name('edit.ceremony');


Route::get('/couple-dashboard-wedding-group-list', 'UserController@wedding_group_list')->name('group_list');
Route::match(['get','post'],'/edit-wedding-guest/{id}','UserController@editwedding_guest')->name('add.group_list');
Route::post('/changeBulkStatus', 'AjaxController@changeBulkStatus');
Route::post('/deleteBulkGuest', 'AjaxController@deleteBulkGuest');



Route::get('/couple-dashboard-wedding-blog-list', 'UserController@wedding_blog_list')->name('wedding-blog');
Route::get('/couple-dashboard-wedding-blog', 'UserController@wedding_blog')->name('add.wedding-blog');
Route::post('/add-wedding-blog', 'UserController@add_wedding_blog');
Route::get('/delete-wedding-blog/{id}','UserController@delete_wedding_blog');
Route::match(['get','post'],'/edit-wedding-blog/{id}','UserController@editwedding_blog')->name('edit.wedding-blog');

Route::get('/web/{mywedding}', 'UserController@couple_wedding_website');
Route::get('/photo-comment-like/{id}', 'UserController@photoCommentLike');
Route::post('/photo-comment-like/{id}', 'UserController@photoCommentLike');

Route::get('/wedding-website-blog-detail/{id}', 'UserController@wedding_blog_details');
Route::post('/wedding-website-blog-detail/{id}', 'UserController@wedding_blog_details');

Route::get('ajaxRequest', 'UserController@ajaxRequestPost');
Route::get('ajaxRequestInvitation', 'UserController@ajaxRequestInvitationPost');

################ Wedding Website ##################


});



Route::group(['prefix' => 'vendor'], function () 
{
  /*Route::get('/login', 'VendorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'VendorAuth\LoginController@login');
  Route::post('/logout', 'VendorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'VendorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'VendorAuth\RegisterController@register');*/

  Route::post('/password/email', 'VendorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'VendorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'VendorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'VendorAuth\ResetPasswordController@showResetForm');

  Route::get('/business-login', 'VendorController@Business_login')->name('vendor-login');
  Route::post('vendor-login', 'VendorController@login');

  Route::get('/vendor-registration', 'VendorController@signUp')->name('vendor-signUp');
  Route::post('vendor-registration', 'VendorController@vendor_store_first');
  Route::get('/vendor-registration-next/{id}', 'VendorController@vendor_store_next');
  Route::post('vendor-registration-next', 'VendorController@vendor_store');
  Route::get('/vendor-logout', 'VendorController@logout');
  
  

});


Route::group(['middleware'=>'vendor'], function(){

  Route::get('/vendor-dashboard', 'VendorController@vendor_dashboard')->name('vendor-Dashboard');

  Route::get('/storefront-business', 'VendorController@vendor_store_front');
  Route::post('/vendor-business-information', 'VendorController@business_information');
  Route::get('/vendor-dashboard-storefront-location', 'VendorController@vendor_storefront_location');
  Route::post('vendor_location','VendorController@vendor_location');

  Route::get('/vendor-dashboard-storefront-faq', 'VendorController@vendor_dashboard_storefront_faq')->name('vendor_faq');
  Route::post('update_faq', 'VendorController@vendor_update_faq_answer_reg');

  Route::get('/vendor-dashboard-storefront-promotion', 'VendorController@vendor_dashboard_promotion');
  Route::post('vendor-promotion-perc', 'VendorController@vendor_promotion_perc');
  Route::get('/vendor-add-promotion', 'VendorController@vendor_add_promotion');
  Route::post('vendor-other-promotion', 'VendorController@vendor_other_promotion');
  Route::get('/vendor/promotion/edit/{id}', 'VendorController@promotion_edit');
  Route::post('vendor-other-promotion/update/{id}', 'VendorController@vendor_other_promotion_update');
  Route::get('/vendor/promotion/delete/{id}', 'VendorController@promotion_delete');

  Route::get('/vendor-dashboard-my-account-settings', 'VendorController@vendor_dashboard_my_account_settings');
  Route::post('acount_setting', 'VendorController@acount_setting');
  Route::get('/vendor-account-collaboration', 'VendorController@account_collaboration');

});


Route::get('get-country-list','AjaxController@getCountryList');
Route::get('/ajax-subcat',function () {
$cat_id = Input::get('cat_id');
$subcategories = DB::table('wed_sub_category')->where('category_id','=',$cat_id)->get();
return Response::json($subcategories);});


//http://itsolutionstuff.com/post/laravel-5-dynamic-dependant-select-box-using-jquery-ajax-example-part-2example.html
