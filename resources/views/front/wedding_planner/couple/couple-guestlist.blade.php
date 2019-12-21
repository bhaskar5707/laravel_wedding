@extends('front.wedding_planner_layout.mainlayout')
@section('content')
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="{!! asset('front/wedding_planner/images/couple-profile.jpg') !!}" alt="" class="img-circle"></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">Emma &amp; Jhon<small>Welcome Back Couple</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="couple-dashboard.html"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                    <li><a href="couple-wishlist.html"><i class="fa fa-heart db-icon"></i>My Wishlist </a></li>
                    <li><a href="couple-checklist.html"><i class="fa fa-list db-icon"></i>My Checklist</a></li>
                    <li><a href="couple-budget.html"><i class="fa fa-calculator db-icon"></i>My Budget</a></li>
                    <li class="active"><a href="couple-guestlist.html"><i class="fa fa-users db-icon"></i>My Guest List</a></li>
                    <li><a href="couple-profile.html"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>My Guestlist <small>Your Summary</small></h1>
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
            <div class="col-md-12">
                <div class="couple-board">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coming-soon-content text-center pinside80">
                                <h4>Comming Soon Features</h4>
                                <h1 class="text-mute">Stay tuned more to come</h1>
                                <a href="#" class="btn btn-primary">Thanks for wait</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
