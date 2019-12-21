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
                    <h1>Wedding Guest List <small>Summary</small></h1>
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
                        <div class="col-xs-3">
                            @include('front.wedding_planner.couple.couple-dashboard-wedding-website-sidebar')
                        </div>
                        
                        <div class="col-xs-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="album">
                                    <div class="photoalbum">
                                    <table class="table table-striped">
                                    <tbody>
                                    @foreach($groups as $key => $value)

                                        <tr>
                                            <th>{{ $value->name }}<span>({{ count($value->guests) }})</span></th>       
                                            <th></th>
                                        </tr>
                                                                      
                                        @foreach($value->guests as $key => $guest)
                                        <tr class="adult" id="searchData">
                                            <td class="name">
                                                <label><input type="checkbox" name="select" class="checkBoxClass" value="3"></label>     
                                                <span>
                                                @if(!empty($guest->image))
                                                <img src="{{ asset('front/wedding_planner/image/couple/wedding_guest/small/').'/'.$guest->image }}" alt="{{ $guest->firstname }}">
                                                @else
                                                <img src="http://localhost:8000/front/wedding_planner/image/male-adult.jpg">
                                                @endif

                                                </span> 
                                                <a href="{{ url('/edit-wedding-guest/'.$guest->id ) }}">
                                                    {{ $guest->firstname . " " . $guest->lastname }}
                                                    
                                                </a>
                                            </td> 
                                            <td>
                                            <a href="{{ url('/edit-wedding-guest/'.$guest->id ) }}" ><i class="fa fa-pencil" aria-hidden="true"></i>&ensp;Edit</a>
                                            </td>                  
                                        </tr>
                                        @endforeach

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
