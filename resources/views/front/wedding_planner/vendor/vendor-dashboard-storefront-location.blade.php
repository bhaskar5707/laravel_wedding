@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
    <div class="main-container">
        <div class="container">
            

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                    	<div class="bg-white pinside40 mb30">
                         @include('front.wedding_planner.vendor.storefront_left') 
                        </div>
                    </div>
                    <div class="col-md-8">
	                    <div class="bg-white pinside40 mb30">
                        @if (Session::has('error_message'))
                        <h2 style="color:red">{{ Session::get('error_message') }}</h2>
                        @endif

                        @if (Session::has('success_message'))
                        <h2 style="color:green">{{ Session::get('success_message') }}</h2>
                        @endif
                        <h1 class="main-head-cntct">Location & Map</h1>
                        <div class="cntct-grey" style="height: 105px;">
                            <div class="edt-left">
                                <i class="fa fa-map" aria-hidden="true"></i>
                            </div>
                            <div class="txt">
                                <h3>Edit your business location on the map by dragging the marker to your desired address.</h3>
                                <p>Address must contain the street name followed by any additional information (Apartment, Suite, Floor, etc.).<br><span style="color: #9a9a9a;">Example: 104, 1<sup>st</sup> Floor, C-104, Sector 59, Noida</span></p>
                            </div>
                        </div>   


                        <h2 class="heding-desgn">Location Information</h2>
                        <div class="location">
                        <div class="form-group">
                          <form method="POST" action="{{url('vendor_location')}}">
                          {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12 postal">
                                        <div class="postalinner">
                                           <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" name="country" id="country">
                                                    
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state" id="state">
                                                    
                                                </select>
                                                
                                              </div>
                                              <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" name="city" id="city">
                                                    
                                                </select>
                                              </div>
                                              {{-- <div class="form-group">
                                                <label>Locality</label>
                                                <input type="text" id="area" name="locality" value="" class="form-control" placeholder="Enter your locality"/>
                                              </div>
                                               --}}
                                              
                                              
                                            </div>
                                            <div class="col-md-6">
                                              {{-- <div class="form-group">
                                                <label>Area</label>
                                                <input type="text" name="area" value="{{ isset($loc->address) ? $loc->address : old('address')}}" id="area" class="form-control"placeholder="Enter area"/>
                                              </div> --}}
                                              <div class="form-group">
                                                <label>Landmark</label>
                                                <input type="text" name="landmark" value="{{ isset($loc->landmark) ? $loc->landmark : old('landmark') }}" class="form-control" placeholder="Enter your Landmark"/>
                                              @if($errors->has('landmark')) <label class="error">{!! $errors->first('landmark') !!}</label> @endif
                                              </div>
                                              <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" value="{{ isset($loc->postal_code) ? $loc->postal_code : old('postal_code') }}" id="postal_code" name="postal_code" class="form-control" placeholder="Enter your Postal/Zip Code"/>
                                              @if($errors->has('postal_code')) <label class="error">{!! $errors->first('postal_code') !!}</label> @endif
                                              </div>
                                              <div class="form-group">
                                                <label>Shop No/ Building No</label>
                                                <input type="text" name="shopno" value="{{ isset($loc->shopno) ? $loc->shopno : "" }}" class="form-control" placeholder="Enter shop No"/>
                                              @if($errors->has('shopno')) <label class="error">{!! $errors->first('shopno') !!}</label> @endif
                                              </div>
                                             
                                              
                                            </div>
                                           

                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label style="width: 19%">Address</label>
                                                <input type="text"  autocomplete="on" placeholder="Area/ Locality" value="{{ isset($loc->address) ? $loc->address : old('address')}}" name="address" id="address" class="form-control"/>
                                                @if($errors->has('address')) <label class="error">{!! $errors->first('address') !!}</label> @endif
                                                
                                              </div>
                                              
                                            </div>


                                            
                                        <br>
                                        <br>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <div class="form-group">                                                  
                                                  <input type="submit" name="submit" Value="SAVE" />
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
    </div>
  </div>
  </div>
</div>


<script>
    $( ".vendordashboardmenu ul li:nth-child(6)").addClass("active");
</script>

<style type="text/css">
  .cntct-grey {
  width: 75%;
  
  margin-left: 25%;
  
  margin-bottom: 25px;
  border-radius: 3px;
  padding: 10px;
  height: 90px;
}
.cntct-grey .edt-left {
    float: left;
    width: 7%;
}
.cntct-grey .txt {
    float: left;
    width: 91%;
    margin-left: 2%;
}
.txt h3 {
    color: #000;
    font-weight: 600;
    margin: 0;
    padding: 10px 0;
    font-size: 15px;
}
.txt p {
    font-size: 14px;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript">
var country_id = {{ isset($country->id) ? $country->id : 0}};
var country_name = '{{ @$country->name}}';
var state_id = {{ isset($state->id) ? $state->id : 0}};
var state_name = '{{ isset($state->name) ?  $state->name : ''}}';
var city_id = {{ isset($city->id) ?  $city->id : 0 }};
var city_name = '{{ isset($city->name) ? $city->name : '' }}';
$(function(){

 //alert([country_id,country_name])
    getCountry();
    getState(country_id);
    getCity(state_id);
    var city = $('#city').val();
    var address = $('#address').val();
    //var x =  'https://maps.google.com/maps?q='+city+' a&t=&z=7&ie=UTF8&iwloc=&output=embed';
    if(address!=""){
    var x =  'https://maps.google.com/maps?q='+address+' a&t=&z=7&ie=UTF8&iwloc=&output=embed&z=17';
    $('#gmap_canvas').attr('src', x)
    }
    else{ 
        var x =  'https://maps.google.com/maps?q='+city+' a&t=&z=7&ie=UTF8&iwloc=&output=embed&z=13';
    $('#gmap_canvas').attr('src', x)
    }
});
 
 
 
  function getCountry(){
      $.ajax({
        type:"GET",
        url:"{{url('get-country-list')}}",
        success:function(res){               
         if(res){
             $('#country').empty();  
             if(country_id > 0){           
               $('#country').append('<option value="'+country_id+'" >'+country_name+'</option>');     
             }
             $.each(res,function(key,value){
                 $('#country').append('<option value="'+key+'">'+value+'</option>');
             });        
         }else{
            $('#country').empty();
         }}
     });        
    }
    function getState(countryid)
    {
        if(countryid){
            $.ajax({
               type:"GET",
               url:"{{url('get-state-list')}}?country_id="+countryid,
               success:function(res){             
                if(res){
                    $("#state").empty();
                    if(state_id >0){
                        $("#state").html('<option value="'+state_id+'" >'+state_name+'</option>');     
                    }
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#state").empty();
                }
               }
            });
        }else{
            $("#state").empty();
            $("#city").empty();
        } 
    }
    function getCity(stateid){
        if(stateid){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateid,
           success:function(res){               
            if(res){
                $("#city").empty();
                if(city_id >0){
                    $("#city").append('<option value="'+city_id+'">'+city_name+'</option>');     
                }
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
        }else{
            $("#city").empty();
        }
    }
    $('#country').change(function(){
        var countryID = $(this).val();  
        getState(countryID);     
    });
    $('#state').on('change',function(){
        var stateID = $(this).val();
        getCity(stateID);        
    });

</script>


@endsection 

