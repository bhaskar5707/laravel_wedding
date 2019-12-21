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

                        

                        <div class="business">
                        <div class="promotionfirst">
	                        <form method="POST" action="{{url('vendor-other-promotion')}}" enctype="multipart/form-data">
    	                        <h2>Special discount for wedding.com couples </h2>
                                <p>Offer a discount to couples who find you on tairaiyan.com and book your services. The discount will apply to the services they purchase.</p>
    	                        {{csrf_field()}}
	                        
                                <div class="promotiondescription">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name of the Promotion </label>
                                            <input type="text" value="" name="name" class="form-control" required/>
                                            @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name')}}</span> @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('type')) has-error @endif">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Type of Promotion</label>
                                                    <select name="type" type="dropdown" class="form-control" required/>
                                                    <option value=""> - - Select - - </option>
                                                    <option value="Discount">Discount</option>
                                                    <option value="Gift">Gift</option>
                                                    <option value="Offer">Offer</option>
                                                    </select>
                                                    @if ($errors->has('type')) <span class="help-block">{{ $errors->first('type')}}</span> @endif
                                                </div>
                                                <div class="col-md-6 @if ($errors->has('description')) has-error @endif">
                                                    <label>Valid Till</label>
                                                    <input type="text" value="" id="datepicker1" placeholder="dd/mm/yyyy" name="expire_date" class="form-control"  autocomplete="off"/>
                                                    @if ($errors->has('expire_date')) <span class="help-block">{{ $errors->first('expire_date')}}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                                            <label>Description of the Promotion </label>
                                            <textarea type="textarea" placeholder="describe your promotion" name="description" cols="10" rows="5" class="form-control" required></textarea>
                                            @if ($errors->has('description')) <span class="text-danger">{{ $errors->first('description')}}</span> @endif
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <label>Upload Image </label>
                                        @if ($errors->first('promo_image.*'))
                                            <span class="text-danger">{{ $errors->first('promo_image.*') }}</span>
                                        @endif 
                                        <div class="image">

                                            <img src="front/wedding_planner/image/event-icon.jpg" class="img-responsive" id="output"/>
                                            <span class="btn btn-default btn-file">
                                                  Add Image<input type="file" onchange="loadFile(event)" name="promo_image[]" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange1='$("#upload-file-info1").html($(this).val());'>
                                                </span>
                                            <br>
                                            <span class='label label-info' id="upload-file-info1"></span>
                                            <script>
                                              var loadFile = function(event) {
                                                var reader = new FileReader();
                                                reader.onload = function(){
                                                  var output = document.getElementById('output');
                                                  output.src = reader.result;
                                                };
                                                reader.readAsDataURL(event.target.files[0]);
                                              };
                                            </script>
                                        </div>
                                        <p style="color: #969696; font-size: 13px;">*Collages, photos with watermarks, contact details and illustrations cannot be published</p>
                                    </div>
                                </div>
                                <input type="submit" class="submit" value="Post Promotion">
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


<script>
    $(document).ready(function() {
       
        $(function() { 
            $('#datepicker1').datepicker({
                format: 'dd-mm-yyyy',
                minDate: 0,
            });
        });
    });
</script>

<script src="https://cdn.ckeditor.com/4.11.2/basic/ckeditor.js"></script>
<script>
$( ".vendordashboardmenu ul li:nth-child(2)").addClass("active");
CKEDITOR.editorConfig = function (config) {
        config.language = 'es';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = true;
    };
    CKEDITOR.replace('description');
$(function(){
    $("form").validate({
    event: 'blur',
    rules: { 
      description: {
        required: function(textarea) {
          CKEDITOR.instances[textarea.id].updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
          return editorcontent.length === 0;
        }
      }
    }
  });    
});
</script>


@endsection 

