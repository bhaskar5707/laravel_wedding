@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
    <div class="main-container">
        <div class="container">
            

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                    	<div class="bg-white pinside40 mb30">
                        <ul>
		                    <li class="active"><a class="item" href={{url('vendor-dashboard-my-account-settings')}}>Settings </a></li>
		                    <li ><a class="item" href={{ url('/vendor-account-collaboration') }}>Collaborator Medal</a></li>
		                </ul>
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
                        @if($setting)
                        @php
                        $setting = json_decode($setting->acc_setting);
                        @endphp
                        @endif
		                    <h1 class="main-head-cntct">Settings</h1>
			            	<div class="notification">
			                	<div class="text">
			            		<h2>Notifications</h2>
			                    <p>Our emails contain useful information that can help you improve your Storefront and grow your business using your Tayariyaan.com account. <br>We do not want you to receive emails you are not interested in. You can choose which emails you want and don't want to receive. </p>
			                    </div>
			                    <div class="form">
			                       
			                    <form method="POST" action="{{url('acount_setting')}}">
			                    {{csrf_field()}}
			                            <ul>
			                                <li>
			                                    <input type="checkbox"  name="acc_setting[]" @if($setting) @if(in_array("newsletter", $setting)) checked=checked @elseif(!in_array("newsletter", $setting)) checked!=checked  @else  checked=checked  @endif @else checked=checked @endif value="newsletter">
			                                    <p>Monthly newsletter with my Storefront information</p>
			                                </li>
			                                <li>
			                                    <input type="checkbox"  name="acc_setting[]" @if($setting) @if(in_array("training", $setting)) checked=checked @elseif(!in_array("training", $setting)) checked!=checked  @else  checked=checked  @endif @else checked=checked @endif value="training">
			                                    <p>Training emails during the first week</p>
			                                </li>
			                                <li>
			                                    <input type="checkbox"  name="acc_setting[]" @if($setting) @if(in_array("alerts", $setting)) checked=checked @elseif(!in_array("alerts", $setting)) checked!=checked  @else  checked=checked  @endif @else checked=checked @endif value="alerts">
			                                    <p>Alerts to know what to improve on my Storefront</p>
			                                </li>
			                            </ul>
			                            <input class="submitbtn" type="submit" value="Save">
			                        </form>
			                    </div>                
			                </div>

	                       
	                    </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection 

