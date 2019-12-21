@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.couple.couple-header')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="page-title">
                                    <h1>My Dashboard <small>Welcome Couple.</small></h1>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="action-block"> <a href="#" class="btn btn-default">BUtton</a> </div>
                            </div>
                        </div>
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
@endsection 

