@extends('front.wedding_planner_layout.mainlayout')
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <div class="icon-circle">
                        <i class="icon icon-size-60 icon-curtains icon-white"></i>
                    </div>
                    <h1>Are you Supplier - Start Business</h1>
                    <p>Wedding Vendor works with thousands of wedding vendors worldwide.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Sing Up Vendor</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="well-box">

                    @if (Session::has('error_message'))
                        <h2 style="color:red">{!! Session::get('error_message') !!}</h2>
                    @endif
        
                    @if (Session::has('success_message'))
                        <h2 style="color:green">{!! Session::get('success_message') !!}</h2>
                    @endif
                    <form method="POST" action="{{ url('vendor/vendor-registration')}}">
                        {{ csrf_field() }}
                        <h2>Vendor Registration</h2>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="name">User Name<span class="required">*</span></label>
                           
                            <input type="text" placeholder="Name of your Business" name="business" class="form-control title" value="{{old('business')}}"/>
                            <input type="hidden" name="slug" class="slug">
                            {!! $errors->first('business', '<span class="help-block">:message</span>') !!}
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                            <input type="email" value="{{old('email')}}" placeholder="Your email" name="email" class="form-control"/>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Business Phone<span class="required">*</span></label>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                <select name="country_code" style="background-color: transparent; border: 1px solid #ccc; box-shadow: inset 0 1px 1px rgba(0,0,0,.075); height: 34px; float: left; margin-right: 5%; border-radius: 3px;">
                                    <option value="+1">+1</option>
                                    <option value="+91" selected>+91</option>
                               </select>
                               </div>
                               <div class="col-sm-8">
                               <input type="text" value="{{old('phone')}}" placeholder="Your Phone No." name="phone" class="form-control" />
                               {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Brand Name<span class="required">*</span></label>
                            <input type="text" value="{{old('brand')}}" placeholder="Name of your brand" name="brand" class="form-control"/>
                            {!! $errors->first('brand', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                <label class="control-label" for="email">Category Name<span class="required">*</span></label>
                                    <select name="category" id="category" class="form-control input-sm" >
                                        <option value="">Select</option>
                                        @foreach($category as $k)
                                        <option data-id="{{ $k->id }}" @if($k->category == old('category')) selected=""@endif value="{{ $k->category }}">{{ $k->category }}</option>
                                        @endforeach
                                        {{--<option value="Dance And Music">Dance And Music</option>--}}
                                    </select>
                                {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-sm-6">
                                <label class="control-label" for="email">Subcategory Name<span class="required">*</span></label>
                                    <select name="sub_category" id="subcategory" class="form-control input-sm">
                                         
                                    </select>
                                    <input type="hidden" name="subcategory_id" value="">
                                    <input type="hidden" name="category_id" value="">
                                    {!! $errors->first('sub_category', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label" for="email">Country<span class="required">*</span></label>
                                    <select name="country" class="countries order-alpha form-control" id="country">
                                        <option value="">Select Country</option>
                                    </select>
                                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" for="email">State<span class="required">*</span></label>
                                    <select name="state" class="states order-alpha form-control" id="state" >
                                        <option value="">Select State</option>
                                    </select>     
                                    {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" for="email">City<span class="required">*</span></label>
                                    <select name="city" class="cities order-alpha form-control" id="city" >
                                        <option value="">Select City</option>
                                    </select>
                                    {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            
                        </div>
                       
                       
                        <!-- Button -->
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary btn-lg" style="margin-top: 11px;">create an account</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="feature-block feature-left">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-love-letter icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Questions ? Contact us </h3>
                                    <p>Can't get any answer am poenatis condimentum. Fusce risus odiamrper at, lacinia vel leo.</p>
                                    <a href="#" class="btn btn-default btn-sm">Help Center</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="feature-block feature-left">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-list-3 icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Wedding Pricing</h3>
                                    <p>View our pricing table enenatis conntum. Fusce risus odio, egestas sit amet usllamcornia vel leo.</p>
                                    <a href="#" class="btn btn-default btn-sm">View Pricing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript">
function slugify(text) 
{
// https://gist.github.com/mathewbyrne/1280286
  return text.toString().toLowerCase()
  .replace(/\s+/g, '-')           // Replace spaces with -
  .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
  .replace(/\-\-+/g, '-')         // Replace multiple - with single -
  .replace(/^-+/, '')             // Trim - from start of text
  .replace(/-+$/, '');            // Trim - from end of text
}

$('.title').keyup(function(){
    //console.log($(this).val());
    $slug = slugify($(this).val());
    $('.slug').val($slug);
});
</script>
<script type="text/javascript">
    $(document).ready(function () { 
        getCountry();
        getState(country_id);

        $('#category').on('change',function(e){
            console.log(e);
            var cat_id = $(this).find(':selected').attr('data-id');
            $('input[name="category_id"]').val(cat_id);
            $.get('{{ url("/ajax-subcat") }}?cat_id='+ cat_id,function(data){
            //success data
             //console.log(data);
            var subcat =  $('#subcategory').html('<option>Select Sub category</option>');
            $.each(data,function(create,subcatObj){
                //alert(subcatObj.sub_category);
                var option = $('<option/>', {id:create, value:subcatObj});
                subcat.append('<option value ="'+subcatObj.sub_category+'">'+subcatObj.sub_category+'</option>');
                $('input[name="subcategory_id"]').val(subcatObj.id);
            });
            });
        });

    });
</script>
<script type="text/javascript">
    var country_id = {{ isset($country->id) ? $country->id : 101}};
    function getCountry(){
      $.ajax({
        type:"GET",
        url:"{{url('get-country-list')}}",
        success:function(res){               
         if(res){
             $('#country').empty();  
             if(country_id > 0){           
               $('#country').append('<option value="'+country_id+'">India</option>');     
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
                   // if(state_id >0){
                        $("#state").html('<option value="">Select State</option>');     
                    //}
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
                //if(city_id >0){
                    $("#city").append('<option value="">Select City</option>');     
                //}
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
