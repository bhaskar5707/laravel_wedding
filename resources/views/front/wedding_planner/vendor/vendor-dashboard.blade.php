@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
    <div class="main-container">
        <div class="container">
            
            <div class="vendordata">    
		        <div class="container">
		            <div class="row">
		            	<ul>
		                	<li><span>6</span><br>RECEIVED ENQUIRES<br><span class="respnce-tme">in the last 12 months</span></li>
		                    <li><span>0:0</span><br>RESPONSE TIME<br><span class="respnce-tme">in the last 12 months</span></li>
		                    <li><span>2</span><br>REVIEWS<br><span class="respnce-tme">in the last 12 months</span></li>
		                    <li><span>6</span><br>IMPRESSIONS<br><span class="respnce-tme">in the last 12 months</span></li>
		                    <li><span>6</span><br>VIEWED TELEPHONE<br><span class="respnce-tme">in the last 12 months</span></li>
		                </ul>                
		            </div>
		        </div>
		    </div>


            <div class="row">
                <div class="col-md-4">
                    <!-- wedding days block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Wedding days to go</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">540</h1>
                        </div>
                        <div>SAT, 31 MARCH 2018</div>
                    </div>
                </div>
                <!-- wedding days block -->
                <div class="col-md-4">
                    <!-- wedding budget block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Your Budget</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">$20,000</h1>
                        </div>
                        <div>Spent $1200 out of $20,000 so far.</div>
                    </div>
                </div>
                <!-- wedding budget block -->
                <div class="col-md-4">
                    <!-- wedding budget block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Checklist - todos</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">78</h1>
                        </div>
                        <div>Completed 3 of 78 checklist items</div>
                    </div>
                </div>
                <!-- wedding budget block -->
                <div class="col-md-4">
                    <!-- wedding wishlist block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Wishlit Item</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">8</h1>
                        </div>
                        <div>Add more item. Compare &amp; Finalize</div>
                    </div>
                </div>
                <!-- wedding wishlist block -->
                <div class="col-md-4">
                    <!-- wedding budget block -->
                    <div class="bg-white pinside40 mb30">
                        <h4>Invited guests</h4>
                        <div class="wd-days-count mb40 mt40">
                            <h1 class="title-number">160</h1>
                        </div>
                        <div class="guest-status"><span class="invite-accepted">0 accepted</span> | <span class="invite-descline">0 declined</span> | <span class="invite-noresponse">0 not responded</span></div>
                    </div>
                </div>
                <!-- wedding budget block -->
            </div>
        </div>
    </div>
<style type="text/css">
	.vendordata ul {
	    float: left;
	    width: 100%;
	    border: 1px solid #ccc;
	    padding: 25px 0;
	    border-radius: 4px;
	}
	.vendordata .container {
	    padding: 0 17px;
	}
	.vendordata ul {
	    float: left;
	    width: 100%;
	    border: 1px solid #ccc;
	    padding: 25px 0;
	    border-radius: 4px;
	}
	.vendordata ul li {
	    float: left;
	    list-style-type: none;
	    width: 20%;
	    text-align: center;
	    color: #000;
	    font-size: 18px;
	    border-right: 1px solid #ccc;
	}
	.vendordata ul li span {
	    color: #b4245d;
	    font-size: 25px;
	}
	.vendordata ul li .respnce-tme {
	    font-size: 13px;
	    color: #a2a2a2;
	}
</style>
@endsection 

