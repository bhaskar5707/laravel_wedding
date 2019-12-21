@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
<style>
    
/* 04-06-2019 */
.radio_ { position: relative; padding-left: 30px; margin-bottom: 12px; cursor: pointer; font-size: 22px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;
  user-select: none;}
.radio_ input { position: absolute; opacity: 0; cursor: pointer; }
.checkmark { position: absolute; top: 10px; left: 0; height: 18px;width: 18px; background-color: #eee; border-radius: 50%; }
.radio_:hover input ~ .checkmark { background-color: #ccc; }
.radio_ input:checked ~ .checkmark { background-color: #e72e77; }
.checkmark:after { content: ""; position: absolute; display: none; }
.radio_ input:checked ~ .checkmark:after { display: block; }
.radio_ .checkmark:after { top: 5px; left: 5px; width: 8px; height: 8px; border-radius: 50%; background: white; }
.checkbox_ { position: relative;padding-left: 30px; margin-bottom: 12px;cursor: pointer; font-size: 22px;-webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;user-select: none; }
.checkbox_ input { position: absolute; opacity: 0; cursor: pointer; height: 0; width: 0; }
.checkmark { position: absolute; top: 10px; left: 0; height: 18px; width: 18px; background-color: #eee; }
.checkbox_:hover input ~ .checkmark { background-color: #ccc; }
.checkbox_ input:checked ~ .checkmark { background-color: #e72e77; }
.checkbox_:after { content: ""; position: absolute; display: none; }
.checkbox_ input:checked ~ .checkmark:after { display: block; }
.checkbox_ .checkmark:after { left: 7px; top: 4px; width: 5px; height: 10px; border: solid white; border-width: 0 3px 3px 0; -webkit-transform: rotate(45deg); -ms-transform: rotate(45deg); transform: rotate(45deg);}
.vendorregistrationpage2 .form-group { width: 100%; float: left; padding: 0; }
.width-40 { width: 40% !important; float: left; }
.width-30 { width: 33% !important; float: left; }
</style>
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
                         
                          <h1 class="main-head-cntct">Frequently Asked Questions</h1>
                          <div class="cntct-grey" style="height: 105px;">
                              <div class="edt-left">
                                  <i class="fa fa-question-circle" aria-hidden="true"></i>
                              </div>
                              <div class="txt">
                                  <h3>Please provide details about your Wedding Music services.</h3>
                                  <p>Add answers to frequently asked questions about your business to give couples a better understanding of your offering before deciding whether to contact you.</p>
                              </div>
                          </div>
                          <form method="POST" action="{{ url('update_faq') }}" id="faq">
                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id;?>">
                            {!! csrf_field() !!}
                            <div class="form-group panel">
                                <label class="panel-heading">
                                    What is the starting price for your services?
                                </label>
                                <div class="panel-body">
                                    <input type="text" name="vendor_price" value="{{ isset(auth()->guard('vendor')->user()->price_range) ? auth()->guard('vendor')->user()->price_range : '' }}" class="form-control">
                                    @if($errors->has('vendor_price'))<label class="error">{{ $errors->first('vendor_price') }}</label>@endif
                                </div>
                            </div>
                            <div class="form-group panel" >
                            <?php $i=1; if(!empty($data1)){ foreach( $data1 as $val ){ ?>
                              <label class="panel-heading">
                                <?php echo $val->question; ?>
                              </label>
                              <?php if($val->field_name=="textarea"){ ?>
                              <div class="panel-body">
                                <textarea name="<?php echo $val->id; ?>">{{ isset($val->ans->faq_answer)? $val->ans->faq_answer : ''}} </textarea>
                              </div>
                              <?php }else if($val->field_name=="checkbox"){
                                    if(!empty($val->quantity)){
                                    $i=0;
                                    $quantity=explode(",",$val->label); //print_r($quantity);
                                    foreach($quantity as $val1)
                                      {
                                           $rdVal = isset($val->ans->faq_answer) ? json_decode($val->ans->faq_answer) : []; 
                                        ?>
                                      <div class="panel-body width-30 pd_">
                                          <label class="checkbox_">
                                              <input type="checkbox" @if(in_array(trim($val1),$rdVal)) checked  @endif value="{{ trim($val1) }}" name="{{ $val->id }}[]">
                                              <input type="hidden" name="quantity" id="quantity" value="<?php echo $val->quantity;?>"> <?php echo $quantity[$i]; ?>
                                              <span class="checkmark" style="border-radius: inherit;"></span>
                                          </label>
                                      </div>
                              <?php $i++; } } } else if($val->field_name=="radio"){
                                      if(!empty($val->quantity)){
                                      $quantity=explode(",",$val->label); 
                                      $i=0;
                                      $val2 = explode(',',$val->label); //dd($val);
                                      foreach($val2 as $val1){     
                                      ?>      
                                      <div class="panel-body width-30 ">
                                          <label class="radio_">
                                               <input type="radio" name="{{ $val->id }}" @if(isset($val->ans->faq_answer) && (trim($val1) == $val->ans->faq_answer))) checked  @endif value="{{ trim($val1) }}" id="radio" style="margin:17px 19px 10px 0px  !important;">
                                              <?php echo $quantity[$i]; ?>
                                              <span class="checkmark"></span>
                                          </label>
                                      </div>
                              <?php $i++; } } }else {?>

                                <div class="panel-body">

                                    <input type="<?php echo $val->field_name; ?>" value="{{ isset($val->ans->faq_answer) ? $val->ans->faq_answer : '' }}" placeholder="" name="<?php echo $val->id; ?>" class="form-control" />
                                </div>

                            <?php } $i++;} } ?>


                            <div class="form-group">
                                <input type="submit" name="submit" Value="SAVE" />
                            </div>

                            </div>
                            
                            
                          </form>

	                       
	                      </div>

                    </div>
                </div>
            </div>


        </div>
    </div>


<script>
    $( ".vendordashboardmenu ul li:nth-child(6)").addClass("active");
</script>


@endsection 

