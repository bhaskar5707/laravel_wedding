@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.couple.couple-header')
<div class="main-container">
    <div class="container">
        <div class="row">
            @include('front.wedding_planner.couple.modal-popup.new-guest')
            
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <h2>My Guests</h2>
                        <div class="col-md-9 adultchild">
                            @if (isset($countGuest) && count($countGuest))
                            @foreach ($countGuest as $key => $countData)                       
                            @php
                             $img = isset($countData['icon']) ? $countData['icon'] : '';
                            @endphp
                            <div class="col-md-3 item">
                                <img src="{!! asset('front/wedding_planner/image/').'/'.$img !!}" class="img-responsive"/> 
                                <p>{{ ucfirst($key) }} </br><span>{{ $countData['count'] }}</span></p>               
                            </div>
                            @endforeach
                            @endif
                            
                            <div class="col-md-3 item">
                                <p>Total </br><span>{{ $countGuestTotal }}</span></p>
                            </div>   
                        </div>
                       
                        <div class="col-md-3 theguests">
                            <div class="confirmed col-md-3">
                                <ul>
                                    @foreach ($attendence as $att)
                                        <li>{{$att->name}} <span>{{ isset($att->id) ? count($att->guests) : 0 }}</span></li>
                                    @endforeach                            
                                </ul>                       
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-4 registry">
                            <h2>CREATE YOUR REGISTRY</h2>
                            <ul>       
                                <li><a href="#newGustRegister" data-toggle="modal"><i class="fa fa-plus"></i>Guest</a></li>
                                <li id="groupregis"><a href="#groupCreate" role="button" data-toggle="modal"><i class="fa fa-plus"></i>Group</a></li>
                                <li id="menuregis" style="display: none;"><a href="#menuCreate" role="button" data-toggle="modal"><i class="fa fa-plus"></i>Menu</a></li>
                            </ul>    
                        </div>
                        <div class="col-md-5 theguests">
                            <h2>FOR THE GUESTS</h2>
                            <ul>
                                <li><a href="{{ route('couple.guest.invitation').'#showthis' }}"><i class="fa fa-envelope"></i>Online Invitation</a></li>
                                <li><a href=""><i class="fa fa-envelope"></i>Request RSVP</a></li>
                                <li><a href=""><i class="fa fa-envelope"></i>Request address</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 theguests">
                            <h2>Download/print</h2>
                            <ul>
                                <li><a href=""><i class="fa fa-download"></i>Download</a></li>
                                <li><a href=""><i class="fa fa-print"></i>Print</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="couple-board">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coming-soon-content text-center">
                                <div id="livesearchguest" class="tab-pane fade active"></div>
                                <ul class="nav nav-tabs gma">
                                    <li class="active" onclick="showgroup();"><a data-toggle="tab" href="#group" id="showgroup">GROUPS </a></li>
                                    <li onclick="showmenu();"><a data-toggle="tab" href="#menus" id="showmenu">MENUS</a></li>
                                    <li onclick="showattendance();"><a data-toggle="tab" href="#attendance" id="showattendance">ATTENDANCE</a></li>    
                                </ul>

                                <div class="tab-content">

                                    <div id="group" class="tab-pane fade in active">
                                        

                                    </div>

                                    <div id="menus" class="tab-pane fade">
                                        

                                    </div>

                                    <div id="attendance" class="tab-pane fade">
                                        

                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

$.fn.putCursorAtEnd = function() {
  return this.each(function() {
    // Cache references
    var $el = $(this),
        el = this;
    // Only focus if input isn't already
    if (! $el.is( ':focus') ) {
     $el.focus();
    }

    // If this function exists... (IE 9+)
    if (el.setSelectionRange) {

      // Double the length because Opera is inconsistent about whether a carriage return is one character or two.
      var len = $el.val().length * 2;
      
      // Timeout seems to be required for Blink
      setTimeout( function() {
        el.setSelectionRange( len, len );
      }, 1 );
    
    } else {
      // As a fallback, replace the contents with itself
      // Doesn't work in Chrome, but Chrome supports setSelectionRange
      $el.val($el.val());
      
    }
    // Scroll to the bottom, in case we're in a tall textarea
    // (Necessary for Firefox and Chrome)
    this.scrollTop = 999999;
  });

};

</script>
@include('front.wedding_planner.couple.modal-popup.guestlist-tab')
@include('front.wedding_planner.couple.guest.guestjs')
@endsection 
