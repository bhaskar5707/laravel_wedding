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
                    <div class="col-md-8 bg-white">
	                    <div class="pinside40 mb30">
                        @if (Session::has('error_message'))
                        <h2 style="color:red">{{ Session::get('error_message') }}</h2>
                        @endif

                        @if (Session::has('success_message'))
                        <h2 style="color:green">{{ Session::get('success_message') }}</h2>
                        @endif

                            <div class="business">
                                <div class="promotionfirst">
        	                    <form method="POST" action="{{url('vendor-other-promotion/update',$data->id)}}" enctype="multipart/form-data">
        	                        <h2>Special discount for Tayariyan.com couples </h2>
                                    <p>Offer a discount to couples who find you on tairaiyan.com and book your services. The discount will apply to the services they purchase.</p>
        	                        {{csrf_field()}}

        	                       
                                    
                                <div class="promotiondescription">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name of the Promotion </label>
                                            <input type="text" value="{{ $data->name }}" name="name" class="form-control" required/>
                                            @if ($errors->has('name')) <span class="error">{{ $errors->first('name')}}</span> @endif
                                            
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Type of Promotion</label>
                                                    <select name="type" type="dropdown" class="form-control" required/>
                                                    <option value=""> - - Select - - </option>
                                                    <option value="Discount" {{ ($data->type == 'Discount') ? 'selected' : '' }}>Discount</option>
                                                    <option value="Gift" {{ ($data->type == 'Gift') ? 'selected' : '' }}>Gift</option>
                                                    <option value="Offer" {{ ($data->type == 'Offer') ? 'selected' : '' }}>Offer</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Valid Till</label>
                                                <input type="text" value="{{ $data->expire_date }}" id="datepicker1" placeholder="dd-mm-yyyy" name="expire_date" class="form-control" />
                                                @if ($errors->has('expire_date')) <span class="error">{{ $errors->first('expire_date')}}</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description of the Promotion </label>
                                        
                                        <textarea type="textarea" placeholder="describe your promotion" id="description" name="description" cols="10" rows="5" class="form-control" required>{{ $data->description }}</textarea>
                                        @if ($errors->has('description')) <span class="error">{{ $errors->first('description')}}</span> @endif
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <label>Upload Image </label>
                                    @if ($errors->first('promo_image.*'))
                                    
                                    <span class="error">{{ $errors->first('promo_image.*') }}</span>

                                    @endif <div class="image">
                                        @if ($errors->has('promo_image')) <span class="error">{{ $errors->first('promo_image')}}</span> @endif
                                        <input type="hidden" name="promo_img_src" value="{!! $data->promo_image !!}">
                                        @if(!empty($data->promo_image))
                                        <img src="{{(file_exists(public_path('front/wedding_planner/image/vendors/'.$data->promo_image))) ? asset('image/vendors').'/'.$data->promo_image : asset('image/event-icon.jpg') }}" class="img-responsive" />
                                        @else
                                        <img src="{{ asset('front/wedding_planner/images/vendor-6.jpg') }}" class="img-responsive" />
                                        @endif
                                        <span class="btn btn-default btn-file">
                                          Update Image<input type="file" name="promo_image[]">
                                      </span>
                                      <br>
                                      <span class='label label-info' id="upload-file-info1"></span>
                                  </div>
                                  <p style="color: #969696; font-size: 13px;">*Collages, photos with watermarks, contact details and illustrations cannot be published</p>
                              </div>
                          </div>
                          <input type="submit" class="submit" value="Update Promotion">
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
    $( ".vendordashboardmenu ul li:nth-child(6)").addClass("active");
</script>

<style type="text/css">
.business.promotionfirst ul {
    float: left;
    list-style-type: none;
}
.business.promotionfirst ul li {
    float: left;
    background: #e1e1e1;
    margin: 0 20px 0 0;
    color: #898989;
    border-radius: 5px;
    border: 2px solid #898989;
}
.business.promotionfirst ul li label {
    margin-bottom: 0px;
}
.business.promotionfirst ul li [type=radio] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}
.business.promotionfirst {
    border: 1px solid #d9d9d9;
    border-radius: 3px;
    background: #fff;
    padding: 20px;
    width: 100%;
    float: left;
    margin-bottom: 20px;
}
</style>

@endsection 

