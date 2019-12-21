@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.couple.couple-header')
<div class="main-container">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="dashboard-page-head">
    <div class="row">
        <div class="col-md-8">
            <div class="page-title">
                <h1>Access your wedding album to see and share the best pictures. <small></small></h1>
            </div>
        </div>
        <div class="col-md-4">
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
                

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-xs-3">
                       <ul class="nav nav-tabs tabs-left album">
                            <li class="active"><a data-toggle="tab" href="#home">Album</a></li>
                            <li><a data-toggle="tab" href="#menu1">Guests</a></li>
                            <li><a data-toggle="tab" href="#menu2">Settings</a></li>
                        </ul>
                    </div>
          
                    <div class="col-xs-9">

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                              <div class="photoalbum">
                                <div class="col-sm-8">
                                <h1>{{ $userData->name }} 
                                     
                                    @if(!empty($partnerData->name)) {{ '& '.$partnerData->name }} @endif
                                </h1>
                                <a href="{{ url('/edit-ablum-url/'.$userData->id ) }}" class=""><i class="fa fa-link" aria-hidden="true"></i>&ensp;Edit Link</a>
                                    </br>
                                    
                                    <a href="{{url('/my-album/').'/'.$userData->album_url.'/'.$userData->id}}" >{{url('/my-album/').'/'.$userData->album_url.'/'.$userData->id}}</a>&ensp;
                                
                                </div>
                                <div class="col-sm-4">
                                <div class="downloadshare">   
                                    <a href="{{ url('album/download/'.$userData->album_url) }}" class="down-al">Download album</a><br><br>
                                    <a href="{{ url('album/share/'.$userData->album_url) }}" class="shre-al">Share album</a>
                                </div>
                                </div>

                                <div class="photo">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach  ($userAlbum as $key => $data)
                                            <div class="col-md-3">
                                                <a href="{{ url('photo-comment-like/'.$data->id) }}" target="_blank">
                                                <img src="front/wedding_planner/image/guest_album/{{ $data->filename }}" class="img-responsive" width="200" height="100" style="width:200px; height: 120px"/>
                                                <a href="front/wedding_planner/image/guest_album/{{ $data->filename }}" download>
                                                    <span class="download">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ url('guest-albumby-id/delete/'.$data->id) }}">
                                                    <span class="delete">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                                </a>
                                            </div>
                                            @endforeach 
                                        </div>
                                    </div>
                                </div>
                                </div>
                              
                            </div>



                            <div id="menu1" class="tab-pane fade">
                              <div class="album-guest col-md-8"> 
                                <div>
                                    <h3>Total Guest(s): <span>{{ $guestCount->count() }}</span> Guest(s)</h3>
                                </div>
                                <div>
                                    <h3>Total Photo(s): <span>{{ $userAlbum->count() }}</span> Photo(s)</h3>
                                </div>
                                <div>
                                    <h3>Status: <span style="color: green">Visible</span><span><i class="fa fa-eye-slash" aria-hidden="true"></i></span></h3>
                                </div>
                            </div>
                            <div class="album-guest col-md-4">
                                <a href="{{ url('album/download/'.$userData->album_url) }}" class="down-al">Download album</a><br><br>
                                <a href="{{ url('album/share/'.$userData->album_url) }}" class="shre-al">Share album</a>
                            </div>
                            <div class="album-guest-table">
                                @if($guest)
                                <table class="table">
                                    <tbody>
                                        @foreach($guest as $element)
                                        @if($element->albums->count() > 0)
                                      <tr>
                                        <td>
                                            @if (($element->gender == 'male') && ($element->age == 'adult'))
                                            <img src="{{ asset('front/wedding_planner/image/male-adult.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @elseif(($element->gender == 'male') && ($element->age == 'child'))
                                            <img src="{{ asset('front/wedding_planner/image/male-child.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @elseif(($element->gender == 'male') && ($element->age == 'infant'))
                                            <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @elseif(($element->gender == 'female') && ($element->age == 'adult'))
                                            <img src="{{ asset('front/wedding_planner/image/female-adult.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @elseif(($element->gender == 'female') && ($element->age == 'child'))
                                            <img src="{{ asset('front/wedding_planner/image/female-child.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @elseif(($element->gender == 'female') && ($element->age == 'infant'))
                                            <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}" alt="user-pic" class="img-responsive img-circle" width="50" height="50">
                                            @endif
                                            
                                            
                                            </td>
                                        <td><a href="#">{{ $element->firstname .  ' ' . $element->lastname}}</a></td>
                                        <td>{{ $element->albums->count() }}   photos</td>
                                        
                                        <!--<td>0 comments</td>
                                        <td>0 likes</td>-->
                                        <td>
                                            <label class="switch">
                                                <input class="switch-input" type="checkbox">
                                                <span class="switch-label" data-on="On" data-off="Off"></span> 
                                                <span class="switch-handle"></span> 
                                            </label>
                                        </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            </div>



                            <div id="menu2" class="tab-pane fade">
                              <div class="album-website-setting col-md-8">
                                <h3>Album Website</h3>
                                <a href="{{url('/my-album/').'/'.$userData->album_url.'/'.$userData->id}}" class="alb-link"><span><span class="user-name-on-album">{{url('/my-album/').'/'.$userData->album_url.'/'.$userData->id}}</span></span></a>
                                <a href="{{ url('/edit-ablum-url/'.$userData->id ) }}"><i class="fa fa-link" aria-hidden="true"></i>&nbsp;Edit</a>
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
</div>
</div>
</div>
</div>
<script type="text/javascript">
$( "ul.coupleul li:nth-child(7)").addClass("active");
</script>
<script src="https://cdn.ckeditor.com/4.11.2/basic/ckeditor.js"></script>
<script>  
CKEDITOR.replace('description');    
</script>

<style>
    .download{
        position: absolute;
        bottom: 20px;
        background-color: #000000c2;
        color: #fff;
        padding: 0 10px;
        left: 15px;
    }
    
    .delete{
        position: absolute;
        bottom: 20px;
        right: 15px;
        background-color: #000000c2;
        color: #fff;
        padding: 0 10px;
    }
</style>

<script type="text/javascript">
$( "ul.coupleul li:nth-child(7)").addClass("active");
/*$(".sw").click(function(){
    $(".st-v").addClass("hide");
    $(".st-h").removeClass("hide")
  });*/
</script>


@endsection 
