@extends('front.wedding_site_layout.mainlayout')
@section('content')  


<body class="wed_fixed_bcg wed_white">

  <!-- Music Bottom Container -->
  <div class="wed_music_content">
    <div class="wed_music_container">
      <i class="ti ti-music"></i>
    </div>
  </div>
  <!-- Music Bottom Container End -->
  
   <!-- Soundcloud -->
  <div class="wed_iframe">
    <!-- over -->
    <div class="wed_over wed_music_over" data-color="#000" data-opacity="0.5"></div>
    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/102137206&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
  </div>


  <!-- Preloader -->
  <div class="wed_page_loader">
    <div class="wed_story_content">
      <div class="wed_heart_container_row_4">
        <img class="wed_fourth_heart_1" src="{!! asset('front/wedding_site/images/small_people/heart_1.png') !!}" alt="">
        <img class="wed_fourth_heart_2" src="{!! asset('front/wedding_site/images/small_people/heart_2.png') !!}" alt="">
        <img class="wed_fourth_heart_3" src="{!! asset('front/wedding_site/images/small_people/heart_3.png') !!}" alt="">
      </div>
      <div class="wed_story_small_img">
        <img src="{!! asset('front/wedding_site/images/small_people/small_couple.png') !!}" alt="">
      </div>

    </div>
  </div>
  <!-- Preloader End-->


  <!-- Roses Animation -->
  <div id="leafContainer" data-image="roses_red"></div>
  <!-- Roses Animaton End -->

  <!-- Page -->
  <div class="wed_page" id="wed_page">

    <!-- Header -->
    <header>       
      <nav class="wed_light_nav wed_transp_nav">
        <div class="container">
          <!-- couple header -->
          <img class="wed_couple_header wed_kissing_couple animated extra" src="{!! asset('front/wedding_site/images/3.png') !!}" alt=""/>
          <img class="wed_couple_header wed_white_couple animated extra" src="{!! asset('front/wedding_site/images/3_white_couple.png') !!}" alt=""/>
          <!-- couple header end -->
          <!-- Logo -->
          <a href="#" class="wed_logo wed_logo_animation">Sally & Mark</a>

          <!-- Text Logo -->
          <div class="wed_logo_und">Wedding</div>


          <div class="wed_top_menu_mobile_link">
            <i class="ti ti-menu"></i>
          </div>
          <!-- Top Menu -->
          <div class="wed_top_menu_cont">
              <ul class="wed_top_menu">
                <li class="wed_parent"><a href="#">Home</a>
                  <ul>
                       <li><a href="01_index.html">Firefly Demo</a></li>
                       <li><a href="02_index.html">Dandelions Demo</a></li>
                       <li><a href="03_index.html">Red Roses Demo</a></li>
                       <li><a href="04_index.html">Orange Roses Demo</a></li>
                       <li><a href="06_index.html">Blue Butterflies Demo</a></li>
                       <li><a href="05_index.html">Purple Butterflies Demo</a></li>
                  </ul>
                </li>
                <li><a href="#story">Story</a></li>
                <li><a href="#where">Where&When</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#journal">Wedding Journal</a></li>   
                <li><a href="#rsvp">RSVP</a></li>                
              </ul>
          </div>
          <!-- Top Menu End -->
        </div>
        <!-- container end -->
      </nav>

    </header>
    <!-- Header End -->

    <!-- Backg Fixed -->
    <div class="wed_slider_fixed">
      <div class="wed_slider_carousel">
        <!-- Item -->
        <div class="wed_slider_img wed_image_bck wed_wht_txt" data-image="{!! asset('front/wedding_site/images/young_couple/onhim.jpg') !!}">
          <!-- Over -->
          <div class="wed_over" data-color="#000" data-opacity="0.5"></div>

        </div>
        <!-- Item End -->
      </div>
    </div>
    <!-- Backg Fixed End -->

    <!-- Slider -->
    <div class="wed_slider wed_image_bck wed_fixed wed_wht_txt wed_slider_dandelions" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/veil.jpg') !!}">
      <!-- Roses Animation -->
      <div id="leafContainer" data-image="roses_red"></div>
      <!-- Roses Animaton End -->
      <!-- over -->
      <div class="wed_over" data-color="#000" data-opacity="0.2" data-blend="multiply"></div>
      
      <div class="container">

        <!-- Slider Texts -->
        <div class="wed_slide_txt wed_slide_center_bottom text-center"  data-0="opacity:1;" data--400-bottom="opacity:0;">
          <img src="{!! asset('front/wedding_site/images/save_new4.png') !!}" height="450" alt="">
          <h4>12.09.2016</h4>
          <h3>Sally & Mark</h3>
        </div>
        <!-- Slider Texts End -->

      </div>
      <!-- container end -->

    </div>
    <!-- Slider End -->

    <!-- Content -->
    <section id="wed_content" class="wed_content">

      <!-- BORDER -->
      <div class="wed_white_inner_border wed_mt">


        <!-- story section -->
        <section id="couple" class="wed_section_outter wed_couple clearfix wed_image_bck" data-color="#fff">

          <div class="container">             
            <div class="row">
              <div class="col-sm-12 col-md-offset-2 col-md-8 text-center">
                  <div class="wed_topstory_titile wed_great_titles">
                      <h2 class="wed_margtop">
                          Happy Couple
                      </h2>
                  </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Item -->
            <div class="wed_wrapper">
              <div class="wed_img_1 skrollable skrollable-after" data-bottom="left:20%" data-center="left:0" data-image="images/young_couple/him_2.jpg" style="left: 0px; background-image: url(_images/young_couple/him_2.html);">                         
                <h6 class="wed_name_left">Mark<br><span>Holts</span></h6>
              </div>
            </div>
            <!-- Item -->
            <div class="wed_wrapper">
              <div class="wed_img_2 skrollable skrollable-after" data-bottom="right:20%" data-center="right:0" data-image="images/young_couple/her_3.jpg" style="right: 0px; background-image: url(_images/young_couple/her_3.html);">
                <h6 class="wed_name_right">Sally<br><span>Craft</span></h6>
              </div>
            </div>
            <!-- Couple Text -->
            <div class="married_txt skrollable skrollable-after" data-bottom="opacity:0" data-center="opacity:1" style="opacity: 1;">
                <h3>You're Invited</h3>
                <p>On the 19rd of September, 2015
                <br>
                <b>Mark Holts & Sally Craft</b><br>
                Laugheloped in Tucson, AZ.<br></p>
                <a href="#rsvp" class="btn btn_new">RSRV NOW</a> 
            </div>
       

          </div>
          <!-- END of CONTAINER -->

        </section> 
        <!-- Section end -->
      </div> 
      <!-- BORDER END -->



        <!-- story section -->
        <section id="story" class="wed_section_outter wed_wht_txt">

          <div class="container">             
            <div class="row">

                <div class="col-sm-12 col-md-offset-2 col-md-8 text-center">
                    <div class="wed_topstory_titile wed_great_titles">
                        <h2 class= "wed_without_after">
                            Our <img class="wed_small_img" src="{!! asset('front/wedding_site/images/1_white.png') !!}" alt=""> Story
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
              <!-- item-->
              <div class="row wed_story_row">    

                  <div class="col-sm-12 col-md-5 text-center wed_bd">
                      <div class="wed_second_border"></div>
                      <div class="wed_portfolio_item wed_story_img">
                        <div class="wed_portfolio_item_cont wed_story_cont">

                           <!--PHOTO-->
                          <img class= "wed_img_height" src="{!! asset('front/wedding_site/images/young_couple/alongbeach.jpg') !!}" alt="" >                            
                            <!--ICON LINK-->
                          <span class="wed_port_titles">
                            <span class="wed_port_title">Our First Met</span>
                            <span class="wed_port_subtitle">Ribfest 2016</span>
                            <span class="wed_port_icons">
                                <a href="#"><i class="ti ti-link"></i></a>
                                <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                            </span>
                          </span>
                          <!--END of ICON LINK-->

                        </div>
                      </div>
                  </div>

                  <div class="col-md-2 hidden-sm hidden-xs text-center">   
                    <div class="wed_story_center">
                      <div class="wed_story_content">
                        <div class="wed_heart_container">
                          <img class="wed_heart_1" src="{!! asset('front/wedding_site/images/small_people/heart_3.png') !!}" alt="">
                          <img class="wed_heart_2" src="{!! asset('front/wedding_site/images/small_people/heart_2.png') !!}" alt="">
                        </div>
                        <div class="wed_story_small_img">
                          <img src="{!! asset('front/wedding_site/images/small_people/couple_1.png') !!}" alt="">
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-5">
                    <div class="wed_story_txt">
                      <h3>Our first met</h3>
                      <div class="wed_month_year">23 Sept 2013</div>
                      <h5>That day changed everything</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam notn bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 

                    </div>                           
                  </div>    

                   
                   <div class="wed_vertical_line wed_line_top hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-1 -->
              </div>
              <!-- Animation End -->

              <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">      
                <!-- item-->
                <div class="row wed_story_row"> 

                  <div class="col-sm-12 col-md-5 col-md-push-7 text-center wed_bd">
                    <div class="wed_second_border_right"></div>
                    <div class="wed_portfolio_item wed_story_img">
                      <div class="wed_portfolio_item_cont wed_story_cont">

                        <!--PHOTO-->
                        <img src="{!! asset('front/wedding_site/images/young_couple/eating.jpg') !!}" alt="" class= "wed_img_height">                            
                        <!--ICON LINK-->
                        <span class="wed_port_titles">
                          <span class="wed_port_title">Centennial Park</span>
                          <span class="wed_port_subtitle">Ribfest 2016</span>
                          <span class="wed_port_icons">
                            <a href="#"><i class="ti ti-link"></i></a>
                            <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                          </span>
                        </span>
                      <!--END of ICON LINK-->
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 hidden-sm hidden-xs text-center">   
                    <div class="wed_story_center">
                      <div class="wed_story_content">
                        <div class="wed_heart_container_row_2">
                          <img class="wed_second_heart_1" src="{!! asset('front/wedding_site/images/small_people/heart_3.png') !!}" alt="">
                          <img class="wed_second_heart_2" src="{!! asset('front/wedding_site/images/small_people/heart_1.png') !!}" alt="">
                           <img class="wed_second_heart_3" src="{!! asset('front/wedding_site/images/small_people/heart_2.png') !!}" alt="">
                        </div>
                        <div class="wed_story_small_img">
                          <img src="{!! asset('front/wedding_site/images/small_people/couple_2.png') !!}" alt="">
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-5 col-md-pull-7 text-right">
                    <div class="wed_story_txt">
                        <h3>Our first dating</h3>
                        <div class="wed_month_year">28 Feb 2013</div>
                        <h5>That was so wonderful</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam notn bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                      </div>                              
                  </div>  
                  <div class="wed_vertical_line hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-2 -->
              </div>
              <!-- Animation End -->

               <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">   
                <!-- item-->
                <div class="row wed_story_row">  
                  <div class="col-md-5 text-center wed_bd">
                    <div class="wed_second_border"></div>
                    <div class=" wed_portfolio_item event wed_story_img">
                      <div class="wed_portfolio_item_cont wed_story_cont">

                        <!--PHOTO-->
                        <img src="{!! asset('front/wedding_site/images/young_couple/proposure.jpg') !!}" alt="" class= "wed_img_height">                            
                        <!--ICON LINK-->
                        <span class="wed_port_titles">
                          <span class="wed_port_title">Centennial Park</span>
                          <span class="wed_port_subtitle">Ribfest 2016</span>
                          <span class="wed_port_icons">
                            <a href="#"><i class="ti ti-link"></i></a>
                            <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                          </span>
                        </span>
                      <!--END of ICON LINK-->

                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 hidden-sm hidden-xs text-center">   
                    <div class="wed_story_center">
                      <div class="wed_story_content">
                        <div class="wed_heart_container_row_3">
                          <img class="wed_third_heart_1" src="{!! asset('front/wedding_site/images/small_people/heart_third_step_3.png') !!}" alt="">
                        </div>
                        <div class="wed_story_small_img">
                          <img src="{!! asset('front/wedding_site/images/small_people/small_couple_third.png') !!}" alt="">
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="wed_story_txt">
                      <h3>How he proposed</h3>
                      <div class="wed_month_year">16 Nov 2016</div>
                      <h5>That day changed everything</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam notn bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                    </div> 
                  </div>    
                  <div class="wed_vertical_line hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-3 -->
              </div>
              <!-- Animation End -->

              <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
                <!-- item-->
                <div class="row wed_story_row">      

                  <div class="col-sm-12 col-md-5 col-md-push-7 text-center wed_bd">
                    <div class="wed_second_border_right"></div>
                    <div class="wed_portfolio_item event wed_story_img">
                      <div class="wed_portfolio_item_cont wed_story_cont">

                        <!--PHOTO-->
                        <img src="{!! asset('front/wedding_site/images/young_couple/running.jpg') !!}" alt="" class= "wed_img_height">                            
                        <!--ICON LINK-->
                        <span class="wed_port_titles">
                          <span class="wed_port_title">Centennial Park</span>
                          <span class="wed_port_subtitle">Ribfest 2016</span>
                          <span class="wed_port_icons">
                            <a href="#"><i class="ti ti-link"></i></a>
                            <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                          </span>
                        </span>
                        <!--END of ICON LINK-->

                      </div>
                    </div>
                  </div> 

                  <div class="col-md-2 hidden-sm hidden-xs text-center">   
                    <div class="wed_story_center">
                      <div class="wed_story_content">
                        <div class="wed_heart_container_row_4">
                          <img class="wed_fourth_heart_1" src="{!! asset('front/wedding_site/images/small_people/heart_1.png') !!}" alt="">
                          <img class="wed_fourth_heart_2" src="{!! asset('front/wedding_site/images/small_people/heart_2.png') !!}" alt="">
                           <img class="wed_fourth_heart_3" src="{!! asset('front/wedding_site/images/small_people/heart_3.png') !!}" alt="">
                        </div>
                        <div class="wed_story_small_img">
                          <img src="{!! asset('front/wedding_site/images/small_people/small_couple.png') !!}" alt="">
                        </div>

                      </div>
                    </div>
                  </div>  

                  <div class="col-sm-12 col-md-5 col-md-pull-7 text-right">
                    <div class="wed_story_txt">
                      <h3>Now we together</h3>
                      <div class="wed_month_year">18 Oct 2016</div>
                      <h5>We're waiting for the best</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam notn bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices nibh.  Etiam aliquam mauris non hendrerit faucibus. Proin pulvinar congue  ex, vitae commodo. Phasellus condimentum, mi ut sodales gravida.Phasellus condimentum, mi ut sodales gravida lorem </p>  
                    </div>                           
                  </div> 
                  <div class="wed_vertical_line wed_line_bottom hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-4 -->
              </div>
              <!-- Animation End -->
          </div>
          <!-- END of CONTAINER -->

        </section> 
        <!-- Section end -->


      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_fixed" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/03_white.png') !!}" >
          <!-- Over -->
          <!-- <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.7"></div> -->
          <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_auto_height wed_middle_titles">
              <div class="col-md-12 wed_image_bck wed_fixed text-center" >
                  <h2>Don't miss it!</h2>                    
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
            <span class="wed_countdown" data-year="2017" data-month="05" data-day="28"></span>   
          </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>      
      <!-- White border end-->


      <!-- section -->
      <section class="wed_section_outter">
        <div class="container text-center wed_great_titles wed_wht_txt">

        <h2>Gift Registry</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa similique porro officiis nobis nulla quidem nihil iste veniam ut sit, maiores.</p>
          <!-- boxes -->
          <div class="wed_icon_boxes row text-center">

              <div class="col-md-8 col-md-offset-2">
                  <div class="row">
                      <!-- item -->
                    <div class="col-md-4 col-sm-4">
                        <a href="#" class="wed_news_block">
                          <span class="wed_gifts_img">
                            <img src="{!! asset('front/wedding_site/images/gift_registry/gift_registry_1.png') !!}" alt="">
                          </span>
                        </a>
                    </div> 

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                      <a href="#" class="wed_news_block">
                        <span class="wed_gifts_img">
                           <img src="{!! asset('front/wedding_site/images/gift_registry/gift_registry_2.png') !!}" alt="">
                        </span>
                      </a>
                    </div> 

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                      <a href="#" class="wed_news_block">
                        <span class="wed_gifts_img">
                            <img src="{!! asset('front/wedding_site/images/gift_registry/gift_registry_3.png') !!}" alt="">
                        </span>
                      </a>
                    </div> 
                  </div>
              </div>

          </div>
          <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->

      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_fixed wed_border" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/03_white.png') !!}" >
          <!-- Over -->
          <!-- <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.7"></div> -->
          <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_auto_height wed_middle_titles">
              <div class="col-md-12 wed_image_bck wed_fixed text-center" >
                <h2> Are you attending?</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices malesuada ante quis pharetra. Nullam notn bibendum dolor. Ut vel turpis accumsan, efficitur dolor fermentum, tincidunt metus. Etiam ut ultrices </p>
                <a href="#rsvp" class="btn btn_new">RSVP</a>
              </div>
              <!-- col end -->

            </div>
            <!-- row end -->

           </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>   
      <!-- White border end -->

      <!-- section -->
      <section id="gallery" class="wed_section_outter wed_image_bck wed_wht_txt">


        <div class="container text-center wed_great_titles">

          <h2>Our Gallery</h2>


          <!-- filters -->
          <div class="button-group filter-button-group">
            <a data-filter="*">Show All</a>
            <a data-filter=".web_design">Engagement</a>
            <a data-filter=".graphic_design">First Dates</a>
            <a data-filter=".logo_design">Trip</a>
          </div>
          <!-- filters end -->


          <!-- grid -->
          <div class="wed_portfolio grid">

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/alongbeach.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/rsvp.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/dream.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/shutterstock_151859936.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/eating.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/shutterstock_151862162.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/hug.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/shutterstock_151862165.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/inpool.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/about_her.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/onkitchen.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                      <span class="wed_port_icons">
                        <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                        <a href="{!! asset('front/wedding_site/images/fashion_couple/shutterstock_151862282.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/running.jpg') !!}" alt="">
                    <span class="wed_port_titles">
                      <span class="wed_port_title">Love Story</span>
                      <span class="wed_port_icons">
                        <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                        <a href="{!! asset('front/wedding_site/images/fashion_couple/shutterstock_180810389.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/turnover.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/about_her.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/inwater.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                      <a href="{!! asset('front/wedding_site/images/fashion_couple/slider1.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/him.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                      <span class="wed_port_icons">
                        <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                        <a href="{!! asset('front/wedding_site/images/fashion_couple/slider2.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{!! asset('front/wedding_site/images/young_couple/her.jpg') !!}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                      <span class="wed_port_icons">
                        <a href="01_04_portfolio_masonry_full_3col.html"><i class="ti ti-link"></i></a>
                        <a href="{!! asset('front/wedding_site/images/fashion_couple/slider3.jpg') !!}" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

          </div>
          <!-- grid end -->

        </div>
        <!-- container end -->

      </section>
      <!-- section end -->

      <!-- White border -->
      <div class="wed_white_inner_border">

        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_fixed wed_border" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/03_white.png') !!}" >
          <!-- Over -->
          <!-- <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.7"></div> -->
          <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_thin_titles">
              <div class="col-md-12 text-center" >
                <h2>“ The best gift is your patecipation, thanks to all ”</h2>   
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
          </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>   
      <!-- White border end-->

      <!-- Section -->
      <section class="wed_section_outter">

        <div class="container text-center wed_great_titles wed_wht_txt">
          <h2>Our best friends</h2>
          <p>Our best friends who will help us and we highly appreciate that! Thanks for being there with us! We feel your help within the time and wish it lasts forever...</p>

                <!-- boxes -->
                <div class="wed_icon_boxes row text-center">

                    <!-- slider -->  
                    <div class="wed_team_slider">
                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                              <h4><b>Lawrence Stephens</b></h4>
                              <p>Best Friend</p>
                              <div class="wed_item_social">
                                  <a href="#"><i class="ti ti-facebook"></i></a>
                                  <a href="#"><i class="ti ti-twitter-alt"></i></a>
                                  <a href="#"><i class="ti ti-google"></i></a>
                              </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="{!! asset('front/wedding_site/images/people/friend_1.jpg') !!}" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Lawrence Stephens</b></h4>
                          <p class="wed_wht_txt">Bridesmaid</p>
                      </div> 
                      

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Amber Richards</b></h4>
                            <p>Room Mate</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                            </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="{!! asset('front/wedding_site/images/people/friend_7.jpg') !!}" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Amber Richards</b></h4>
                          <p class="wed_wht_txt">Groomsman</p>
                      </div> 
                      

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Carolyn Moreno</b></h4>
                            <p>Best Friend</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="{!! asset('front/wedding_site/images/people/friend_4.jpg') !!}" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Carolyn Moreno</b></h4>
                           <p class="wed_wht_txt">Bridesmaid</p>
                      </div> 

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!--Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Donald Green</b></h4>
                            <p>Room Mate</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="{!! asset('front/wedding_site/images/people/friend_5.jpg') !!}" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Donald Green</b></h4>
                          <p class="wed_wht_txt">Groomsman</p>
                      </div> 

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Sindy Richards</b></h4>
                            <p>Room Mate</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="{!! asset('front/wedding_site/images/people/friend_3.jpg') !!}" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Sindy Richards</b></h4>
                          <p class="wed_wht_txt">Bridesmaid</p>
                      </div> 

                    </div>             
                    <!-- Slider end -->
                </div>
                <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->
      
      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section id="where" class="wed_section_inner">
          <div class="container-full">
            <div class="row">

              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{!! asset('front/wedding_site/images/buildings/church.jpg') !!}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>CHURCH</h4>
                  <br>
                  <p>790 3rd Street Lockport, <br>NY 14094</p>
                </div>
              </div>

              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{!! asset('front/wedding_site/images/buildings/restaurant.jpg') !!}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>RESTAURANT</h4>
                  <br>
                  1628 Orchard Street Saint Cloud, <br>MN 56301
                </div>
              </div>

              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{!! asset('front/wedding_site/images/buildings/hotel.jpg') !!}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>HOTEL</h4>
                  <br>
                  1285 7th Avenue Paducah, <br>KY 42001
                </div>
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- Container end -->
        </section>
        <!-- section end -->

        <!-- section -->
        <section class="wed_section_outter">

          <!-- over -->
          <div class="wed_map_over text-center wed_wht_txt">
            <div class="wed_map_txt wed_icon_box">
              <img class="wed_small_img" src="{!! asset('front/wedding_site/images/small_people/rising_heart.png') !!}" alt="">
              <div class="wed_icon_box_content">
                <h4><b>Open The Map</b></h4>
              </div>
            </div>
          </div>
          <!-- over end -->

          <!-- over -->
          <div class="wed_over" data-color="rgb(139, 131, 232)" data-opacity="0.9"></div>
          
            <!-- map -->
            <div id="map" class="wed_map">
              <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jGGFedWRwKAKcEtq7b7cb4FwXrg" width="100%" height="450"></iframe>
            </div>
            <!-- map end -->
        </section>
        <!-- section end -->
      </div>
      <!-- Border End -->


      <!-- section -->
      <section id="journal" class="wed_section_outter wed_wht_txt">
        <div class="container text-center wed_great_titles">

          <h2>Wedding Journal</h2>

          <!-- boxes -->
          <div class="wed_icon_boxes row text-left">

              <!-- item -->
              <div class="col-md-4 col-sm-12">

                <a href="01_03_blog_fullwidth.html" class="wed_news_block">
                  <span class="wed_news_img">
                    <img src="{!! asset('front/wedding_site/images/young_couple/eating.jpg') !!}" alt="">
                  </span>
                  <span class="wed_news_title">Planning Honeymoon Trip</span>
                  <span class="wed_news_author">Lawrence Stephens | 10 December</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa similique porro officiis nobis nulla quidem nihil iste veniam ut sit, maiores.</p>
                  <span class="btn btn_new">Read More</span>
                </a>
              </div> 

              <!-- item -->
              <div class="col-md-4 col-sm-12">

                <a href="01_03_blog_fullwidth.html" class="wed_news_block">
                  <span class="wed_news_img">
                    <img src="{!! asset('front/wedding_site/images/wedding_journal/news_2.jpg') !!}" alt="">
                  </span>
                  <span class="wed_news_title">Surprises For our Guests</span>
                  <span class="wed_news_author">Carolyn Moreno | 8 December</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa similique porro officiis nobis nulla quidem nihil iste veniam ut sit, maiores.</p>
                  <span class="btn btn_new">Read More</span>
                </a>
              </div> 

              <!-- item -->
              <div class="col-md-4 col-sm-12">

                <a href="01_03_blog_fullwidth.html" class="wed_news_block">
                  <span class="wed_news_img">
                    <img src="{!! asset('front/wedding_site/images/wedding_journal/news_3.jpg') !!}" alt="">
                  </span>
                  <span class="wed_news_title">Bachelor Party!</span>
                  <span class="wed_news_author">Donald Green | 1 December</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa similique porro officiis nobis nulla quidem nihil iste veniam ut sit, maiores.</p>
                  <span class="btn btn_new">Read More</span>
                </a>
              </div> 

          </div>
          <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->

    <!-- White border -->
    <div class="wed_water_border">
      <!-- section -->
      <section id="rsvp" class="wed_section_inner wed_image_bck wed_fixed" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/03_white.png') !!}">
        <!-- over -->
        <div class="wed_over" data-color="rgb(62, 54, 187)" data-opacity="0.9" data-blend="screen"></div>

        <div class="container text-center wed_great_titles">
          <div class="row">
            <div class="col-md-8 col-md-pull-2 col-md-push-2 col-sm-12">
            <h2 class="wed_form_txt">Be our guest!</h2>
            <p class="wed_form_txt">Cupiditate neque libero porro nulla.</p>
              <form id="wed_form" class="wed_form">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                  </div>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="E-mail" name="email" required>
                  </div>
                  <div class="col-md-12">
                    <select class="form-control" name="guests" required>
                      <option value="">#Guests</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder="Message" name="message"></textarea>
                    <input type="submit" class="btn btn_new wed_btn_margbot" value="Send">
                  </div>

                </div>
              </form>

            </div>
            <!-- col end -->
          </div>
          <!-- row end -->
          </div>
          <!-- container end -->
        </section>
        <!--section end -->

          <!-- To Top -->
        <a href="#wed_page" class="wed_top ti ti-angle-up wed_go"></a>
      </div>
      <!-- White border end -->
    </section>
    <!-- content end -->
  </div>
  <!-- Page End -->

  @endsection 
