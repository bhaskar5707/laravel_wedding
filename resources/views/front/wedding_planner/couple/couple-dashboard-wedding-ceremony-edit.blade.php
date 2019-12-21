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
                                <h1>Weding Ceremony <small>Edit</small></h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> <a href="{{ url('/couple-dashboard-wedding-ceremony-list') }}" class="btn btn-default">Back</a> </div>
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
                                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/edit-wedding-ceremony/'.$weddingceremony->id) }}" name="weddingceremony" id="weddingceremony"  novalidate="novalidate">
                                        {{ csrf_field() }}
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="tilte" name="title" placeholder="Enter Title" value="{{ $weddingceremony->title }}">
                                        </div>
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Ender Date" value="{{ $weddingceremony->date }}">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="textarea" name="description" maxlength="255" placeholder="Enter Max 255 Characters..." id="description" style=" "> {{ $weddingceremony->description }} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="file" id="image" name="image" >
                                            </div>
                                            <img src="{{ asset('front/wedding_planner/image/couple/wedding_ceremony/small/').'/'.$weddingceremony->image }}" alt="{{ $weddingceremony->image }}" >
                                        </div>
                                        <input type="hidden" value="{{ $weddingceremony->image }}" name="oldImage">
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
