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
                                <h1 contentEditable="true">My Guestlist <small>Your Summary</small></h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> <a href="#" class="btn btn-default">BUtton</a> </div>
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
                                


                            <div class="coupledashboardalbum">
                                <div class="album">
                                    <div class="container">
                                        <div class="row couple-website">
                                            <h2>Choose Your Website Theme</h2>
                                            <p>The Following website design are for your wedding websites designs, you can select one to go with for now and can change from your dashboard anytime.</p>
                                            <p><a href="{{ url('web/'.$websitelink) }}" target="_blank">Preview Your Wedding Website</p>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story-list/1') }}">
                                                            <div class="text">Select</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story-list/2') }}">
                                                            <div class="text">Select</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story-list/3') }}">
                                                            <div class="text">Select</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story-list/4') }}">
                                                            <div class="text">Select</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story/5') }}">
                                                            <div class="text">Select</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="website-port">
                                                    <img src="image/couple/website2.png" class="img-responsive"/>
                                                    <div class="middle">
                                                        <a href="{{ url('/couple-dashboard-our-story/6') }}">
                                                            <div class="text">Select</div>
                                                        </a>
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
</div>

<style type="text/css">
.website-port
{
    margin-bottom: 30px;
    position: relative;
}
.website-port .text 
{
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    padding: 7px 32px;
}
.website-port .middle 
{
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
}
</style>

@endsection 
