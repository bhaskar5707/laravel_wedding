<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HTML, CSS, JS, Template">
    <meta name="author" content="Revol Themes">
    <title>BiaShadi</title>
    <!-- Favicons -->
    <link rel="icon" href="{!! asset('front/wedding_site2/assets/images/logo.png') !!}">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Rouge+Script|Open+Sans:400,600,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Normalization -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Custom CSS -->
    <link href="{!! asset('front/wedding_site2/assets/css/style.css" rel="stylesheet') !!}">
</head>
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
<body data-spy="scroll" data-target=".navbar" data-offset="56">
    <!-- Navigation Menu -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-md bg-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-navicon fa-lg"></span>
				</button>
            <a class="smoothscroll navbar-brand" href="#home"><img src="{!! asset('front/wedding_site2/assets/images/logo.png') !!}" alt="logo"></a>
            <div class="collapse navbar-collapse flex-row-reverse" id="mainNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#home">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#about">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#history">our history</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#gallery">photo gellary</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#people">peoples</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#friend">friends wishes</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#blog">blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="smoothscroll nav-link" href="#contact">contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Slider -->
    <div id="home"></div>
    <div class="main-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="slider-image" src="{!! asset('front/wedding_site2/assets/images/slider2.jpg')!!}" alt="First slide">
                    <div class="carousel-caption">
                        <div class="underlay"></div>
                        <div class="content">
                            <img class="slider-content" src="{!! asset('front/wedding_site2/assets/images/slider_content.png')!!}" />
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </p>
                            <a href="#about" class="smoothscroll btn btn-light">about us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="slider-image" src="{!! asset('front/wedding_site2/assets/images/slider3.jpg')!!}" alt="Second slide">
                    <div class="carousel-caption ">
                        <div class="underlay"></div>
                        <div class="content">
                            <img class="slider-content" src="{!! asset('front/wedding_site2/assets/images/slider_content.png') !!}" />
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </p>
                            <a href="#about" class="smoothscroll btn btn-light">about us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="slider-image" src="{!! asset('front/wedding_site2/assets/images/slider1.jpg') !!}" alt="Third slide">
                    <div class="carousel-caption ">
                        <div class="underlay"></div>
                        <div class="content">
                            <img class="slider-content" src="{!! asset('front/wedding_site2/assets/images/slider_content.png') !!}" />
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </p>
                            <a href="#about" class="smoothscroll btn btn-light">about us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				-->
        </div>
    </div>

    <!-- About Us -->
    <div id="about"></div>
    <section class="about-us">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>about us</span></h1>
                    <p class="sub-heading">About us for me and my wife</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-6 wow slideInDown">
                    <img src="{{ asset('front/wedding_planner/image/couple').'/'.$userData->profile_img }}" class="img-fluid">
                </div>
                <div class="col-12 col-sm-6 wow slideInDown">
                    <img src="{{ asset('front/wedding_planner/image/couple').'/'.$userData->partner->profile_img }}" class="img-fluid">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6 groom wow slideInLeft">
                            <h3>{{ $userData->first_name.' '.$userData->last_name }}</h3>
                            <p class="description">{{ $userData->details }}</p>
                            <p class="social-links">
                                <a href=""><i class="fa fa-facebook fa-lg"></i></a>
                                <a href=""><i class="fa fa-twitter fa-lg"></i></a>
                                <a href=""><i class="fa fa-instagram fa-lg"></i></a>
                                <a href=""><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href=""><i class="fa fa-flickr fa-lg"></i></a>
                                <a href=""><i class="fa fa-google-plus fa-lg"></i></a>
                            </p>
                        </div>
                        <div class="col-12 col-md-6 bride wow slideInRight">
                            <h3>{{ $userData->partner->first_name.' '.$userData->partner->last_name }}</h3>
                            <p class="description">{{ $userData->partner->details }}</p>
                            <p class="social-links">
                                <a href=""><i class="fa fa-facebook fa-lg"></i></a>
                                <a href=""><i class="fa fa-twitter fa-lg"></i></a>
                                <a href=""><i class="fa fa-instagram fa-lg"></i></a>
                                <a href=""><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href=""><i class="fa fa-flickr fa-lg"></i></a>
                                <a href=""><i class="fa fa-google-plus fa-lg"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History -->
    <div id="history"></div>
    <section class="our-history">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>our history</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
            <div class="row">
                <?php 
                    $i=1; 
                    $evenArray= array(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70,72,74,76,78,80,82,84,86,88,90,92,94,96,98,100);
                ?>
                
                <div class="col-12 col-md-6 text-center">
                    <div class="row justify-content-center">

                        <div class="col-12 col-md-10 wow fadeInRight">
                            <div class="image-card">
                                <div class="card">
                                    <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/card-1.jpg') !!}" alt="Card image cap">
                                    <div class="card-body circle">
                                        <h4 class="card-title">first meet each other</h4>
                                        <p class="card-text">The European languages are members of the same family. Their srate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation
                                            and their most common words. Everyone realizes why.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 text-center right-panel topping">
                    <div class="row justify-content-center">

                        <div class="col-12 col-md-10 wow fadeInLeft">
                            <div class="image-card">
                                <div class="card">
                                    <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/card-4.jpg') !!}" alt="Card image cap">
                                    <div class="card-body circle2">
                                        <h4 class="card-title">proposal of love</h4>
                                        <p class="card-text">The European languages are members of the same family. Their srate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation
                                            and their most common words. Everyone realizes why.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Counter -->
    <section class="counter">
        <div class="container">
            <div class="row text-center individual">
                <div class="col-3 wow tada">
                    <img src="{!! asset('front/wedding_site2/assets/images/count-number-bg.png') !!}" alt="Counter Background">
                    <h1 id="days1"><?php echo $days;?></h1>
                    <h5>Days</h5>
                </div>
                <div class="col-3 wow tada">
                    <img src="{!! asset('front/wedding_site2/assets/images/count-number-bg.png') !!}" alt="Counter Background">
                    <h1 id="hours1"><?php echo $hours;?></h1>
                    <h5>Hours</h5>
                </div>
                <div class="col-3 wow tada">
                    <img src="{!! asset('front/wedding_site2/assets/images/count-number-bg.png') !!}" alt="Counter Background">
                    <h1 id="minutes1"><?php echo $minutes;?></h1>
                    <h5>Minutes</h5>
                </div>
                <div class="col-3 wow tada">
                    <img src="{!! asset('front/wedding_site2/assets/images/count-number-bg.png') !!}" alt="Counter Background">
                    <h1 id="seconds1"><?php echo $seconds;?></h1>
                    <h5>Seconds</h5>
                </div>
            </div>
            <div class="row text-center allInOne">
                <div class="col-12 wow tada">
                    <img src="{!! asset('front/wedding_site2/assets/images/count-number-bg.png') !!}" alt="Counter Background">
                    <h1 id="all"></h1>
                    <h5>D : H : M : S</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery -->
    <div id="gallery"></div>
    <section class="photo-gallery">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>photo gallery</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                    <div class="col-12">
                        <ul id="filter-list" class="clearfix controls">
                            <li class="filter" data-filter="all">All</li>
                            <li class="filter" data-filter=".engage">ENGAGEMENT</li>
                            <li class="filter" data-filter=".party">WEDDING PARTY</li>
                            <li class="filter" data-filter=".night">WEDDING NIGHT</li>
                        </ul>

                        <ul id="portfolio">
                            <div class="row">
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix party night">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-1.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix engage night">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-2.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix engage">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-3.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix night">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-4.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix party">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-5.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix engage">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-6.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix engage">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-7.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="col-12 col-sm-6 col-lg-3 wow fadeInDown mix engage party">
                                    <a href="#">
                                        <img src="{!! asset('front/wedding_site2/assets/images/gallery-photo-8.jpg') !!}" class="img img-fluid" alt="">
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            <!-- <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInDown">
                    <img src="assets/images/gallery-photo-1.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInDown" data-wow-delay=".1s">
                    <img src="assets/images/gallery-photo-2.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInDown" data-wow-delay=".2s">
                    <img src="assets/images/gallery-photo-3.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInDown" data-wow-delay=".3s">
                    <img src="assets/images/gallery-photo-4.jpg" alt="" class="img img-fluid">
                </div>

                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".3s">
                    <img src="assets/images/gallery-photo-5.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
                    <img src="assets/images/gallery-photo-6.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".1s">
                    <img src="assets/images/gallery-photo-7.jpg" alt="" class="img img-fluid">
                </div>
                <div class="col-12 col-sm-6 col-lg-3 wow fadeInUp">
                    <img src="assets/images/gallery-photo-8.jpg" alt="" class="img img-fluid">
                </div>
            </div>
        </div> -->
    </section>


    <!-- People -->
    <div id="people"></div>
    <section class="people">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>groomsmen &amp; bridesmaids</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 col-md-3 wow zoomIn">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-1.jpg') !!}" alt="Ben Affleck">
                        <div class="card-body">
                            <h5 class="card-text">Ben Affleck</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".1s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-2.jpg') !!}" alt="Agung Minarto">
                        <div class="card-body">
                            <h5 class="card-text">Agung Minarto</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".2s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-3.jpg') !!}" alt="Tobey Maguire">
                        <div class="card-body">
                            <h5 class="card-text">Tobey Maguire</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".3s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-4.jpg') !!}" alt="Chris Evans">
                        <div class="card-body">
                            <h5 class="card-text">Chris Evans</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-5.jpg') !!}" alt="Delima Nuriani">
                        <div class="card-body">
                            <h5 class="card-text">Delima Nuriani</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".1s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-6.jpg') !!}" alt="Maria Mawar">
                        <div class="card-body">
                            <h5 class="card-text">Maria Mawar</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".2s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-7.jpg') !!}" alt="Sasha Melati">
                        <div class="card-body">
                            <h5 class="card-text">Sasha Melati</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 wow zoomIn" data-wow-delay=".3s">
                    <div class="card">
                        <div class="overlay"></div>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/guest-people-8.jpg') !!}" alt="Aprilia Medame">
                        <div class="card-body">
                            <h5 class="card-text">Aprlia Medam</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Friends Wishes -->
    <div id="friend"></div>
    <section class="friends-wishes">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>friends wishes</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="500000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleControls" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                            <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="carousel-caption">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <img src="{!! asset('front/wedding_site2/assets/images/mara.jpg') !!}" alt="" class="rounded-circle wow bounceIn">
                                        </div>
                                        <div class="col-12 feedback-message">
                                            <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation
                                                and their most common words. Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.</p>
                                            <h5>maria gomez</h5>
                                            <p>CEO, Fiver</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <img src="{!! asset('front/wedding_site2/assets/images/mara.jpg') !!}" alt="" class="rounded-circle">
                                        </div>
                                        <div class="col-12 feedback-message">
                                            <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation
                                                and their most common words. Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.</p>
                                            <h5>headden mathew</h5>
                                            <p>UI/UX DESIGNER, Fiver</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <img src="{!! asset('front/wedding_site2/assets/images/mara.jpg') !!}" alt="" class="rounded-circle">
                                        </div>
                                        <div class="col-12 feedback-message">
                                            <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation
                                                and their most common words. Everyone realizes why a new common language would be desirable one could refuse to pay expensive translators.</p>
                                            <h5>Chirs Monut</h5>
                                            <p>Event manager</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <div id="blog"></div>
    <section class="latest-blog">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>latest from blog</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="image-overlay"></div>
                        <a href=""><i class="fa fa-external-link fa-2x"></i></a>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/blog-image-1.jpg') !!}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">But I must explain to you serenity has taken how all this mistaken of denouncing..</p>
                        </div>
                    </div>
                    <div class="text-overlay wow bounceInLeft">
                        <p>December 5th, 2016</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="image-overlay"></div>
                        <a href=""><i class="fa fa-external-link fa-2x"></i></a>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/blog-image-2.jpg') !!}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Which of us ever undertakes laborir physcal exercise serenity has taken except..</p>
                        </div>
                    </div>
                    <div class="text-overlay wow bounceInUp">
                        <p>December 5th, 2016</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="image-overlay"></div>
                        <a href=""><i class="fa fa-external-link fa-2x"></i></a>
                        <img class="card-img-top" src="{!! asset('front/wedding_site2/assets/images/blog-image-3.jpg') !!}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">A wonderful serenity has taken possession of my entire soul like..</p>
                        </div>
                    </div>
                    <div class="text-overlay wow bounceInRight">
                        <p>December 5th, 2016</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us -->
    <div id="contact"></div>
    <section class="contact">
        <div class="container">
            <div class="row text-center">
                <div class="col col-sm-12">
                    <h1 class="heading"><span>are you attending</span></h1>
                    <p class="sub-heading">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere</p>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12">
                    <div class="contact-form justify-content-center">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6 wow slideInLeft">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6 wow slideInRight">
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 wow slideInLeft">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                                <div class="form-group col-md-6 wow slideInRight">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 wow slideInUp">
                                    <textarea rows="6" class="form-control" id="message" placeholder="Message..."></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-4 col-lg-3 col-xl-2 wow slideInUp">
                                    <button type="submit" class="btn btn-light btn-block">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.3870397137!2d90.2792381917259!3d23.780573256485233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1513666665101"
        height="540" frameborder="0" style="border:0;width:100%" allowfullscreen></iframe>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center footer-menu">
                <div class="col col-sm-12">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.7s">
                            <a class="smoothscroll" href="#home">home</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.6s">
                            <a class="smoothscroll" href="#about">about us</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.5s">
                            <a class="smoothscroll" href="#history">our history</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.4s">
                            <a class="smoothscroll" href="#gallery">photo gellary</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.3s">
                            <a class="smoothscroll" href="#people">peoples</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.2s">
                            <a class="smoothscroll" href="#friend">friends wishes</a>
                        </li>
                        <li class="list-inline-item wow fadeIn" data-wow-delay="0.1s">
                            <a class="smoothscroll" href="#blog">blog</a>
                        </li>
                        <li class="list-inline-item wow fadeIn">
                            <a class="smoothscroll" href="#contact">contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-sm-12">
                    <div class="social">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item wow fadeIn"><i class="fa fa-facebook fa-lg icon" aria-hidden="true"></i></li>
                            <li class="list-inline-item wow fadeIn" data-wow-delay="0.1s"><i class="fa fa-twitter fa-lg icon" aria-hidden="true"></i></li>
                            <li class="list-inline-item wow fadeIn" data-wow-delay="0.2s"><i class="fa fa-linkedin fa-lg icon" aria-hidden="true"></i></li>
                            <li class="list-inline-item wow fadeIn" data-wow-delay="0.3s"><i class="fa fa-behance fa-lg icon" aria-hidden="true"></i></li>
                            <li class="list-inline-item wow fadeIn" data-wow-delay="0.4s"><i class="fa fa-dribbble fa-lg icon" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright-section">
                <p class="text-center">&copy; 2016 all rights reserved</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="{!! asset('front/wedding_site2/assets/js/jquery.mixitup.min.js') !!}"></script>
    <script src="{!! asset('front/wedding_site2/assets/js/script.js') !!}"></script>

</body>

</html>