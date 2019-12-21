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
	                        <form method="POST" action="{{url('vendor-promotion-perc')}}" enctype="multipart/form-data">
	                        <h2>Special discount for Tayariyan.com couples </h2>
                            <p>Offer a discount to couples who find you on tairaiyan.com and book your services. The discount will apply to the services they purchase.</p>
	                        {{csrf_field()}}
	                        <ul>

                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="3%" @if($promo) @if($promo->base_promotion_perc == '3%') {{ 'checked' }} @endif @endif>
                                        <img src="http://placehold.it/60x30/0bf/fff&text=3%">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="5%" @if($promo) @if($promo->base_promotion_perc == '5%') {{ 'checked' }} @endif @endif >
                                        <img src="http://placehold.it/60x30/0bf/fff&text=5%">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="10%" @if($promo) @if($promo->base_promotion_perc == '10%') {{ 'checked' }} @endif @endif >
                                        <img src="http://placehold.it/60x30/0bf/fff&text=10%">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="15%" @if($promo) @if($promo->base_promotion_perc == '15%') {{ 'checked' }} @endif @endif >
                                        <img src="http://placehold.it/60x30/0bf/fff&text=15%">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="20%" @if($promo) @if($promo->base_promotion_perc == '20%') {{ 'checked' }} @endif @endif >
                                        <img src="http://placehold.it/60x30/0bf/fff&text=20%">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="promotion_perc" value="30%" @if($promo) @if($promo->base_promotion_perc == '30%') {{ 'checked' }} @endif @endif >
                                        <img src="http://placehold.it/60x30/0bf/fff&text=30%">
                                    </label>
                                </li>

                            </ul>
                            <div class="col-md-12">
                                <label style="margin-left: -12px;">
                                    <input type="radio" value="no-offer" name="promotion_perc" class="test" @if($promo) @if($promo->base_promotion_perc == 'no-offer') {{ 'checked' }} @endif @endif />&ensp;Currently don't have any offers.
                                </label>
                            </div>
                            <h3><input type="submit" value="Save Discount" style="margin: 0;"></h3> 

	                        </form>
	                    </div>
                        </div>

                        <h2 class="heding-desgn" style="text-align: left">Promotion List</h2>
                        <div class="promotioninner">
                            <h2 style="text-align: left">Post Your first Promotion</h2>
                            <p>You will get more visibility in the directory and more chances to get more customers</p>
                            <h3><a href={{ url('vendor-add-promotion') }}>Add Promotion</a></h3>
                        </div>

                        <div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#Active">Active</a></li>
                                <li><a data-toggle="tab" href="#Pending">Pending</a></li>
                                <li><a data-toggle="tab" href="#Expired">Expired</a></li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div id="Active" class="tab-pane fade in active">
                                <p></p>
                                @foreach ($otherpromo_active as $promotion)
                                <div class="col-md-4 vendor-box">
                                    @if(!empty($promotion->promo_image))
                                    <div class="vendor-image">
                                        <a href="#"><img src="{{ asset ('front/wedding_planner/image/vendors/').'/'.$promotion->promo_image }}" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @else
                                    <div class="vendor-image">
                                        <a href="#"><img src="front/wedding_planner/images/vendor-6.jpg" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @endif
                                    
                                    <div class="vendor-detail">
                                        <div class="caption">
                                            <span>{{ ucwords($promotion->type) }}</span>
                                            <h5>{{ ucwords($promotion->name) }}</h5>
                                            <span>End at <span>{{ date('d M Y',strtotime($promotion->expire_date)) }}</span></span>
                                            <div class="rating "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>

                                            <form>
                                                <a href="{{ url('vendor/promotion/edit',$promotion->id) }}"  class="pull-left"><i class="fa fa-edit" aria-hidden="true"> Edit</i></a>
                                                <a href="{{ url('vendor/promotion/delete',$promotion->id) }}"  class="pull-right"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                            </div>
                            <div id="Pending" class="tab-pane fade ">
                              
                                <p></p>
                                @foreach ($otherpromo_pending as $promotion)
                                <div class="col-md-4 vendor-box">
                                    @if(!empty($promotion->promo_image))
                                    <div class="vendor-image">
                                        <a href="#"><img src="{{ asset ('front/wedding_planner/image/vendors/').'/'.$promotion->promo_image }}" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @else
                                    <div class="vendor-image">
                                        <a href="#"><img src="front/wedding_planner/images/vendor-6.jpg" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @endif
                                    
                                    <div class="vendor-detail">
                                        <div class="caption">
                                            <span>{{ ucwords($promotion->type) }}</span>
                                            <h5>{{ ucwords($promotion->name) }}</h5>
                                            <span>End at <span>{{ date('d M Y',strtotime($promotion->expire_date)) }}</span></span>
                                            <div class="rating "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>

                                            <form>
                                                <a href="{{ url('vendor/promotion/edit',$promotion->id) }}"  class="pull-left"><i class="fa fa-edit" aria-hidden="true"> Edit</i></a>
                                                <a href="{{ url('vendor/promotion/delete',$promotion->id) }}"  class="pull-right"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                             
                            </div>
                            <div id="Expired" class="tab-pane fade">
                                <p></p>
                                @foreach ($otherpromo_expired as $promotion)
                                <div class="col-md-4 vendor-box">
                                    @if(!empty($promotion->promo_image))
                                    <div class="vendor-image">
                                        <a href="#"><img src="{{ asset ('front/wedding_planner/image/vendors/').'/'.$promotion->promo_image }}" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @else
                                    <div class="vendor-image">
                                        <a href="#"><img src="front/wedding_planner/images/vendor-6.jpg" alt="wedding venue" class="img-responsive"></a>
                                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                                    </div>
                                    @endif
                                    
                                    <div class="vendor-detail">
                                        <div class="caption">
                                            <span>{{ ucwords($promotion->type) }}</span>
                                            <h5>{{ ucwords($promotion->name) }}</h5>
                                            <span>End at <span>{{ date('d M Y',strtotime($promotion->expire_date)) }}</span></span>
                                            <div class="rating "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>

                                            <form>
                                                <a href="{{ url('vendor/promotion/edit',$promotion->id) }}"  class="pull-left"><i class="fa fa-edit" aria-hidden="true"> Edit</i></a>
                                                <a href="{{ url('vendor/promotion/delete',$promotion->id) }}"  class="pull-right"><i class="fa fa-trash" aria-hidden="true"> Delete</i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


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

