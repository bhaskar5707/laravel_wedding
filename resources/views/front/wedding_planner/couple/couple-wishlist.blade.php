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
                    <li class="active"><a href="couple-wishlist.html"><i class="fa fa-heart db-icon"></i>My Wishlist </a></li>
                    <li><a href="couple-checklist.html"><i class="fa fa-list db-icon"></i>My Checklist</a></li>
                    <li><a href="couple-budget.html"><i class="fa fa-calculator db-icon"></i>My Budget</a></li>
                    <li><a href="couple-guestlist.html"><i class="fa fa-users db-icon"></i>My Guest List</a></li>
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
                                <h1>My Wishlist <small>6 vendor in wishlist</small></h1>
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
                <div class="wishlist-board">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-1.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">venue</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name </a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-2.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">Photogeaphy</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name</a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-3.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">Florist</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name</a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-4.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">Dresses</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name</a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-3.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">DJ</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name</a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-list-block mb30">
                                <!-- vendor list block -->
                                <div class="vendor-img">
                                    <a href="#"><img src="{!! asset('front/wedding_planner/images/vendor-new-2.jpg') !!}" alt="wedding venue" class="img-responsive"></a>
                                    <div class="category-badge"><a href="#" class="category-link">venue</a></div>
                                    <div class="price-lable">$600 - $800</div>
                                    <div class="favorite-action"> <a href="#" class="fav-icon"><i class="fa fa-close"></i></a> </div>
                                </div>
                                <div class="vendor-detail">
                                    <!-- vendor details -->
                                    <div class="caption">
                                        <h2><a href="#" class="title">Wedding Vendor Title Name</a></h2>
                                        <div class="vendor-meta"> <span class="location"> <i class="fa fa-map-marker map-icon"></i> Udaypur, Rajasthan</span> <span class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.vendor details -->
                            </div>
                            <!-- /.vendor list block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
