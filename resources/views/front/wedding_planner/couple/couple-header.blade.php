
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2">
                    <img src="{{ $leftImage }}" alt="" class="coupleimage1 img-circle">
                </div>
                <div class="profile-info col-md-8">
                    <h1 class="profile-title">{{ ucwords($user->name) }} @if(isset($user->partner->name)) {!! '& ' .ucwords($user->partner->name) !!} @endif</small></h1>
                
                    <div class="text">
                        
                      <div class="pull-right">
                          <a href="" data-target="#laststep" data-toggle="modal" data-id="{{ $user->id }}" class="dash-summary-edit btn-outline outline-red hide">Edit</a>
                      </div>
                      <ul>
                         <li><img src="{{ asset('front/wedding_planner/image/calender.png') }}" class=""/>
                              <a href="#" data-toggle="modal" data-target="#registerUser" onclick="return confirm('Are you sure want to change wedding date?')">{{ date('d M Y', strtotime($user->wedding_date)) }}</a>
                         </li>
                         <li><img src="{{ asset('front/wedding_planner/image/home1.png') }}" class=""/>@if(!empty($user->provider)) {{ $user->provider }}  @else<span><a href="#" data-toggle="modal" data-target="#registerUser" onclick="return confirm('Go to wedding place?')">No Wedding Place</a></span>  @endif </li>
                         <li>
                              <img src="{{ asset('front/wedding_planner/image/website.png') }}" class=""/>
                              @if($user->website) 
                                  <a href="{{ url('web/'.$user->website) }}" target="_blank"> Preview Website  </a>
                              @else
                              <span>
                                <a href="{{ url('/couple-dashboard-website')}}" onclick="return confirm('Are you want to create a website?')"> No Website </a>
                              </span>  
                            @endif</li>
                      </ul>
                      
                      <div class="centeround">
                         <div class="progressbar"></div>                                         
                      </div>
                    </div>  
                </div>
                 <div class="profile-pic col-md-2">
                    <img src="{{ $rightImage }}" alt=""  class="coupleimage1 img-circle">
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
                    <li class="{{ Request::segment(1) === 'couple-dashboard-guest-book' ? 'active' : null }}"><a href="{{ url('/couple-dashboard-guest-book').'#showthis' }}"><i class="fa fa-users db-icon"></i>Guest Book</a></li>
                    <li><a href="couple-profile.html"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                    <li class="{{ Request::segment(1) === 'couple-dashboard-website' ? 'active' : null }}"><a href="{{ url('/couple-dashboard-website') }}">Website</a></li>
                    <li class="{{ Request::segment(1) === 'couple-dashboard-album' ? 'active' : null }}"><a href="{{ url('/couple-dashboard-album') }}">Album</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>







<!-- Counple Profile Modal Start -->
<div tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false" class="modal fade in" id="registerUser" style="display: none;z-index: 5555;">
  <div class="modal-dialog app-tools-wedding-modal">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="icon icon-close"></i>
      </button>
      <div class="modal-header">
        <h2 class="modal-title">My Wedding</h2>
      </div>
      
      @if(!($user->partner_id) || !($user->partner_email) || !($user->partner_verify=='yes'))
      <div class="border-bottom bg">
        <div class="pt15 pb15 pl20 pr20 pure-g">
          <div class="pure-u-1-6 text-center">
            <span class="tag tag-blue-out">Tip</span>
          </div>
          <div class="pure-u-5-6 text-center">
            <span>Plan your wedding with your partner.</span>
            <a class="pointer app-wed-link-acc color-grey underline" href="#sendLinkToPartner" data-toggle="modal">
            Link Accounts with your Partner </a>
          </div>
        </div>
      </div>
      @endif
      <div class="modal-body">
        @if(session()->get('success_message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('success_message') }}  
            </div>
        @endif
        @if(session()->get('error_message'))
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('error_message') }}  
            </div>
        @endif

        <form method="POST" action="{{ route('couple.dashboard.update',$user->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-lg-6">
            <div class="uploadimage hiddenFileInput">
            <div class="image">
                <img src="{{ $leftImage }}" class="img-responsive" />
            </div>
            @if($errors->has('foto_owner')) <span class="error">{{$errors->first('foto_owner')}}</span> @endif
            <input id="photo_1" type="file" name="foto_owner" accept="image/*" class="" onchange="preview_image(event)">
            <img id="output_image" class="img-responsive"/>
              <div class="cameraicon">
                <i class="fa fa-camera"></i>
              </div>
            
          </div>
            <div class="item">
            <span>I am</span>
            <input type="text" name="ownerName" value="{{ $user->name }}" size="20" autocomplete="on" maxlength="150" placeholder="Name" data-msgerror="Your enter the name">
          @if($errors->has('ownerName')) <span class="error">{{$errors->first('ownerName')}}</span> @endif
          </div>
            <div class="groombride">
            <span>I am</span>
            <div class="switcher">
              <label class="switch">
                <input type="radio" name="user_gender" value="1" @if($user->gender == 1) checked @endif>
                <span class="slider round @if ($user->gender == 1)
                  checked @endif 
                  ">Groom</span>
                </label>
                <label class="switch">
                  <input type="radio" name="user_gender" value="2" @if($user->gender == 2) checked @endif>
                  <span class="slider round @if ($user->gender == 2)
                    checked @endif
                    ">Bride</span>
                  </label>

                </div>          
              </div>
            <div class="datevenue">
                <span>Wedding Date</span>
                <input type="text" placeholder="Wedding Date" name="wedding_date" value="{{ $user->wedding_date }}" class="datepicker">
              @if($errors->has('wedding_date')) <span class="error">{{$errors->first('wedding_date')}}</span> @endif
              </div>
        </div>

        <div class="col-lg-6">
         <div class="uploadimage hiddenFileInput">
          <div class="image">
            <img src="{{ $rightImage }}" class="img-responsive" />
          </div>
          <input id="photo_1" type="file" name="foto_partner" accept="image/*" class="" onchange="preview_image1(event)">
          <img id="output_image_partner" class="img-responsive"/>
          <div class="cameraicon">
            <i class="fa fa-camera"></i>
          </div>
        </div>
        <div class="item">
          <span>Partners Name</span>
          <input type="text" name="partnerName" value="{{ isset($user->partner->name) ? $user->partner->name : '' }}" autocomplete="on" maxlength="150" placeholder="Partners Name">
            @if($errors->has('partnerName')) <span class="error">{{$errors->first('partnerName')}}</span> @endif
            
        </div>
        <div class="groombride">
          <span>My Partner Is a</span>
          <div class="switcher">
            
            <label class="switch">
              <input type="radio" name="partner_gender" value="2" @if ($user->gender == 2)
              checked @endif>
              <span class="slider round @if ($user->gender == 2)
                checked @endif ">Groom</span>
              </label>
              <label class="switch">
                <input type="radio" name="partner_gender" value="1" @if ($user->gender == 1)
                checked @endif>
                <span class="slider round @if ($user->gender == 1)
                  checked @endif ">Bride</span>
                </label>
              </div>


            </div>
            <div class="datevenue">
              <span>Wedding Venue</span>
              <input type="text" name="suProvider" value="{{ $user->provider }}"  maxlength="150" placeholder="Name" data-msgerror="Your enter the name" class="typeahead">

              <input type="hidden" name="suProvider_id" value="{{ $user->provider_id }}">
            </div>
          </div>
          <div class="row text-center">
            <button type="submit" class="button-outline"> Save</button>
          </div>
          </form>
        </div>                 
      </div>
    </div>
</div>
<!-- Counple Profile Modal End -->

<div class="modal fade" id="laststep" role="dialog" data-backdrop="static">
    <div class="modal-dialog new-mod-wdth">
        <div class="modal-content bord-rad-0">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="container cont-100">
          <div class="row new-bride-pop">
            <div class="col-md-3 pink-back">
              <div class="back-img">
                <h2>One last step!</h2>
                <p>Update your account with additional wedding details to help you plan</p>
              </div>
            </div>
            <div class="col-md-9">
              <h2>About us</h2>
              <div>
                <form action="#">
                  <div class="form-group float-lef">
                    <label>I am</label><br>
                    <input type="text" name="user-name" value="Shreya" id="user-name"><i class="fa fa-female" aria-hidden="true"></i><select style="background-color: transparent; border: none; border-bottom: 1px solid #ddd;">
                      <option value="bride">Bride</option>
                      <option value="groom">Groom</option>
                      <option value="family">Family</option>
                      <option value="guest">Guest</option>
                      <option value="business">Business</option>
                      <option value="press">Press</option>
                    </select>
                  </div>
                  <div class="form-group float-righ">
                    <label>My Partner is</label><br>
                    <input type="text" name="patner-name" value="XYZ" id="patner-name"><i class="fa fa-male" aria-hidden="true"></i><select style="background-color: transparent; border: none; border-bottom: 1px solid #ddd;">
                      <option value="groom">Groom</option>
                      <option value="bride">Bride</option>
                    </select>
                  </div>
                </form>
              </div>
              <h2>Wedding details</h2>
              <div>
                <form action="#">
                  <div class="form-group float-lef">
                      <label>Wedding Date</label><br>
                    <input type="text" id="datepicker-1">
                  </div>
                  <div class="form-group float-righ">
                    <label>No of Guests</label><br>
                    <input type="number" name="no-guests" id="no-guests" value="130">
                  </div>
                  <div class="form-group float-lef">
                    <label>City/ Town</label><br>
                    <input type="text" name="wedding-date" id="wedding-date" placeholder="City Name">
                  </div>
                  <div class="form-group float-righ">
                    <label>Country</label><br>
                    <select>
                      <option value="India" selected="selected">India</option>
                      <option value="Afghanistan">Afghanistan</option>
                      <option value="Algeria">Algeria</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="clearfix"></div>
              <h2>Which wedding vendors do you still need?</h2>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Events</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Catreing</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Photography & Video</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Planning</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Jewellery</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox" checked> Wedding Cards</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Bridal Accessories</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Honeymoon</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Transportation</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Flowers & Decoration</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Groom's Accessories</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Health & Beauty</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Entertainment</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Guests</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Ceremony</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkbox">
                  <label><input type="checkbox"> Other</label>
                </div>
              </div>
              <button type="button" class="btn btn-default btn-add-vendor">Save</button>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
        

<!-- Link Send to Partner Modal Popup Start -->
<div tabindex="-1" class="modal" id="sendLinkToPartner" role="dialog" data-backdrop="static" style="display: none;z-index: 9999;">
    <div class="modal-dialog modal-linkAccount">
        <div class="modal-content modal-linkAccount-content">
        
            <div class="modal-header modal-headerTools">
                <button type="button" class="close icon icon-close-grey" data-dismiss="modal"><i class="icon icon-close"></i></button>                        
                <h3 class="modal-headerTools-title">Link accounts with your partner</h3>
            </div>
            <div class="modal-contentTools text-center">
                <p>Planning a wedding is a team effort! Link accounts with your partner or family members to collaborate on your Checklist, Guest List, Budget and more.</p>
                <p class="strong mt15 mb25"><strong>You'll only share the wedding planning tools.</strong></p>
                <form method="POST" action="{{ route('couple.partner.invitation') }}" name="fromLinkSend" class="modal-linkAccount-form">
                {{ csrf_field() }}
                    <div class="pl25 pr25">
                        <div class="input-group-line">
                            <input class="app-input-mail-la" placeholder="E-mail" type="text" id="mail" name="mail" maxlength="50" value="">
                            <label class="error">{{ $errors->first('mail') }}</label>
                        </div>

                        <button class="button-outline" type="submit">Link</button>
                    </div>

                    <!--<div class="app-success-box alert alert-success dnone"></div>-->
                    <p><i class="fa fa-info-circle"></i> Linking accounts will not change your personal account information and will display your details as the main info for your linked account.</p>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Link Send to Partner Modal Popup End -->

<script>
  $( "#datepicker-1" ).datepicker({format: 'dd-mm-yyyy'});
  $( ".datepicker" ).datepicker({format: 'dd-mm-yyyy'});
$(function() {
    @if(!($user->partner_id > 0) && !($user->partner_verify))
      //$('#sendLinkToPartner').modal('show');
      $('#registerUser').modal('show');
    @endif
    @if(Session::has('success_message'))
        $('#sendLinkToPartner').modal('show');
    @endif
    @if(Session::has('error_code') || $errors->has('mail'))
        $('#sendLinkToPartner').modal('show');
    @endif    
    @if ($errors->has('ownerName') || $errors->has('partnerName') || $errors->has('wedding_date') || $errors->has('foto_owner'))
        $('#registerUser').modal('show');
    @endif 
    });
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        var x = document.getElementsByClassName("image");
        x[1].style.display= "none";
        reader.readAsDataURL(event.target.files[0]);
    }
    function preview_image1(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image_partner');
            output.src = reader.result;
        }
        var x = document.getElementsByClassName("image");
        x[2].style.display= "none";
        reader.readAsDataURL(event.target.files[0]);
    }
    
</script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("{!! Carbon\Carbon::parse($user->wedding_date)->format('d M Y') !!}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
