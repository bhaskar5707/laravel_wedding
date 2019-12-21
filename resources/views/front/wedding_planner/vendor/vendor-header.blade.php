
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2">
                    <img src="" alt="" class="coupleimage1 img-circle">
                </div>
                <div class="profile-info col-md-8">
                    <h1 class="profile-title">vendor</small></h1>
                
                    <div class="text">
                        
                      <div class="pull-right">
                          <a href="" data-target="#laststep" data-toggle="modal" data-id="" class="dash-summary-edit btn-outline outline-red hide">Edit</a>
                      </div>
                      <ul>
                         <li><img src="{{ asset('front/wedding_planner/image/calender.png') }}" class=""/>
                              <a href="#" data-toggle="modal" data-target="#registerUser" onclick="return confirm('Are you sure want to change wedding date?')">Wedding Date</a>
                         </li>
                        
                         <li>
                              <img src="{{ asset('front/wedding_planner/image/website.png') }}" class=""/>
                      </ul>
                      
                      <div class="centeround">
                         <div class="progressbar"></div>                                         
                      </div>
                    </div>  
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
                    <li><a href="couple-dashboard.html"><i class="fa fa-dashboard db-icon"></i>Home</a></li>
                    <li><a href="{{url('storefront-business')}}"><i class="fa fa-heart db-icon"></i>Storefront </a></li>
                    <li><a href="couple-checklist.html"><i class="fa fa-list db-icon"></i>Message</a></li>
                    <li><a href="couple-budget.html"><i class="fa fa-calculator db-icon"></i>Leads</a></li>
                    <li class="{{ Request::segment(1) === 'couple-dashboard-guest-book' ? 'active' : null }}"><a href="{{ url('/couple-dashboard-guest-book').'#showthis' }}"><i class="fa fa-users db-icon"></i>Review</a></li>
                    <li><a href="{{url('vendor-dashboard-my-account-settings')}}"><i class="fa fa-user db-icon"></i>My Account</a></li>
                    <li class="{{ Request::segment(1) === 'couple-dashboard-website' ? 'active' : null }}"><a href="{{ url('/couple-dashboard-website') }}">Finance</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>









        



