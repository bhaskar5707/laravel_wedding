@extends('front.wedding_planner_layout.mainlayout')
@section('content')
@include('front.wedding_planner.vendor.vendor-header')
    <div class="main-container">
        <div class="container">
            

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                    	<div class="bg-white pinside40 mb30">
                        <ul>
		                    <li ><a class="item" href={{url('vendor-dashboard-my-account-settings')}}>Settings </a></li>
		                    <li class="active"><a class="item" href={{ url('/vendor-account-collaboration') }}>Collaborator Medal</a></li>
		                </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
	                    <div class="bg-white pinside40 mb30">

                        
			            	<div class="collaborator">
                                <h1 class="main-head-cntct">Collaborator Medal</h1>
                                <div class="cntct-grey" style="width: 100%; margin-left: 0; height: 106px;">
                                    <div class="edt-left">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </div>
                                    <div class="txt">
                                        <h3>We are proud to help you grow your business..</h3>
                                        <p>Choose the size which best fits your website and paste the HTML of your tayariyaan.com collaborator stamp. Thank you very much for collaborating with us!</p>
                                    </div>
                                </div>
                                <div class="htmlcode">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item">
                                                <img src="front/wedding_planner/images/logo.png" class="img-responsive" width="154" style="height:45px;     margin-bottom: 29px;" />
                                                <p style="    margin-left: 120px;">154 x 45</p>
                                                <a href="#" class="html" data-toggle="modal" data-target="#myModal">Copy HTML Code</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item">
                                                <img src="front/wedding_planner/images/logo.png" class="img-responsive" width="250" style="height:73px;"/>
                                                <p style="    margin-left: 120px;">250 x 73</p>
                                                <a href="#" class="html" data-toggle="modal" data-target="#myModal1">Copy HTML Code</a>
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
    
.collaborator .htmlcode .item {
    border: 1px solid #ccc;
    padding: 50px 0;
    border-radius: 3px;
}
.collaborator .htmlcode .item img {
    margin: 0 auto;
    background: #e72e77;
}
.collaborator .htmlcode .item a {
    color: #e72e77;
    border: 1px solid #e72e77;
    font-weight: 400;
    padding: 8px 12px;
    margin-left: 72px;
}
</style>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Copy and paste this code on your website</h4>
      </div>
      <div class="modal-body">
            <xmp><a href="{{ url('/') }}"><img alt='wedding' title='Wedding' src="{{ asset('/image/logo.png') }}" style="height:45px width:154px" /></a></xmp>
      </div>      
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Copy and paste this code on your website</h4>
      </div>
      <div class="modal-body">
        <xmp><a href="{{ url('/') }}"><img alt='wedding' title='Wedding' src="{{ asset('/image/logo.png') }}" style="height:73px width:250px" /></a></xmp>
      </div>      
    </div>

  </div>
</div>
<script>
    $( ".vendordashboardmenu ul li:nth-child(6)").addClass("active");
</script>


@endsection 

