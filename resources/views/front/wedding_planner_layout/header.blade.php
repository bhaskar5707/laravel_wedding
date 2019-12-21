<body>
    <div class="collapse" id="searcharea">
        <!-- top search -->
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Search</button>
          </span>
        </div>
    </div>
    <!-- /.top search -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 top-message">
                    <p>Welcome to Wedding Vendor.</p>
                </div>
                <div class="col-md-6 top-links">
                    <ul class="listnone">
                        @if($user = Auth::user())
                            <li><a href="{{ route('couple.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('/couple-logout') }}">Logout</a></li>
                        @elseif($vendor = Auth::guard('vendor')->check())
                            <li><a href="{{ url('/vendor-dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('/vendor/vendor-logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ url('couple-registration') }}" class=" ">I m couple</a></li>
                            <li><a href="{{ url('couple-login') }}">Log in</a></li>
                            <li><a href="{{ url('vendor/business-login') }}">Are you vendor?</a></li>
                        @endif
                        
                        <li>
                            <a role="button" data-toggle="collapse" href="#searcharea" aria-expanded="false" aria-controls="searcharea"> <i class="fa fa-search"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 logo">
                    <div class="navbar-brand">
                        <a href="{{url('/wedding1')}}"><img src="{!! asset('front/wedding_planner/images/logo.png') !!}" alt="Wedding Vendors" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="navigation" id="navigation">
                        <ul>
                            <li class="active"><a href="{{url('/wedding1')}}">Home</a>
                            </li>
                            <li><a href="#">Listing</a>
                                <ul>
                                    <li><a href="vendor-listing-row-map.html" title="Home" class="animsition-link">List / Half Map</a></li>
                                    <li><a href="vendor-listing-sidebar.html" title="Home" class="animsition-link">List / Sidebar Left</a></li>
                                    <li><a href="vendor-listing-no-sidebar.html" title="Home" class="animsition-link">List / No Sidebar</a></li>
                                    <li><a href="vendor-listing-top-map.html" title="Home" class="animsition-link">Top Map / List</a></li>
                                    <li><a href="vendor-list-4-colmun.html" title="Home" class="animsition-link">4 Column List</a></li>
                                    <li><a href="vendor-list-3-colmun.html" title="Home" class="animsition-link">3 Column List</a></li>
                                    <li><a href="vendor-list-horizontal.html" title="Home" class="animsition-link">Horizontal List </a></li>
                                    <li><a href="vendor-list-new.html" title="Home" class="animsition-link">List Variations </a></li>
                                    <li><a href="vendor-listing-bubba.html">Bubba Style Listing</a></li>
                                    <li><a href="vendor-listing-ocean.html">Ocean Style Listing</a></li>
                                </ul>
                            </li>
                            <li><a href="vendor-details.html">Vendor</a>
                                <ul>
                                    <li><a href="vendor-details.html">Vendor Simple</a></li>
                                    <li><a href="vendor-details-tabbed.html">Vendor Tabbed</a></li>
                                    <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                </ul>
                            </li>
                            <li><a href="venue-listing.html" title="Home" class="animsition-link">Suppliers</a>
                                <ul>
                                    <li><a href="venue-listing.html">Venue List</a></li>
                                    <li><a href="photography-listing.html">Photographer List</a></li>
                                    <li><a href="dresses-listing.html">Dresses List</a></li>
                                    <li><a href="florist-listing.html">Florist List</a></li>
                                    <li><a href="videography-listing.html">Videography List</a></li>
                                    <li><a href="cake-listing.html">Cake List</a></li>
                                    <li><a href="music-listing.html">Music List</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Planning Tools</a>
                                <ul>
                                    <li><a href="planning-to-do.html">To Do List</a></li>
                                    <li><a href="planning-budget.html">Budget Planner</a></li>
                                    <li><a href="couple-landing-page.html">Couple Signup (LP)</a></li>
                                    <li><a href="couple-dashboard.html">Couple Admin</a></li>
                                    <li><a href="dashboard-vendor.html">Vendor Admin</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Features</a>
                                <ul>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Listing</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="contact-us.html">Contact us</a></li>
                                    <li><a href="pricing-plan.html">Pricing Table</a></li>
                                    <li><a href="faq.html">FAQ's</a></li>
                                    <li><a href="404-error.html">404 Error</a></li>
                                    <li><a href="#">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-columns.html">Column</a></li>
                                            <li><a href="shortcode-accordion.html">Accordion</a></li>
                                            <li><a href="shortcode-tabs.html">Tabs</a></li>
                                            <li><a href="shortcode-pagination.html">Paginations</a></li>
                                            <li><a href="shortcode-typography.html">Typography</a></li>
                                            <li><a href="shortcode-accordion.html">Accordion</a></li>
                                            <li><a href="shordcods-alerts.html">Alert</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="wedding-guideline.html">Template Guideline</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Real Weddings</a>
                                <ul>
                                    <li><a href="real-wedding-listing.html">Listing</a></li>
                                    <li><a href="real-wedding-single.html">Real Wedding Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
        </div>
    </div>