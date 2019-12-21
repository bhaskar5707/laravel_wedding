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
                <h1>Online Invitation <small>Send your invitations online</small></h1>
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
                        
                        <form class="guests-invitationForm-upload" enctype="multipart/form-data" action="" method="post" target="formImageCrop">
                            {{csrf_field()}}
                            <div class="row">
                               <div class="col-sm-12">
                                    <div class="col-xs-6">
                                    
                                        <div class="guestform">
                                        
                                        <table class="guests-invitation"  cellspacing="0" cellpadding="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="overflow:hidden; height: 325px;">
                                                        <form class="guests-invitationForm-upload" enctype="multipart/form-data" action="" method="post" target="formImageCrop">

                                                            <div class="imageupload"><i class="fa fa-camera"></i></div>
                                                            <label for="upload">Upload image</label>
                                                            <input  class="guests-invitationForm-upload-input" id="upload" type="file" accept="image/*" name="headerimage" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" data-validation="dimension mime" data-validation-dimension="min600x300" data-_token="{{csrf_token()}}" data-id="{{ $invitation->id }}">
                                                        </form>
                                                        <img id="blah" alt="" class="img-responsive" src="{{ asset('front/wedding_planner/image/couple/invitation/'.$invitation->image) }}" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:40px 40px 25px 40px;font-size: 32px;line-height: 36px; text-align: center;color:#222222;">
                                                        <span id="">{{ ucwords($invitation->bridge_name) }}                    &amp; 
                                                {{ ucwords($invitation->partner_name) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 40px 5px 40px;font-size:14px;line-height: 18px; text-align: center;color:#222222;">
                                                        <span id=""> {{ $invitation->wedding_date }}
                                                             

                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 40px 5px 40px;font-size:14px;line-height: 12px; text-align: center;color:#222222;">
                                                        <span id="">{{ $invitation->wedding_place }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:30px 40px 20px 40px;font-size: 16px;font-weight: 500; text-align: center;text-transform: uppercase;color:#222222;">
                                                        <span id="">{{ $invitation->title }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom:20px;">
                                                        <table id="" cellspacing="0" cellpadding="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding:5px 40px;font-size: 14px; line-height: 25px;text-align: center;color:#222222;">{{ $invitation->txt_message }} </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center;padding:10px 40px 40px;">
                                                        <button id="rsvp_button" type="button" class="btn-flat red disabled">RSVP</button>                                
                                                    </td>
                                                </tr>
                                                <tr id="showweb">
                                                    <td>
                                                        <table class="guestsInvitationFooter" style="border-top:1px solid #D9D9D9;width:580px;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding:30px 0 30px 70px" align="right">
                                                                        <img style="width:40px;height:auto;padding-right:12px;" width="75" src="">
                                                                    </td>
                                                                    <td style="overflow:hidden; font-size:13px;line-height:15px;color:#222222;">

                                                                     
                                                                    @if (!empty($invitation->website))
                                                                    <span>Visit our website</span><br>
                                                                       <a href="{{ $invitation->website }}" target="_blank">{{ $invitation->website }}</a>
                                                                    @else
                                                                         <span>No Website</span>
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
                                 
                                    <div class="col-xs-6">

                                        <div class="guestform">

                                            <h2 class="addEmail">Add emails</h2>
                                            <div class="line clearfix">
                                                <div class="sendmessage">
                                                    <p>For : </p>
                                                    <ul></ul>
                                                </div>
                                                <div class="selectguest">                           
                                                    <p>Choose your guests:</p>                          
                                                </div>
                                                <div class="searchbox">
                                                    <i class="fa fa-search"></i>
                                                    <input id="" class="" placeholder="Search guests..." type="text" value="">
                                                </div>
                                                <div class="guestlist">
                                                    <div class="form-group">
                                                        <label>
                                                          <input type="checkbox" name="all"><span>Select all</span>
                                                          <input type="hidden" name="guestidArary" value="">
                                                        </label>
                                                    </div>
                                               
                                                    <table>
                                                        <tbody>
                                                            @foreach ($guest as $element)
                                                                <tr><td class="check"><input type="checkbox" name="chk_guest" class="checkBoxClass" value="{{$element->id}}">
                                                                    <input type="hidden" name="id[]" value="{{ $element->id }}">
                                                                </td>
                                                                <td>
                                                                     @if (($element->gender == 'male') && ($element->age == 'adult'))
                                                                <img src="{{ asset('front/wedding_planner/image/male-adult.jpg') }}" class="img-responsive image">
                                                            @elseif(($element->gender == 'male') && ($element->age == 'child'))
                                                                <img src="{{ asset('front/wedding_planner/image/male-child.jpg') }}" class="img-responsive image">
                                                            @elseif(($element->gender == 'male') && ($element->age == 'infant'))
                                                                <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}" class="img-responsive image">
                                                            @elseif(($element->gender == 'female') && ($element->age == 'adult'))
                                                                <img src="{{ asset('front/wedding_planner/image/female-adult.jpg') }}" class="img-responsive image">
                                                            @elseif(($element->gender == 'female') && ($element->age == 'child'))
                                                                <img src="{{ asset('front/wedding_planner/image/female-child.jpg') }}" class="img-responsive image">
                                                            @elseif(($element->gender == 'female') && ($element->age == 'infant'))
                                                                <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}" class="img-responsive image">
                                                            @endif
                                                                    
                                                                    <div class="guestname">
                                                                        <h4>{{ $element->firstname . " " . $element->lastname}}</h4>
                                                                        <span>{{ isset($element->group->name) ? $element->group->name :"Unasigned Group"}} </span>
                                                                        <input type="hidden" name="name[]" value="{{ $element->firstname . " " . $element->lastname}}">
                                                                    </div>
                                                                </td>
                                                                <td style="width: 100px;">
                                                                    <a role="button" data-id="" class="mailname">{{ $element->email}}</a>
                                                                    <input type="hidden" name="email[]" value="{{ $element->email }}">
                                                                    <label class="pull-right addanemail hide">Add an Email</label>
                                                                    <div class="form-group pull-right hide">
                                                                        <input type="text" name="addemail">
                                                                        <button>Add</button>
                                                                    </div>
                                                                    <!-- <div class="form-add-mail">
                                                                        <div class="flex">
                                                                            <input class="input-add-mail p10" type="email" name="Mail" id="Mail" value="">
                                                                            <span data-id="" class="checksend"><i class="icon-tools icon-tools-check-white"></i></span>
                                                                        </div>
                                                                    </div> -->
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>  
                                                <div class="guestfooter">                             
                                                    <p>Wedding Website</p>
                                                    <a href="#">{{Auth::user()->website}}</a> 
                                                    <div class="radioswitch">
                                                        <label class="switch">
                                                          <input type="checkbox" checked="">
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>                      
                                                </div> 

                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('invitation.mail.preview',$invitation->id) }}">
                                                    <button class="btn btn-flat red" type="submit">Send Mail</button></a>
                                                </div> 
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
</div>

<script>
    $(function(){
        checkedData();             
    });    

 function checkedData(){
        var favorite = [];
        var selectedData = [];
        $.each($("input[name='chk_guest']:checked"), function(){
            favorite.push($(this).val());
        });        
        $.ajax({
            url: "{{ url('/rsvp/guest/select') }}",
            data:{idArray:favorite,_token:'{{ csrf_token() }}'},
            type: 'POST',
            dataType:'json',
            success:function(data){
                html = '';
                $.each(data, function(index, element) {
                    html +='<li class="tag">'+element.firstname+ ' ' +element.lastname+'</li>';                    
                });   
                $('input[name="guestidArary"]').val(favorite);          
                $('.sendmessage ul').html(html);                
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });        
    } 
        $('input[type="checkbox"][name="all"]').change(function () {
            var status = this.checked;
            $(".checkBoxClass").each(function(){
                this.checked = status;
            });
            checkedData();
        });
        $('.checkBoxClass').change(function(){
            if(this.checked == false){
                $('input[type="checkbox"][name="all"]')[0].checked = false;
            }
            if ($('.checkBoxClass:checked').length == $('.checkBoxClass').length ){ 
                //change "select all" checked status to true
                $('input[type="checkbox"][name="all"]')[0].checked = true; 
            }
            checkedData();
        });
</script>




@endsection 
