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
                <li><a href="#">Home</a></li>             
              </ul>
          </div>
          <!-- Top Menu End -->
        </div>
        <!-- container end -->
      </nav>

    </header>
    <!-- Header End -->

    <!-- Content -->
   <!-- PAGE TITLE SMALL -->
    <div class="wed_page_title wed_page_title_great wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="images/fashion_couple/slider1.jpg">


      <!-- Over -->
      <div class="wed_over" data-color="#8630fc" data-opacity="0.9"></div>
      <div class="wed_over" data-color="#000" data-opacity="0.1"></div>

      <div class="container text-left">
        <div class="row">
          
          <div class="col-md-8">
            <h1 class="wed_h1_title">Wedding Journal</h1>
            <h3>{{ $blogDetails->title }}</h3>
          </div>
          
          <div class="col-md-4">
            <div class="breadcrumbs">
              <a href="#">Home</a><a href="#">Blog</a><span>Wedding Journal</span>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <!-- PAGE TITLE SMALL END-->



    <!-- Content -->
    <section id="wed_content" class="wed_content">


      <!-- section -->
      <section class="wed_section_innerpage">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
              <div class="wed_post_item">
                <div class="wed_post_journal_img">
                  <img src="{{ asset('front/wedding_planner/image/couple/blog/medium/'.$blogDetails->image) }}" alt="">
                </div>          
              </div>
            </div>
            <div class="col-md-12">
     
                <div class="wed_post_info">
                    {{ date('d M Y', strtotime($blogDetails->created_at)) }}
                    <span class="slash-divider">/</span>
                    <a href="#">{{ $userData->name }}</a>
                    <span class="slash-divider">/</span>
                    <a href="#">{{ $blogDetails->title }}</a>
                </div>

                <p>
                  {!! $blogDetails->description !!}
                </p>

                

                <!--  Comments -->
                <section class="comments clearfix">
                    <div class="comments-title">
                        <h3 class="title">Comments</h3>
                    </div>
                    <div class="comments-content">
                      @foreach($comment as $val)
                        <div class="answer">
                            <img class="img-comments" src="images/people/friend_6.jpg" alt=""/>
                            <div class="content-cmt">
                                <span class="name-cmt">{{ $val->name }}</span>
                                <span class="date-cmt">{{ Carbon\Carbon::parse($val->created_at)->format('d M Y') }}</span>
                                <span><a href="#">{{ $val->title }}</a></span>
                                <p class="content-reply">
                                  {{ $val->comment }}
                                </p>
                            </div>                                                  
                        </div>
                      @endforeach

                        <section class="form-comment">
                            <div class="form-comment-title">
                                <h3 class="title">Leave a Comment</h3>
                            </div>
                            <form id="form-comment" class="form-validate" action="{{ url('/wedding-website-blog-detail/'.$blogId) }}" method="POST"> 
                              {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="name">
                                                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mail">
                                                   <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="website">
                                                    <input type="text" placeholder="Your Title" name="title" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="message">
                                             <textarea class="form-control" name="comment" placeholder="Your Message" rows="8" class="control form-control" id="message" ></textarea>
                                        </div>
                                    </div> 
                                    <div class="col-xs-12">
                                        <div class="form-submit">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                     </div>     
                                </div>    
                            </form>

                        </section>
                    </div>                                          
                </section>
            <!-- End Comments -->

            </div>
            <!-- col end -->

          </div>
                
          </div>
          <!-- container end -->
      </section>
      <!-- section end -->

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

    <!-- White border -->
   
    <!-- content end -->
  </div>
  <!-- Page End -->
  @endsection 