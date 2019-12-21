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
            <div class="col-md-12">
                <div class="well-box">

                    
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Step 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Step 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Step 3</p>
                            </div>
                        </div>
                    </div>
                    
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 1</h3>
                                    
                                    <?php $i=1; foreach( $data1 as $val ){ ?>

                                        <div class="form-group panel panel-default">

                                            <label class="control-label"><?php echo "<b>*</b>"; ?>&nbsp;<?php echo $val->question; ?></label>
                                            <input type="hidden" name="quantity" id="quantity" value="<?php echo $val->quantity;?>">
                                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id;?>">

                                            <?php if($val->field_name=="textarea"){ ?>
                            
                                            <div class="panel-body">
                                                <textarea class="form-control"  name="<?php echo $val->id; ?>">{{ isset($val->faq_answers->faq_answer) ? $val->faq_answers->faq_answer : '' }}</textarea>
                                            </div>
                                            <?php  }else if($val->field_name=="checkbox"){
                                            
                                              if(!empty($val->quantity)){

                                                //echo $val->label;
                                                $i=0;
                                                $quantity=explode(",",$val->label); 
                                                foreach($quantity as $val1)
                                                {
                                                       $rdVal = isset($val->faq_answers->faq_answer) ? json_decode($val->faq_answers->faq_answer) : []; 
                                                      
                                                    ?>
                                                 
                                                    <div class="panel-body width-30 pd_">
                                                        <label class="checkbox_"><span><?php echo $quantity[$i]; ?></span>
                                                            <input  type="checkbox" @if(in_array(trim($val1),$rdVal)) checked  @endif value="{{ trim($val1) }}" name="{{ $val->id }}[]">
                                                            <input type="hidden" name="quantity" id="quantity" value="<?php echo $val->quantity;?>"> 
                                                            <span class="checkmark" style="border-radius: inherit;"></span>
                                                        </label>
                                                    </div>
                                                <?php $i++;
                                                }
                                                  
                                              }
                                               
                                            
                                            }else if($val->field_name=="radio"){
                                            
                                            if(!empty($val->quantity)){

                                              // echo $val->label;

                                              $quantity=explode(",",$val->label); 
                                              $i=0;
                                                   $val2 = explode(',',$val->label); //dd($val);
                                                   foreach($val2 as $val1){ 
                                                      
                                                    ?>
                                                        <div class="panel-body width-30 ">
                                                            <label class="radio_"><?php echo $quantity[$i]; ?>
                                                                <input type="radio"  name="{{ $val->id }}" @if(isset($val->faq_answers->faq_answer) && (trim($val1) == $val->faq_answers->faq_answer))) checked  @endif value="{{ trim($val1) }}" id="radio">
                                                               
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                 <?php    $i++;  
                                                  }
                                                  
                                              }
                                               
                                            
                                            } else { ?>
                                            <div class="form-group">
                                                <input type="<?php echo $val->field_name; ?>" value="{{isset($val->faq_answers->faq_answer) ? $faq_answers->faq_answer : '' }}"  placeholder="" name="<?php echo $val->id; ?>" class="form-control"/>
                                            </div>
                                            <?php } ?>
                                        </div>

                                    <?php $i=$i+1; } ?>

                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 2</h3>
                                    
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                <h3> Step 3</h3>
                                <form method="POST" action="{{ url('vendor/vendor-registration-next') }}">
                                {!! csrf_field() !!}
                                    <input type="hidden" value="<?php echo $id; ?>" name="vendor_id" />
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" value="" placeholder="Your First Name" name="fname" class="form-control" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" value="" placeholder="Your Last Name" name="lname" class="form-control" required="required"/>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" value="" placeholder="password eg:Abc@123" name="password" class="form-control" required="required"/>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Confirm Passwword</label>
                                    <input type="password" value="" placeholder="confirm password" name="cpassword" class="form-control" required="required"/>
                                    </div> 
                                    </div>
                                                                   
                                    <div class="accept">
                                        <label class="checkbox_"><span>I agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></span>
                                            <input type="checkbox" name="checkbox<?php echo $i;  ?>" checked="checked" required="required">
                                            <span class="checkmark" style="border-radius: inherit;"></span>
                                        </label>
                                        
                                    </div>
                                    <input type="submit" name="submit" class="pull-right" Value="SAVE" />
                                </form>
                                </div>
                                    <!-- <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button> -->
                                </div>
                            </div>
                        </div>
              
                



                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
form label {
    font-size: 16px;
    color: #3d3d3d;
    line-height: 2;
}
form .radio_ {
    width: 100%;
    float: left;
}

.pd_ {
    padding: 0 15px !important;
}
form .checkbox_ {
    width: 100%;
    float: left;
}

.form-group {
    width: 100%;
    float: left;
    padding: 0;
}
input[type=checkbox], input[type=radio] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">


.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

</style>
<script type="text/javascript">
    $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

@endsection 
