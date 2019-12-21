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
                    <li><a href="couple-guestlist.html"><i class="fa fa-users db-icon"></i>My Guest List</a></li>
                    <li class="active"><a href="couple-profile.html"><i class="fa fa-user db-icon"></i>My Profile</a></li>
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
                                <h1>Account Details <small>Change your personal profile and wedding details</small></h1>
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
            <div class="col-md-12 profile-dashboard">
                <div class="row">
                    <div class="col-md-7 dashboard-form calender">
                        <form class="form-horizontal">
                            <div class="bg-white pinside40 mb30">
                                <!-- Form Name -->
                                <h2 class="form-title">Upload Profile Photo</h2>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <div class="photo-upload"><img src="images/profile-dashbaord.png" alt=""></div>
                                    </div>
                                    <div class="col-md-8 upload-file">
                                        <input id="filebutton" name="filebutton" class="input-file" type="file">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <h2 class="form-title">Pesonal Infomations</h2>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">First Name<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Vendor Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Last Website </label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Vendor Website" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Email<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Email" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Phone<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Phone" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <h2 class="form-title">Wedding Details</h2>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="weddingdate">Wedding Date<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="weddingdate" placeholder="Wedding Date">
                                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="weddingdate">Wedding City<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="weddingdate" name="weddingdate" type="text" placeholder="Vendor Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="weddingdate">Wedding State<span class="required">*</span></label>
                                    <div class="col-md-8">
                                        <input id="weddingdate" name="weddingdate" type="text" placeholder="Vendor Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <h2 class="form-title">Socail Media Profile</h2>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="facebook">Facebook URL</label>
                                    <div class="col-md-8">
                                        <input id="facebook" name="facebook" type="text" placeholder="Facebook URl" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="twitter">Twitter URL</label>
                                    <div class="col-md-8">
                                        <input id="twitter" name="twitter" type="text" placeholder="Twitter Url" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">Linkedin URL</label>
                                    <div class="col-md-8">
                                        <input id="linkedin" name="linkedin" type="text" placeholder="Linkedin Url" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pinterest">Pinterest URL</label>
                                    <div class="col-md-8">
                                        <input id="pinterest" name="pinterest" type="text" placeholder="Pinterest Url" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="instagram">instagram URL</label>
                                    <div class="col-md-8">
                                        <input id="instagram" name="instagram" type="text" placeholder="Instagram Url" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 dashboard-form">
                        <form class="form-horizontal">
                            <div class="bg-white pinside30">
                                <!-- Form Name -->
                                <h2 class="form-title">Change Password</h2>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="oldpassword">Old Password</label>
                                    <div class="col-md-8">
                                        <input id="oldpassword" name="oldpassword" type="text" placeholder="Old Password" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="newpassword">New Password</label>
                                    <div class="col-md-8">
                                        <input id="newpassword" name="newpassword" type="text" placeholder="New Password" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="ConfirmPassword">Confirm Password</label>
                                    <div class="col-md-8">
                                        <input id="ConfirmPassword" name="ConfirmPassword" type="text" placeholder="Confirm Password" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="submit"></label>
                                    <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary btn-lg">Save Password</button>
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
@endsection 

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
