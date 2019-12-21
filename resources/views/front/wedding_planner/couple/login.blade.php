@extends('front.wedding_planner_layout.mainlayout')
@section('content')
<div class="tp-page-head">
<!-- page header -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="page-header text-center">
                <div class="icon-circle">
                    <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                </div>
                <h1>Welcome back to your account</h1>
                <p>We're happy to have you back.</p>
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
                <li class="active">Login Page</li>
            </ol>
        </div>
    </div>
</div>
</div>
<div class="main-container">
<div class="container">
    <div class="row">
        <div class="col-md-6 st-tabs">
           
            
        </div>
        <div class="col-md-6 st-tabs">
            <!-- Nav tabs -->
            <div class="well-box">
                <h3>Couple Login</h3>
                @if (Session::has('success_message'))
                    <h6 style="color:green">{{ Session::get('success_message') }}</h6>
                         @endif
                @if (Session::has('error_message'))
                    <h6 style="color:red">{{ Session::get('error_message') }}</h6>
                         @endif
                @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session::get('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ url('couple-login') }}">
                    {{ csrf_field() }}
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                        <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" >
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="password">Password<span class="required">*</span></label>
                        <input id="password" name="password" type="text" placeholder="Password" class="form-control input-md" >
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <input type="submit" name="submit" Value="LOG IN"  class="btn btn-primary" /> 
                        <a href="#" class="pull-right"> <small>Forgot Password ?</small></a>
                    </div>
                </form>
            </div>
            <div class="well-box social-login"> <a href="#" class="btn facebook-btn"><i class="fa fa-facebook-square"></i>Facebook</a> <a href="#" class="btn twitter-btn"><i class="fa fa-twitter-square"></i>Twitter</a> <a href="#" class="btn google-btn"><i class="fa fa-google-plus-square"></i>Google+</a> </div>
        </div>
    </div>
</div>
@endsection 
