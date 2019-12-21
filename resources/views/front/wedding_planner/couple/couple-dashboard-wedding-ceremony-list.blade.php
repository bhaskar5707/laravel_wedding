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
            <h1> Wedding Ceremon <small>Summary</small></h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="action-block"> <a href="{{ url('/couple-dashboard-wedding-ceremony') }}" class="btn btn-default">Add Wedding Ceremon</a> </div>
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
                    <div class="tab-content">
                        <div class="tab-pane active" id="album">
                            <div class="photoalbum">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($weddingCeremony as $val)
                                <tr>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ date('d M Y', strtotime($val->date)) }}</td>
                                    <td><img src="{{ asset('front/wedding_planner/image/couple/wedding_ceremony/small/').'/'.$val->image }}" alt="{{ $val->title }}" alt="wqeqw"></td>
                                    <td style="width: 25%;">
                                        <a href="{{ url('/delete-wedding-ceremony/'.$val->id ) }}" class="btn btn-dan" style="float: right;"><i class="fa fa-trash" aria-hidden="true"></i>&ensp;Delete</a>
                                        <a href="{{ url('/edit-wedding-ceremony/'.$val->id ) }}" class="btn btn-snd" style="float: right;"><i class="fa fa-pencil" aria-hidden="true"></i>&ensp;Edit</a>  
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                                    
                                    
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
</div>
</div>


@endsection 
