@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
    <div class="main-container">
        <div class="container">
            

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                    	<div class="bg-white pinside40 mb30">
                         @include('front.wedding_planner.vendor.storefront_left') 
                        </div>
                    </div>
                    <div class="col-md-8">
	                    <div class="bg-white pinside40 mb30">
                        @if (Session::has('error_message'))
                        <h2 style="color:red">{{ Session::get('error_message') }}</h2>
                        @endif

                        @if (Session::has('success_message'))
                        <h2 style="color:green">{{ Session::get('success_message') }}</h2>
                        @endif



                        <div class="business">
                        <form method="POST" action="{{url('vendor-business-information')}}">
                        {{csrf_field()}}
                            <h2 class="heding-desgn">Login Information</h2>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>Username</label>
                                    <input type="text" value="{{ isset($username) ? $username : '' }}"  placeholder="Username" name="user_name" id="user_name" class="form-control" />
                                  </div>

                                  <script>
                                   function show_password()
                                    {
                                      $(".hd").toggle("fast");
                                    }
                                  </script>
                                  <div class="col-md-12">
                                    <a href="javascript:void(0);" class="chn-pssd" onclick="return show_password();"><i class="fa fa-question-circle" aria-hidden="true"></i>&ensp;Change Password</a>

                                    <div class="hd" style="display: none;">
                                      <label>Your Password</label>
                                      <input type="password" placeholder="Your old Password" name="current" class="form-control" />
                                      <label>New Password</label>
                                      <input type="password" placeholder="New Password" name="password" class="form-control" />
                                      <label>Confirm Password</label>
                                      <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control" />
                                    </div>                                    
                                  </div>
                                  <div class="col-md-12"><div id="return_msg"></div></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h2 class="heding-desgn">Describe your Business & Services</h2>
                                <p style="text-align: left; font-size: 14px; line-height: 20px; margin-top: 13px;">Share unique, descriptive information about your business in order to convert couples and improve your ranking across top search engines. Please do not include any contact information in this section.</p>
                                <div class="row"  >
                                  <div class="col-md-12 form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                   <textarea class="textarea" name="description" maxlength="255" placeholder="Enter Max 255 Characters..." id="txtEditor" style=" "> @if($business_info){{ $business_info->description}}@endif </textarea>
                                   {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                 </div>
                                 <div class="col-md-10 ">

                                 </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="heding-desgn">Personal Information</h2>
                                        <div class="col-md-12 contact">

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                            
                                                <label>Name</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->first_name) ?  $personal_info->first_name.' '.$personal_info->last_name : old('first_name') }}" placeholder="" class="form-control" tabindex=1 />
                                               
                                            </div>
                                            <div class="form-group">
                            
                                                <label>Email</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->email) ?  $personal_info->email : old('email') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>Mobile Number</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->phone) ?  $personal_info->phone : old('phone') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>Business Name</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->business_name) ?  $personal_info->business_name : old('business_name') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>Business Category</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->business_category) ?  $personal_info->business_category : old('business_category') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>Business Sub Category</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->sub_category) ?  $personal_info->sub_category : old('sub_category') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                    
                                           </div>
                                           
                                           
                                            <div class="col-md-6">
                                            <div class="form-group">
                            
                                                <label>Country</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->countryname) ?  $personal_info->countryname : old('country') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>State</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->statename) ?  $personal_info->statename : old('state') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                            <div class="form-group">
                            
                                                <label>City</label>
                            
                                                <input type="text" readonly value="{{ isset($personal_info->cityname) ?  $personal_info->cityname : old('city') }}" placeholder="" class="form-control" tabindex=1 />
                                            </div>
                                           
                                    
                                           </div>
                                           
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <div class="col-md-12">
                                 <h2 class="heding-desgn">Contact Information</h2>
                                </div>
                                <div class="col-md-12 contact">

                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">

                                     <label>Name</label>
                     
                                     <input type="text" value="{{ isset($business_info->name) ?  $business_info->name : isset($personal_info->first_name) ?  $personal_info->first_name.' '.$personal_info->last_name : old('name') }}" placeholder="" name="name" class="form-control" tabindex=1 />
                                      {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                   </div>
                                   <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                       <label>Email</label>
                                       <input type="text" value="{{ $ven_data->email }}" placeholder="" name="email" class="form-control" readonly="true" tabindex=3/>
                                       {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                     </div>
                                   <div class="form-group {{ $errors->has('altername_email') ? 'has-error' : ''}}">
                                     <label>Alternate&nbsp;Email</label>
                                     <input type="text"  placeholder="" name="alternate_email"  class="form-control" value="{{ isset($business_info->alternateemail) ?  $business_info->alternateemail : old('alternate_email') }}" tabindex=5 />
                                     {!! $errors->first('alternate_email', '<span class="help-block">:message</span>') !!}
                                   </div>
                                   <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                     <label>Mobile</label>
                                     <input type="text" value="{{ isset($business_info->mobile) ?  $business_info->mobile : old('mobile') }}" placeholder="" name="mobile" class="form-control" tabindex=7 />
                                     {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                                     </div>
                                   <div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
                                       <label>Telephone</label>
                                       <input type="text" value="{{ isset($business_info->telephone) ? $business_info->telephone : old('telephone') }}" placeholder="" name="telephone" class="form-control" tabindex=9/>
                                       {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
                                     </div>
                                     <div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
                                       <label>Fax</label>
                                       <input type="text"  placeholder="" name="fax" class="form-control" value="{{ isset($business_info->fax) ? $business_info->fax : old('fax') }}" tabindex=11/>
                                       {!! $errors->first('fax', '<span class="help-block">:message</span>') !!}
                                     </div>
                                   <div class="form-group">
                                     <label>Website</label>
                                     <input type="text" value="{{ isset($business_info->website) ? $business_info->website : old('website') }}" placeholder="" name="website" class="form-control" tabindex=13/>
                                   </div>

                                 </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                   <label>Company Name</label>
                                   <input type="text" placeholder="" name="companyname"  class="form-control" value="{{ isset($business_info->companyname) ? $business_info->companyname : isset($personal_info->business_name) ? $personal_info->business_name :  old('companyname') }}" tabindex=2/>                
                                 </div>
                                 <div class="form-group">
                                   <label>Company Address</label>
                                   <input type="text" placeholder="" name="companyaddress"  class="form-control" value="{{ isset($business_info->companyaddress) ? $business_info->companyaddress : old('companyaddress') }}" tabindex=4/>                
                                 </div>
                                     <div class="form-group {{ $errors->has('gstno') ? 'has-error' : ''}}">
                                     <label>GST&nbsp;Number</label>
                                     <input type="text"  placeholder="" name="gstno"  class="form-control" value="{{ isset($business_info->gstno) ?  $business_info->gstno : old('gstno') }}" tabindex=6/>
                                     {!! $errors->first('gstno', '<span class="help-block">:message</span>') !!}
                                   </div>
                                     
                                     <div class="form-group {{ $errors->has('gstinholdername') ? 'has-error' : ''}}">
                                       <label>GSTIN Holder Name</label>
                                       <input type="text" placeholder="" name="gstinholdername"  class="form-control" value="{{ isset($business_info->gstinholdername) ? $business_info->gstinholdername : old('gstinholdername') }}" tabindex=8 />
                                       {!! $errors->first('gstinholdername', '<span class="help-block">:message</span>') !!}
                                     </div>
                                     <div class="form-group">
                                   <label>GSTIN Holder Address</label>
                                   <textarea class="form-control" name="gstinaddress" tabindex=10>{{ isset($business_info->gstinaddress) ? $business_info->gstinaddress : old('gstinaddress') }} </textarea>
                                 </div>
                                 <div class="form-group">
                                   <label>Add Address</label>
                                   <textarea class="form-control" name="address" tabindex=12>{{ isset($business_info->address) ? $business_info->address : old('address') }} </textarea>
                                 </div>
                                 
                                    </div>

                                    <div class="col-md-12">

                                      <div class="form-group">
                                        <p><input type="checkbox" style="width: 2% !important" tabindex=14 required> The published content meets Tayariyan's<a href="#"> legal terms</a></p>
                                        <input type="submit" name="submit" id="save" Value="SAVE" style="width: 12% !important" class="vndr-submit" tabindex=15/>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                </div>
                            </div>                                  
                            </form>


                             </div>
                        
			            	

	                       
	                    </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


<script>
    $( ".vendordashboardmenu ul li:nth-child(6)").addClass("active");
</script>


@endsection 

