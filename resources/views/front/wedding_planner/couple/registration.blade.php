@extends('front.wedding_planner_layout.mainlayout')
@section('content')


    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-lock icon-white"></i>
                        </div>
                        <h1>Create a FREE account &amp; save you date.</h1>
                        <p>We are not going to post anything without your permission</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Sign Up Couple</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-7 singup-couple">
                    <div class="well-box">
                        <span>"We are not going to post anything without your permission."</span>
                        <h2>OR SIGN UP WITH YOUR EMAIL</h2>
                        @if (Session::has('error_message'))
                            <h6 style="color:red">{{ Session::get('error_message') }}</h6>
                        @endif
                        <form method="POST" action="{{ url('couple-registration') }}">
                        {{ csrf_field() }}
                        <input type="text" value="{{ $partner_id }}" name="partner_id">
                        <input type="text" value="{{ $partner_email }}" name="partner_email">
                        <input type="text" value="{{ $partner_verify }}" name="partner_verify">
                            <!-- Text input-->
                            <div class="row">
                                <div class="form-group col-md-6">
                                <input type="text" placeholder="First Name" title="First Name" name="firstname" value="{{ old('firstname') }}" class="form-control"/>
                                @if($errors->has('firstname'))<label class="error">{{ $errors->first('firstname') }}</label>@endif
                                </div>
                                <div class="form-group col-md-6">
                                <input type="text" placeholder="Last Name" title="Last Name" name="lastname" value="{{ old('lastname') }}" class="form-control"/>
                                @if($errors->has('lastname'))<label class="error">{{ $errors->first('lastname') }}</label>@endif
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="row">
                                <div class="form-group col-md-6">
                                <input type="email" placeholder="Your email" title="Your Email" name="email" value="{{ old('email') }}" class="form-control"/>
                                @if($errors->has('email'))<label class="error">{{ $errors->first('email') }}</label>@endif
                                </div>
                                <div class="form-group col-md-6">
                                <input type="password" placeholder="Password" title="Password" name="password" class="form-control"/>
                                @if($errors->has('password'))<label class="error">{{ $errors->first('password') }}</label>@endif
                                </div>
                            </div>
                            <!-- Select Basic -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                <select name="country" id="country" type="dropdown" class="form-control"/>
                                    @foreach ($countries as $country)<option value="{{ $country->id }}" @if($country->name == 'India') selected="selected" @endif>{{ $country->name }}</option>@endforeach
                                </select>
                                @if($errors->has('country'))<label class="error">{{ $errors->first('country') }}</label>@endif
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="location" id="state" class="form-control">
                                        <option value="">---Select State---</option>
                                    </select>
                                    @if($errors->has('location_name'))<label class="error">{{ $errors->first('location_name') }}</label>@endif
                                </div>
                                <!-- <div class="form-group">
                                    <label for="title">Select City:</label>
                                    <select name="city" id="city" class="form-control" style="width:350px">
                                    </select>
                                </div> -->
                               <!-- <div class="form-group col-md-6">
                                    <input type="text" placeholder="Location" name="location_name"  value="{{ old('location_name') }}" class="form-control typeahead" autocomplete="off"/>
                                    <input type="hidden" name="location" value="">
                                    @if($errors->has('location_name'))<label class="error">{{ $errors->first('location_name') }}</label>@endif
                                </div>  -->
                            </div>
                            <div class="row">
                    
                                <div class="form-group col-md-6">
                                <input type="date" placeholder="Wedding Date" autocomplete="off" id="datepicker1" name="wedding_date" value="{{ old('wedding_date') ? old('wedding_date') : '' }}"  class="form-control" title="Wedding Date"/>
                                <span class="add-on"><i class="icon-th"></i></span>
                                @if($errors->has('wedding_date'))<label class="error">{{ $errors->first('wedding_date') }}</label>@endif
                                </div>
                                <div class="form-group col-md-6">
                                <input type="text" placeholder="Telephone" name="phone_number" value="{{ old('phone_number') }}" class="form-control"/>
                                @if($errors->has('phone_number'))<label class="error">{{ $errors->first('phone_number') }}</label>@endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 radio radio-img" id="radio_1">

                                    <span>I am...</span>                        
                                    <input type="radio" name="gender" id="genderm" value="1"><label for="genderm"><i class="fa fa-male" aria-hidden="true"></i>&ensp;Male</label>

                                    <input type="radio" name="gender" id="genderf" value="2"><label for="genderf"><i class="fa fa-female" aria-hidden="true"></i>&ensp;Female</label>

                                    <label for="gendero">Other</label><input type="radio" name="gender" id="gendero" value="3">
                                    @if($errors->has('gender'))<label class="error">{{ $errors->first('gender') }}</label>@endif

                                </div>
                            </div> 
                            <!-- Button -->
                            <div class="form-group">
                                <input type="submit" name="submit" value="signup" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <p>Already a Member? <a href="#">Log In</a></p>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"> <i class="icon-list-2 icon-size-60 icon-default"></i> </div>
                                <div class="feature-content">
                                    <h3>Wedding Checklist</h3>
                                    <p>Nullam porttitor lorem atdiam quis semper diam orci at neque.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-budget icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Wedding Budget</h3>
                                    <p>Donec convallis libero et risus maximus cgestas sem venenatis vel.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-wedding-arch icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Wedding Vendors</h3>
                                    <p>Aliquam erat volutpat. Quisque ullamcorper quis ipsum eget consequat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-two-hearts icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Everything you need</h3>
                                    <p>Fusce dapibus ex ac justo facili libero et risus maximus convallis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .input_hidden {
        position: absolute;
        left: -9999px;
    }
    .selected {
        color: red !important;
    }
    
   .radio-img label {
        display: inline-block;
        cursor: pointer;
    }
    
    .radio-img label img {
        padding: 3px;
    }
</style>
<script>
   /* $("#radio_1").prop("checked", true);*/
   $('#datepicker1').datepicker({
        format: 'dd-mm-yyyy',
        minDate: 0,
    });
    $('.radio-img input:radio').addClass('input_hidden');
    $('.radio-img label').click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val(); 
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryID,
           success:function(res){            
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
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
   });

    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
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
        
   });
</script>

<style>
span.error,label.error {  font-size: 11px;  padding: 0; margin: 0; color: #e40404 !important; font-weight: normal; }
</style>

@endsection 




