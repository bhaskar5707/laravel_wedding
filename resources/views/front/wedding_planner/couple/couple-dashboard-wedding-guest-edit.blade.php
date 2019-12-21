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
                    <h1>Guest Group <small>Edit</small></h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-block"> <a href="{{ url('/couple-dashboard-wedding-group-list') }}" class="btn btn-default">Back</a> </div>
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
                        <div class="col-xs-3">
                            @include('front.wedding_planner.couple.couple-dashboard-wedding-website-sidebar')
                        </div>
                        
                        <div class="col-xs-9">

                        <div class="well-box">
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/edit-wedding-guest/'.$guests->id) }}" name="weddingceremony" id="weddingceremony"  novalidate="novalidate">
                            {{ csrf_field() }}
                            <!-- Text input-->
                            <div class="form-group">
                            <label for="email">Relation</label>
                            <input type="text" class="form-control" id="tilte" name="title" value="{{ $guests->relation }}">
                            @if($errors->has('title'))<span class="error">{!! $errors->first('title') !!}</span> @endif
                          </div>
                            <div class="form-group">
                            <label for="email">Facebook Link</label>
                            <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{ $guests->facebook_link }}">
                            @if($errors->has('facebook_link'))<span class="error">{!! $errors->first('facebook_link') !!}</span> @endif

                            </div>
                            <div class="form-group">
                            <label for="email">Twitter Link</label>
                            <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{ $guests->twitter_link }}">
                            @if($errors->has('twitter_link'))<span class="error">{!! $errors->first('twitter_link') !!}</span> @endif
                            </div>
                            <div class="form-group">
                            <label for="email">Instagran Link</label>
                            <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="{{ $guests->instagram_link }}">
                            @if($errors->has('instagram_link'))<span class="error">{!! $errors->first('instagram_link') !!}</span> @endif
                            </div>
                            <div class="control-group">
                                <label class="control-label">File upload input</label>
                                <div class="controls">
                                    <input type="file" id="image" name="image" >
                                </div>
                                <img src="{{ asset('image/couple/wedding_guest/small/').'/'.$guests->image }}" alt="{{ $guests->image }}" >
                            </div>
                            <input type="hidden" value="{{ $guests->image }}" name="oldImage">
                            <!-- Button -->
                            <div class="form-group">
                                 <button type="submit" class="btn btn-default">Save</button>
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
<script type="text/javascript">
$( "ul.coupleul li:nth-child(7)").addClass("active");
</script>
<script src="https://cdn.ckeditor.com/4.11.2/basic/ckeditor.js"></script>
<script>  
CKEDITOR.replace('description');    
</script>

@endsection 
