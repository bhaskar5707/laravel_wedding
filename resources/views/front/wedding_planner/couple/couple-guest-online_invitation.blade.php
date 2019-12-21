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
                <h1>Our Story <small>Summary</small></h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="action-block"> <a href="{{ url('/couple-dashboard-our-story') }}" class="btn btn-default">Add Story</a> </div>
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
                
            <form action="{{ route('guest.invitation.store') }}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
             <div class="row">
                <div class="col-sm-12">
                    <div class="col-xs-3">
                    
                    <div class="guestform">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#new" aria-expanded="true">
                             <i class="fa fa-edit"></i>New</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#saved" aria-expanded="true">
                               <i class="fa fa-heart"></i>Saved<span class="guests-invitationForm-tabs-counter"></span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="new" class="tab-pane fade active in">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="send" value="0">
                                <input type="hidden" name="imagesrc" value="{{ isset($userDetail->image) && !empty($userDetail->image) ? $userDetail->image: '' }}">

                                <div class="form-group">
                                    <label>Your name</label>
                                    <input type="text" name="bridge_name" value="{{ $userDetail->name  }}">
                                     
                                </div>
                                <div class="form-group">
                                    <label>Partner's name</label>
                                    <input type="text" name="partner_name" value="{{  isset($partnerData->name) ? $partnerData->name : '' }}">
                                     
                                </div>
                                <div class="form-group">
                                    <label>Wedding date</label>
                                    <input type="text" name="wedding_date" value="{{ $userDetail->wedding_date  }}">
                                     
                                </div>
                                <div class="form-group">
                                    <label>Wedding location</label>
                                    <input type="text" name="wedding_place" value="{{ $userDetail->wedding_place }}">
                                     
                                </div>
                                <div class="form-group @if($errors->has('title')) has-error @endif">
                                    <label>Title</label></br>
                                    <input type="text" name="title">
                                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span> @endif
                                </div>
                                <div class="form-group @if($errors->has('txt_message')) has-error @endif ">
                                    <label>Message</label>  </br>              
                                    <textarea name="txt_message"></textarea>
                                    @if($errors->has('txt_message')) <span class="error">{{$errors->first('txt_message')}}</span> @endif                            
                                </div>
                                <div class="weddingweb">               
                                    <div class="col-lg-7"> 
                                        <label>Wedding Website</label>
                                        <div class="weburl">
                                           <a href="{{$userDetail->website}}"> {{$userDetail->website}}</a>                               
                                        </div>
                                    </div>
                                    <div class="col-lg-5">   
                                    <div class="radioswitch">                             
                                        <label class="switch">
                                            <input type="checkbox" name="website">
                                                <span class="slider round"></span>
                                        </label> 
                                    </div>                              
                                    </div>                                 
                                </div> 
                                <div class="requestrvsp">
                                    <div class="col-lg-7">
                                        <p class="input-group-line-label">Request RSVP</p>
                                    </div>
                                    <div class="col-lg-5">   
                                    <div class="radioswitch">                             
                                        <label class="switch">
                                            <input type="checkbox" name="rsvp_confirm">
                                                <span class="slider round"></span>
                                        </label> 
                                    </div>                              
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="button">
                                                <input type="submit" name="Save" class="button-outline">
                                               
                                                <input type="submit"  class="button-outline" onclick="return saveandsend();" data-send="1" value="Save and send"> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                            <div id="saved" class="tab-pane fade in">
                                <div class="plesecome">
                                    @foreach ($invitationData as $element)
                                    <p>
                                        <a class="comeonbtn" href="{{ route('guest.invitation.edit',$element->id) }}" role="button" data-id="{{ $element->id }}">{{ $element->title }}</a>
                                        <span class="pull-right"><a href="{{ route('guest.invitation.delete',$element->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                    </p>
                                    @endforeach
                                    <a href="{{ route('couple.guest.invitation') }}">
                                        <button class="btn-outline outline-red app-link" data-target="#new" style="margin-top: 20px;">New invitation </button>
                                    </a>
                                </div>                    
                            </div>


                        </div>

                    </div>
                        
                    </div>
                    
                    <div class="col-xs-9">


                        <div id="" class="guestsinvitationpreview">@if($errors->first('image')) <span class="error">{{ $errors->first('image') }}</span>@endif
                        <table class="guests-invitation"  cellspacing="0" cellpadding="0" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="upload-btn-wrapper">
                                          <button class="btn">Upload a file</button>
                                          <input type="file"  id="image" name="image" />
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:40px 40px 25px 40px;font-size: 32px;line-height: 36px; text-align: center;color:#222222;">
                                        <span id="">{{ ucwords($userDetail->name)}}  &amp;  {{ isset($partnerData->name) ? ucwords($partnerData->name) : "" }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 40px 5px 40px;font-size:14px;line-height: 18px; text-align: center;color:#222222;">
                                        <span id=""> {{ isset($partnerData->wedding_date) ? Carbon\Carbon::parse($partnerData->wedding_date)->format('d M Y') : '' }}  </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 40px 5px 40px;font-size:14px;line-height: 12px; text-align: center;color:#222222;">
                                        <span id="">Place</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:30px 40px 20px 40px;font-size: 16px;font-weight: 500; text-align: center;text-transform: uppercase;color:#222222;">
                                        <span id="">Invitation title</span>
                                        @if($errors->first('title')) <span class="error">{{ $errors->first('title') }}</span>@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:20px;">
                                        <table id="" cellspacing="0" cellpadding="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:5px 40px;font-size: 14px; line-height: 25px;text-align: center;color:#222222;">Invitation text </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;padding:10px 40px 40px;">
                                        <button id="rsvp_button" class="btn-flat red disabled">RSVP</button>                                
                                    </td>
                                </tr>
                                <tr id="showweb">
                                    <td>
                                        <table class="guestsInvitationFooter" style="border-top: 1px solid #d9d9d9;width:100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:30px 0 30px 70px" align="right">
                                                        <img style="width:40px;height:auto;padding-right:12px;" width="75" src="">
                                                    </td>
                                                    <td style="overflow:hidden; font-size:13px;line-height:15px;color:#222222;">

                                                    {!! !empty($userDetail->website) ? "<span style='float: left;'>Visit our website</span><br>" : "" !!}

                                                        @if(!empty($userDetail->website))
                                                        <a style="text-decoration:underline;color:#444444;float: left;" target="_blank" href="{{ url('web',$userDetail->website) }}" >{!! $userDetail->website !!}</a>
                                                        @else
                                                        <span style="text-decoration:underline;color:#444444;float: left;">No Website</span>
                                                        @endif
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                                             
                    </div>
                    </div>
                </div>
            </div>
           </form>

    </div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(function()
{
    $(".up-im").click(function(){
    $(".imageupload").addClass("hide");
    });
    $('input[type="checkbox"][name="rsvp_confirm"]').change(function(){
    if($(this).is(':checked')){
     $('#rsvp_button').show();
    }else{
    $('#rsvp_button').hide();
    }
    })
    $('input[type="checkbox"][name="website"]').change(function(){
    if($(this).is(':checked')){
     $('#showweb').show();
    }else{
    $('#showweb').hide();
    }
    })   
    saveandsend = function(){            
    $('input[name="send"]').val(1);
    $('#frmOnline').submit();

    }     
});

$(".app-link_new").click(function () 
{
    var target = $(".nav-tabs li.active");
    var sibbling;
    sibbling = target.prev();

    if (sibbling.is("li")) {
    sibbling.children("a").tab("show");
    }
    });
    </script>
    <script type="text/javascript">
    $('input[type="checkbox"][name="wesite"]:checked');
    function uploadImage(image_val){
    var img = image_val.name; 
    document.getElementById('blah').src = window.URL.createObjectURL(image_val);
    var user_id = {{ $userDetail->id }};
    if(img == ''){
    alert('Select image..');
    }    
    $.ajax({
    type: "POST",
    url: "{{ url('/upload/image/invitation') }}",
    data: {image:img,_token:'{{ csrf_token() }}',user_id:user_id},
    success: function(result){
        console.log(result);
    }
    });                
}
</script>


@endsection 
