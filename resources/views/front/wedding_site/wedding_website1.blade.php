@extends('front.wedding_site_layout.mainlayout')
@section('content')  
<?php 
    $seconds = strtotime($userData->wedding_date) - time();

    $days = floor($seconds / 86400);
    $seconds %= 86400;

    $hours = floor($seconds / 3600);
    $seconds %= 3600;

    $minutes = floor($seconds / 60);
    $seconds %= 60;


    ?>
    <?php
    $date= date('Y-m-d');
    $datetime1 = date_create($date); 
    $datetime2 = date_create($userData->wedding_date); 
    $interval = date_diff($datetime1, $datetime2); 
    
    // Display the result 
    //echo $interval->format('Difference between two dates: %R%a days'); 
?>
<body class="wed_firefly_only">

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

  <!-- Firefly -->
  <div class="wed_firefly">
    <div class="jqueryFireFly" data-total="80" data-minPixel="4" data-maxPixel="9"></div>
  </div>


  <!-- Page -->
  <div class="wed_page" id="wed_page">

    <!-- Header -->
    <header>       
      <nav class="wed_light_nav wed_transp_nav">
        <div class="container">

          <!-- couple header -->
          <img class="wed_couple_header wed_kissing_couple animated" src="{!! asset('front/wedding_site/images/3.png') !!}" alt=""/>
          <img class="wed_couple_header wed_white_couple animated" src="{!! asset('front/wedding_site/images/3_white_couple.png') !!}" alt=""/>
          <!-- couple header end -->

          <!-- Logo -->
          <a href="#" class="wed_logo wed_logo_animation">{{ $userData->first_name.' '.$userData->last_name }} & {{ $userData->partner->first_name.' '.$userData->partner->last_name }}</a>

          <!-- Text Logo -->
          <div class="wed_logo_und">Wedding</div>


          <div class="wed_top_menu_mobile_link">
            <i class="ti ti-menu"></i>
          </div>
          <!-- Top Menu -->
          <div class="wed_top_menu_cont">
              <ul class="wed_top_menu">
                <li><a href="#">Home</a> </li>
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


    <!-- Slider -->
    <div class="wed_slider wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/greybg.jpg') !!}">

      <!-- over -->
      <div class="wed_over" data-color="#000" data-opacity="0.1" data-blend="multiply"></div>
      
      <div class="container">

        <!-- Slider Texts -->
        <div class="wed_slide_txt wed_slide_right text-center"  data-0="opacity:1;" data--400-bottom="opacity:0;">

          <!-- <img src="{!! asset('front/wedding_site/images/save_right.png') !!}" height="550" alt=""> -->

        </div>
        <!-- Slider Texts End -->

      </div>
      <!-- container end -->

    </div>
    <!-- Slider End -->

    <!-- Content -->
    <section id="wed_content" class="wed_content">

      <!-- section -->
      <section class="wed_section_inner wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{{ asset('front/wedding_planner/image/couple').'/'.$userData->profile_img }}" >
        <!-- OVER -->
        <div class="wed_over" data-color="#000" data-opacity="0.1"></div>
        <div class="container">
            <div class="row wed_auto_height wed_middle_titles ">

                <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--100-bottom="@class:active">

                <div class="col-md-5 text-left wed_small_arrow" >
                    <h2>{{ $userData->first_name.' '.$userData->last_name }} </h2>
                    <p>{{ $userData->details }}</p>
                    <p><img src="{{ asset('front/wedding_planner/image/couple').'/'.$userData->profile_img }}" height="80" alt="{{ $userData->first_name.' '.$userData->last_name }}"></p>
                </div>
                <!-- col end -->

              </div>
              <!-- Animation End -->
            </div>
            <!-- row end -->
        </div>          
        <!-- container end -->
      </section>
      <!-- section end -->

      <!-- section -->
      <section class="wed_section_inner wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{{ asset('front/wedding_planner/image/couple').'/'.$userData->partner->profile_img }}" >

            <!-- OVER -->
        <div class="wed_over" data-color="#000" data-opacity="0.1"></div>

        <div class="container">
          <div class="row wed_auto_height wed_middle_titles">

            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--100-bottom="@class:active">

              <div class="col-md-5 col-md-offset-7 text-left wed_groom wed_small_arrow" >
                  <h2>{{ $userData->partner->first_name.' '.$userData->partner->last_name }}</h2>
                  <p>{{ $userData->partner->details }}</p>
                  <p><img src="{{ asset('front/wedding_planner/image/couple').'/'.$userData->partner->profile_img }}" height="80" alt="{{ $userData->partner->first_name.' '.$userData->partner->last_name }}"></p>

              </div>
              <!-- col end -->
            </div>
            <!-- Animation End -->

          </div>
          <!-- row end -->
        </div>          
        <!-- container end -->

      </section>
      <!-- section end -->




      <!-- BORDER -->
      <div class="wed_mate_border">

        <!-- story section -->
        <section id="story" class="wed_section_outter">

          <div class="container">             
            <div class="row">

                <div class="col-sm-12 col-md-offset-2 col-md-8 text-center">
                    <div class="wed_topstory_titile wed_great_titles">
                        <h2 class= "wed_without_after">
                            Our <img class="wed_small_img" src="{!! asset('front/wedding_site/images/1.png') !!}" alt=""> Story
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <?php 
                $i=1; 
                $evenArray= array(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70,72,74,76,78,80,82,84,86,88,90,92,94,96,98,100);
            ?>
            @foreach($ourstory as $val)
            <?php if(in_array($i,$evenArray)) {?>
            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
              <!-- item-->
              <div class="row wed_story_row">    

                  <div class="col-sm-12 col-md-5 text-center wed_bd">
                      <div class="wed_second_border"></div>
                      <div class="wed_portfolio_item wed_story_img">
                        <div class="wed_portfolio_item_cont wed_story_cont">

                           <!--PHOTO-->
                          <img class= "wed_img_height" src="{{ asset('front/wedding_planner/image/couple/our_story/medium/').'/'.$val->image }}" alt="" >                            
                            <!--ICON LINK-->
                          <span class="wed_port_titles">
                            <span class="wed_port_title">{{ $val->title }}</span>
                            <span class="wed_port_subtitle">{{ date('d M Y', strtotime($val->created_at)) }}</span>
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
                      <h3>{{ $val->title }}</h3>
                      <div class="wed_month_year">{{ date('d M Y', strtotime($val->created_at)) }}</div>
                      <h5>{!! $val->description !!}</p> 

                    </div>                           
                  </div>    

                   
                   <div class="wed_vertical_line wed_line_top hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-1 -->
              </div>
              <!-- Animation End -->


              <?php }else{ ?>


              <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">      
                <!-- item-->
                <div class="row wed_story_row"> 

                  <div class="col-sm-12 col-md-5 col-md-push-7 text-center wed_bd">
                    <div class="wed_second_border_right"></div>
                    <div class="wed_portfolio_item wed_story_img">
                      <div class="wed_portfolio_item_cont wed_story_cont">

                        <!--PHOTO-->
                        <img src="{{ asset('front/wedding_planner/image/couple/our_story/medium/').'/'.$val->image }}" alt="" class= "wed_img_height">                            
                        <!--ICON LINK-->
                        <span class="wed_port_titles">
                          <span class="wed_port_title">{{ $val->title }}</span>
                          <span class="wed_port_subtitle">{{ date('d M Y', strtotime($val->created_at)) }}</span>
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
                        <h3>{{ $val->title }}</h3>
                        <div class="wed_month_year">{{ date('d M Y', strtotime($val->created_at)) }}</div>
                        <p>{!! $val->description !!}</p>
                      </div>                              
                  </div>  
                  <div class="wed_vertical_line hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-2 -->
              </div>
              <!-- Animation End -->
              <?php } ?>

            <?php $i++;?>
            @endforeach





          </div>
          <!-- END of CONTAINER -->

        </section> 
        <!-- Section end -->
      </div> 
      <!-- BORDER END -->

      <!-- BORDER -->
      <div class="wed_mate_border">

        <!-- story section -->
        <section id="story" class="wed_section_outter">

          <div class="container">             
            <div class="row">

                <div class="col-sm-12 col-md-offset-2 col-md-8 text-center">
                    <div class="wed_topstory_titile wed_great_titles">
                        <h2 class= "wed_without_after">
                            Wedding <img class="wed_small_img" src="{!! asset('front/wedding_site/images/1.png') !!}" alt=""> Ceremony
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Row end -->

            <?php 
                $i=1; 
                $evenArray= array(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70,72,74,76,78,80,82,84,86,88,90,92,94,96,98,100);
            ?>
            @foreach($weddingceremony as $val)
            <?php if(in_array($i,$evenArray)) {?>
            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
              <!-- item-->
              <div class="row wed_story_row">    

                  <div class="col-sm-12 col-md-5 text-center wed_bd">
                      <div class="wed_second_border"></div>
                      <div class="wed_portfolio_item wed_story_img">
                        <div class="wed_portfolio_item_cont wed_story_cont">

                           <!--PHOTO-->
                          <img class= "wed_img_height" src="{{ asset('front/wedding_planner/image/couple/wedding_ceremony/medium/').'/'.$val->image }}" alt="" >                            
                            <!--ICON LINK-->
                          <span class="wed_port_titles">
                            <span class="wed_port_title">{{ $val->title }}</span>
                            <span class="wed_port_subtitle">{{ date('d M Y', strtotime($val->created_at)) }}</span>
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
                      <h3>{{ $val->title }}</h3>
                      <div class="wed_month_year">{{ date('d M Y', strtotime($val->created_at)) }}</div>
                      <h5>{!! $val->description !!}</p> 

                    </div>                           
                  </div>    

                   
                   <div class="wed_vertical_line wed_line_top hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-1 -->
              </div>
              <!-- Animation End -->


              <?php }else{ ?>


              <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">      
                <!-- item-->
                <div class="row wed_story_row"> 

                  <div class="col-sm-12 col-md-5 col-md-push-7 text-center wed_bd">
                    <div class="wed_second_border_right"></div>
                    <div class="wed_portfolio_item wed_story_img">
                      <div class="wed_portfolio_item_cont wed_story_cont">

                        <!--PHOTO-->
                        <img src="{{ asset('front/wedding_planner/image/couple/our_story/medium/').'/'.$val->image }}" alt="" class= "wed_img_height">                            
                        <!--ICON LINK-->
                        <span class="wed_port_titles">
                          <span class="wed_port_title">{{ $val->title }}</span>
                          <span class="wed_port_subtitle">{{ date('d M Y', strtotime($val->created_at)) }}</span>
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
                        <h3>{{ $val->title }}</h3>
                        <div class="wed_month_year">{{ date('d M Y', strtotime($val->created_at)) }}</div>
                        <p>{!! $val->description !!}</p>
                      </div>                              
                  </div>  
                  <div class="wed_vertical_line hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-2 -->
              </div>
              <!-- Animation End -->
              <?php } ?>

            <?php $i++;?>
            @endforeach





          </div>
          <!-- END of CONTAINER -->

        </section> 
        <!-- Section end -->
      </div> 
      <!-- BORDER END -->

      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_wht_txt wed_fixed" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/inpool.jpg') !!}" >
          <!-- Over -->
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.7"></div>
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_auto_height wed_middle_titles">
              <div class="col-md-12 wed_image_bck wed_fixed text-center" >
                  <h2>Don't miss it!</h2> 

                  <p>{{ date('d M Y', strtotime($userData->wedding_date)) }}</p>
                  <div class="row">

                      <div class="col-md-3 item">
                          <h3><?php echo $days;?></h3>
                          <span>Day</span>
                      </div>
                      <div class="col-md-3 item">
                          <h3><?php echo $hours;?></h3>
                          <span>Hours</span>
                      </div>                
                      <div class="col-md-3 item">
                          <h3><?php echo $minutes;?></h3>
                          <span>Minutes</span>
                      </div>                
                      <div class="col-md-3 item">
                          <h3><?php echo $seconds;?></h3>
                          <span>Seconds</span>
                      </div>
                      
                  </div>                    
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
           
            <!-- <span class="wed_countdown" data-year="2017" data-month="05" data-day="28"></span> -->   
          </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>      
      <!-- White border end-->


      <!-- section -->
      <!-- Gift Registery Here -->
      <!-- section end -->

      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_wht_txt wed_fixed wed_border" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/turnover.jpg') !!}" >
          <!-- Over -->
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.7"></div>
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="screen"></div>

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
      <section id="gallery" class="wed_section_outter wed_image_bck">


        <div class="container text-center wed_great_titles">

          <h2>Our Gallery</h2>


          <!-- filters -->
         <!--  <div class="button-group filter-button-group">
            <a data-filter="*">Show All</a>
            <a data-filter=".web_design">Engagement</a>
            <a data-filter=".graphic_design">First Dates</a>
            <a data-filter=".logo_design">Trip</a>
          </div> -->
          <!-- filters end -->


          <!-- grid -->
          <div class="wed_portfolio grid">
              <!-- item -->
            @foreach ($guests as $element)
              @foreach($element->albums as $album)
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="{{ asset('front/wedding_planner/image/guest_album').'/'.$album->filename }}" alt="{{ $element->firstname }}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">{{ $userData->first_name.' '.$userData->last_name }} & {{ $userData->partner->first_name.' '.$userData->partner->last_name }} Ablum</span>
                    <span class="wed_port_icons">
                      <a href="{{ url('photo-comment-like/'.$album->id) }}"><i class="ti ti-link"></i></a>
                      <a href="{{ asset('front/wedding_planner/image/guest_album').'/'.$album->filename }}" alt="{{ $element->firstname }}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>
              @endforeach
            @endforeach

          </div>
          <!-- grid end -->

        </div>
        <!-- container end -->

      </section>
      <!-- section end -->

      <!-- White border -->
      <div class="wed_white_inner_border">

        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_wht_txt wed_fixed wed_border" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/hug.jpg') !!}" >
          <!-- Over -->
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.7"></div>
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="screen"></div>

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

        <div class="container text-center wed_great_titles">
          <h2>Lovable Family</h2>
          <p>Our best friends who will help us and we highly appreciate that! Thanks for being there with us! We feel your help within the time and wish it lasts forever...</p>

                <!-- boxes -->
                <div class="wed_icon_boxes row text-center">

                    <!-- slider -->  
                    <div class="wed_team_slider">

                     @foreach($lovablefamily as $val)
                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                              <h4><b>{{ $val->firstname.' '.$val->lastname }}</b></h4>
                              <p>{{ $val->relation }}</p>
                              <div class="wed_item_social">
                                  <a href="#"><i class="ti ti-facebook"></i></a>
                                  <a href="#"><i class="ti ti-twitter-alt"></i></a>
                                  <a href="#"><i class="ti ti-google"></i></a>
                              </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                            <?php if(!empty($val->image)){ ?>
                              <img src="{{ asset('front/wedding_planner/image/couple/wedding_guest/small').'/'.$val->image }}" alt="{{ $val->firstname }}" />
                            <?php }else{ ?>
                              <img src="{{ asset('front/wedding_planner/image/couple/wedding_guest/blank.png') }}" alt="{{ $val->firstname }}">
                            <?php } ?>


                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>{{ $val->firstname.' '.$val->lastname }}</b></h4>
                          <p>{{ $val->relation }}</p>
                      </div> 
                      @endforeach

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
                <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>CHURCH</h4>
                  <br>
                  <p>790 3rd Street Lockport, <br>NY 14094</p>
                </div>
              </div>

              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{!! asset('front/wedding_site/images/buildings/restaurant.jpg') !!}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>RESTAURANT</h4>
                  <br>
                  1628 Orchard Street Saint Cloud, <br>MN 56301
                </div>
              </div>

              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{!! asset('front/wedding_site/images/buildings/hotel.jpg') !!}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.3" data-blend="color"></div>
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
          <div class="wed_over" data-color="rgb(193, 176, 249)" data-opacity="0.9"></div>
          
            <!-- map -->
            <div class="wed_map">
              <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jGGFedWRwKAKcEtq7b7cb4FwXrg" width="100%" height="450"></iframe>
            </div>
            <!-- map end -->
        </section>
        <!-- section end -->
      </div>
      <!-- Border End -->


      <!-- section -->
      <section id="journal" class="wed_section_outter">
        <div class="container text-center wed_great_titles">

          <h2>Wedding Blog</h2>

          <!-- boxes -->
          <div class="wed_icon_boxes row text-left">

              <!-- item -->
              @foreach($weddingblog as $val)
              <div class="col-md-4 col-sm-12">

                <a href="{{ url('wedding-website-blog-detail/'.$val->id) }}" class="wed_news_block">
                  <span class="wed_news_img">
                    <img src="{{ asset('front/wedding_planner/image/couple/blog/medium/').'/'.$val->image }}" alt="{{ $val->title }}">
                  </span>
                  <span class="wed_news_title">{{ $val->title }}</span>
                  <span class="wed_news_author">{{ date('d M Y', strtotime($val->created_at)) }}</span>
                  <p>{!! substr($val->description, 0, 150) !!}....</p>
                  <a href="{{ url('wedding-website-blog-detail/'.$val->id) }}"><span class="btn btn_new">Read More</span></a>
                </a>
              </div> 
              @endforeach

             

          </div>
          <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->

    <!-- White border -->
    <div class="wed_water_border">
      <!-- section -->
        @include('front.wedding_site.rsvp_form')
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