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
    <div class="wed_water_border">
      <!-- section -->
      <section id="rsvp" class="wed_section_inner wed_image_bck wed_fixed" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/dream.jpg') !!}">
        <!-- over -->
        <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="color"></div>
        <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.2"></div>

        <div class="container text-center wed_wht_txt wed_great_titles">
          <div class="row">
            <div class="col-md-8 col-md-pull-2 col-md-push-2 col-sm-12">

              <h2 class="wed_form_txt">{{ $photo->guest->firstname . ' ' . $photo->guest->lastname }}</h2>
              <p class="wed_form_txt">
                <span class="posting-date">Posted on {{ Carbon\Carbon::parse($photo->created_at)->diffForHumans() }}</span>
                <span class="comments cmnt-add"><i class="fa fa-comments-o" aria-hidden="true"></i>&ensp;{{ $photo->comments->count() }} comments</span>
                <span class="like-btn cmnt-add hide"><i onclick="myFunction(this)" class="fa fa-heart"></i>&ensp;1 likes</span>
              </p>
              <p> 
                <div class="hes-gallery">
                  <img src="{{ asset('front/wedding_planner/image/guest_album/'.$photo->filename) }}" alt="{{ $photo->filename }}" style="width:70%; margin: 0 auto;">
                </div>
              </p>
              <a href="{{ asset('image/guest_album/'.$photo->filename) }}" download class="downld-phto"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
              <a href="#" class="downld-phto"><i class="fa fa-share" aria-hidden="true"></i> Share</a>

                @if(Session::has('flash_message_success'))  
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! session('flash_message_success') !!}</strong> 
                    </div>    
                @endif 
                <form action="{{ url('/photo-comment-like/'.$imageId) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>


                <div class="col-md-12">
                  <h3 class="cmmnt-head">Comments</h3>
                  @foreach($comment as $val)
                  <div class="col-md-2">
                      <div class="new-brdr-imge">
                          <img src="{{ asset('front/wedding_planner/image/user-dummy.png') }}" class="img-responsive">
                      </div>
                  </div>
                  <div class="col-md-10">
                      <div class="cmmnt-brdr">
                          <h5>{{ $val->name }}</h5>
                          <span class="date-cmnt">{{ Carbon\Carbon::parse($photo->created_at)->format('d M Y') }}</span>
                          <p>{{ $val->comment }}</p>
                      </div>
                  </div>
                  @endforeach
                </div>

            </div>
            <!-- col end -->
          </div>
          <!-- row end -->
          </div>
          <!-- container end -->
        </section>
        <!--section end -->
      <div class="wed_water_border">
      <!-- section -->
        @include('front.wedding_site.rsvp_form')
      <!--section end -->

          <!-- To Top -->
      <a href="#wed_page" class="wed_top ti ti-angle-up wed_go"></a>
      </div>
          <!-- To Top -->
        <a href="#wed_page" class="wed_top ti ti-angle-up wed_go"></a>
      </div>

    <!-- White border -->
   
    <!-- content end -->
  </div>
  <!-- Page End -->
  @endsection 