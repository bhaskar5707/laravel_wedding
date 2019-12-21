@extends('front.wedding_planner_layout.mainlayout')
@section('content')
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

                    <div class="col-xs-12">
                        
                        @if(Session::has('flash_message_error'))  
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{!! session('flash_message_error') !!}</strong> 
                          </div>    
                        @endif 
                        @if(Session::has('flash_message_success'))  
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{!! session('flash_message_success') !!}</strong> 
                          </div>    
                        @endif

                        <form  action="{{ url('/check-mobile-otp') }}" name="add_category" id="add_category" method="post">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter your verification code"  style="width: 75%; float: left">
                          </div>
                          <button type="submit" class="btn" style="float: left; margin-left: 25px;">Submit</button>
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
<script type="text/javascript">
$( "ul.coupleul li:nth-child(7)").addClass("active");
</script>
<script src="https://cdn.ckeditor.com/4.11.2/basic/ckeditor.js"></script>
<script>  
CKEDITOR.replace('description');    
</script>




@endsection 
