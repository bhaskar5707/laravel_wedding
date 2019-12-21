
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="modal" id="newGustRegister" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('guest.store') }}" name="frmToolLayer" id="frmGuestRegister">   
            {{ csrf_field() }} 
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3><strong>New guest</strong></h3>
			</div>
			<div class="modal-body">
				<div class="box">
					<div class="col-lg-3">
						<div class="image">
						@if(isset(Auth::user()->profile_img) && file_exists('front/wedding_planner/image/couple/'.Auth::user()->profile_img))
						<img src="{{ 'front/wedding_planner/image/couple/'.Auth::user()->profile_img }}" class="coupleimage1 img-circle img-responsive popupprofile" style="width: 100%;"/>
						@else
						<img src="{{ asset('front/wedding_planner/image/imgbride.jpg') }}" class="coupleimage1 img-circle" style="width: 100%;"/>
						@endif
					</div>
					<ul class="nav nav-tabs pca">
						<li class="active"><a id="first_step" data-toggle="pill" href="#personal_info">Personal Information</a></li>
						<li><a id="second_step" data-toggle="pill" href="#contact_info">Contact Information</a></li>
						<li><a id="third_step" data-toggle="pill" data-step-menu="3" href="#additional_info">Additional Guests</a></li>
					</ul>
					</div>
					<div class="col-lg-9">
						<div class="tab-content">
							<div id="personal_info" class="tab-pane fade in active personl-infrm">
								<h3>Personal information</h3>
								
						<div class="firstname col-lg-6">
							<div class="form-group @if($errors->has('firstname')) has-error @endif">      
								<label>First Name</label>
								<input type="text" name="firstname" class="form-control" placeholder="First Name">
								@if($errors->has('firstname')) <span class="error">{{$errors->first('firstname')}}</span> @endif

							</div>
						</div>
						<div class="lastname  col-lg-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="lastname" placeholder="Last Name" class="form-control">
								@if($errors->has('lastname')) <span class="error">{{$errors->first('lastname')}}</span> @endif

							</div>
						</div>
					
					    <div class="">                          
						    <div class="group col-lg-6">
							<div class="form-group">
								<label>Group</label>

								<select name="group_id"  class="form-control">
									<option value="">Select</option>				
									@foreach ($groups as $element)
									<option value="{{ $element->id }}"
										{{ (Input::old("group_id") == $element->id ? "selected":"") }}>{{ $element->name }}</option>
									@endforeach
								</select> 
								@if($errors->has('group_id')) <span class="error">{{$errors->first('group_id')}}</span> @endif
							</div>
						</div>                                            
						    <div class="menus col-lg-6">
							<div class="form-group">
								<label>Menu</label>
								<select name="menu_id"  class="form-control">
									<option value="">Choose Menu</option>
									@foreach ($menus as $element)
									<option value="{{ $element->id }}"
										{{ (Input::old("menu_id") == $element->id ? "selected":"") }}>{{ $element->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						</div>
						<div class="clearfix"></div>
						<div class="">
						    <div class="malefemale col-lg-5">
							<label>Gender</label><br>
							<label class="switch">
								<input type="radio" name="gender" value="male">                             
								<span class="slider round">Male</span>
							</label>
							<label class="switch">
								<input type="radio" name="gender" value="female">
								<span class="slider round">Female</span>
							</label> 
							@if($errors->has('gender')) <span class="error">{{$errors->first('gender')}}</span> @endif   
						</div>
						    <div class="baby col-lg-7">
							<label>Age</label><br>
							<label class="switch">
								<input type="radio" name="age" value="adult" id="age_adult">
								<span class="slider round">Adult</span>
							</label>
							<label class="switch">
								<input type="radio" name="age" value="adult" id="age_adult">
								<span class="slider round">Child</span>
							</label>
							<label class="switch">
								<input type="radio" name="age" value="infant" id="age_adult">
								<span class="slider round">Infant</span>
							</label>  
							@if($errors->has('age')) <span class="error">{{$errors->first('age')}}</span> @endif 
							<input type="hidden" name="telephone" value="0">
							<input type="hidden" name="invitation" value="0">
							<input type="hidden" name="attendence" value="Pending">
							<input type="hidden" name="active" value="1">
						</div>  
						</div>
					
							</div>
							<div id="contact_info" class="tab-pane fade personl-infrm">
								<h3>Contact Information</h3>
								
							<div class="col-lg-6">
								<div class="form-group">                                           
									<label>Email</label>
									<input type="text" name="email" placeholder="Email" class="form-control">
									@if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif                                            
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="text" name="mobile" placeholder="Mobile" class="form-control">
									@if($errors->has('mobile')) <span class="error">{{$errors->first('mobile')}}</span> @endif	
								</div>
							</div>
						
						<div class="">     
						<div class="menus col-lg-6">
								<div class="form-group">
									<label>State</label><br>
									<select name="state_id" id="state" class="form-control">
										
									</select>
								</div>
							</div> 
							<div class="group col-lg-6">
								<div class="form-group">
									<label>City/Town</label><br>                                         
									<select name="city_id" id="city" class="form-control">
										
									</select>
								</div>
							</div>                                            
							                                                                                       
						</div>
						 
							<div class="firstname col-lg-6">
								<div class="form-group">                                            
									<label>Address</label>
									<input type="text" name="address" placeholder="Address" class="form-control">

								</div>
							</div>
							<div class="lastname col-lg-6">
								<div class="form-group">
									<label>Postal Code</label>
									<input type="text" name="postalcode" placeholder="Postal Code" class="form-control">
									@if($errors->has('postalcode')) <span class="error">{{$errors->first('postalcode')}}</span> @endif

								</div>
							</div>
				</div>



				
				<div id="additional_info" class="tab-pane fade personl-infrm">
					<div class="companionsList">companion list</div>
					<h3>Add companion to this guest</h3>
					<!-- <div class="selectGuest"></div>
					<input type="text" placeholder="Search Name" name="guest_search_name" id="guest_search_name" autocomplete="off" onkeyup="searchguest(this.value);" value="" class="form-control">
                                 
                    <div class="showGuestData" title="Click here to add companions"></div> -->

                    @if (count($companions))
                            <ul class="guesttag">
                                @foreach ($companions as $key => $element)
                                
                                    <li>
                                        <span>{{$element->firstname}} {{$element->lastname}}</span>
                                        <span class="close" onclick="delete_compains({{$element->id}})">x</span>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
						<div class="firstlast">
							<div class="firstname col-lg-6">
								<div class="form-group">                                        
	                                <label>First Name</label>
	                                <input type="text" name="camp_first_name" placeholder="First Name" class="form-control">

	                            </div>
							</div>
							<div class="lastname col-lg-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" placeholder="Last name" name="camp_last_name" id="camp_last_name" size="25" maxlength="40" value="" class="form-control">
								</div>
							</div>
						</div>

						<div class="groupmenu">                                   
							<div class="menus col-lg-6">
								<div class="form-group">
									<label>Menus</label><br>
									<select name="comp_menu_id" class="form-control">
	                                    <option value="">Choose Menu</option>
	                                    @foreach ($menus as $element)
	                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
	                                    @endforeach
	                                </select>	
								</div>
							</div>
							<div class="menus col-lg-6">
								<div class="form-group">
									<label>Group</label><br>
									<select name="comp_group_id" class="form-control">
	                                    <option value="">Choose Group</option>
	                                    @foreach ($groups as $element)
	                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
	                                    @endforeach
	                                </select>	
								</div>
							</div>
							<div class="malefemale col-lg-5">
								<label>Gender</label><br>
								<label class="switch">
									<input type="radio" name="comp_gender" value="male">
									<span class="slider round">Male</span>
								</label>
								<label class="switch">
									<input type="radio" name="comp_gender" value="female">
									<span class="slider round">Female</span>
								</label>    
							</div>
								<div class="baby col-lg-7">
									<label>Age</label><br>
									<label class="switch">
										<input type="radio" name="comp_age" value="adult">
										<span class="slider round">Adult</span>
									</label>
									<label class="switch">
										<input type="radio" name="comp_age" value="child">
										<span class="slider round">Child</span>
									</label>
									<label class="switch">
										<input type="radio" name="comp_age" value="infant">
										<span class="slider round">Infant</span>
									</label>    
								</div>  
							                                                                                                
						</div>
						<div class="savecompinion">
							<button type="button" class="btn-save" onclick="store_companion();">Save Companion</button>
							<button type="button" class="btn-save">Cancel</button>
						</div>
				    </div>





									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">							
							{{-- <button type="button" id="btnNext" class="button-outline">Save and add another</button>
							<button type="button" class="button-outline">Add </button> --}} 
							<input type="submit" name="Add" value="Add" class="button-outline">
						</div>
					</form>
					
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>



{{-- groupCreate --}}

<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="groupCreate" style="display: none; z-index: 9999;" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
				<h3><strong>Add New Group</strong></h2>
			</div>
			<form method="POST" action="{{ route('guest.group.store') }}">   
			{{ csrf_field() }} 
			<div class="modal-body">
				<div class="item">               
					<div class="form-group personl-infrm">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter Your Group Name">
						@if($errors->has('name')) <span class="help-block">{{$errors->first('name')}}</span> @endif

					</div>
                    <input type="submit" name="AddGroup" class="btn-addmenu red" value="Add Group">
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

{{-- menuCreate --}}
<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="menuCreate" style="display: none; z-index: 9999;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
				<h2>Add New Menu</h2>
			</div>  
			<form method="POST" action="{{ route('guest.menu.store') }}">   
			{{ csrf_field() }} 
			<div class="modal-body">
				<div class="item">               
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter Your  Name">
						@if($errors->has('name')) <span class="help-block">{{$errors->first('name')}}</span> @endif

					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea placeholder="Menu details" class="form-control" name="description"></textarea>
						@if($errors->has('description')) <span class="help-block">{{$errors->first('description')}}</span> @endif

					</div>
                    <input type="submit" name="AddGroup" class="btn-addmenu red" value="Add Menu">
				</div>
			</div>
			</form>
	</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var country_id = 101;
$(function(){
    getState(country_id);
});
 function getState(countryid)
    {
        if(countryid){
            $.ajax({
               type:"GET",
               url:"{{url('get-state-list')}}?country_id="+countryid,
               success:function(res){             
                if(res){
                    $("#state").empty();
                   // if(state_id >0){
                        $("#state").html('<option value="">Select State</option>');     
                    //}
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#state").empty();
                }
               }
            });
        }else{
            $("#state").empty();
            $("#city").empty();
        } 
    }
    function getCity(stateid){
        if(stateid){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateid,
           success:function(res){               
            if(res){
                $("#city").empty();
                //if(city_id >0){
                    $("#city").append('<option value="">Select City</option>');     
                //}
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
        }else{
            $("#city").empty();
        }
    }
    $('#country').change(function(){
        var countryID = $(this).val();  
        getState(countryID);     
    });
    $('#state').on('change',function(){
        var stateID = $(this).val();
        getCity(stateID);        
    });
</script>

<script type="text/javascript">

	$(function(){

       /* $('.firstlast').hide();$('.groupmenu').hide();$('.savecompinion').hide(); $('.searchByName').hide();*/

        $('.open-compan').click(function(){
            $('.searchByName').show();
        });

        /*Select All checked box*/
        $('input[type="checkbox"][name="all"]').change(function () {
            var status = this.checked;
            $(".checkBoxClass").each(function(){
                this.checked = status;
            });
            checkedData();
        });
        $('.checkBoxClass').change(function(){
            if(this.checked == false){
                $('input[type="checkbox"][name="all"]')[0].checked = false;
            }
            if ($('.checkBoxClass:checked').length == $('.checkBoxClass').length ){ 
                //change "select all" checked status to true
                $('input[type="checkbox"][name="all"]')[0].checked = true; 
            }
            checkedData();
        });

    });
    

    function store_companion(name)
    {
        var guestid = "00";
        var user_id = "{{ Auth::user()->id }}";
        var camp_first_name = $('input[name="camp_first_name"]').val();
        var camp_last_name = $('input[name="camp_last_name"]').val();
        var comp_menu_id = $('select[name="comp_menu_id"]').val();
        var comp_group_id = $('select[name="comp_group_id"]').val();
        var comp_gender = $('input[name="comp_gender"]:checked').val();
        var comp_age = $('input[name="comp_age"]:checked').val();
        //alert([comp_menu_id,comp_group_id,comp_gender,comp_age]);
        $.ajax({
            type: "POST",
            url: "{{ url('/guest/add/companions/store') }}",
            data:{user_id:user_id,guestid:guestid,fname:camp_first_name,lname:camp_last_name,menu:comp_menu_id,group:comp_group_id,gender:comp_gender,age:comp_age,_token:'{{ csrf_token() }}'},        
            success:  function(result){
            //console.log(result);
            $('#newGustRegister').modal('show');    
            $('#third_step').click(); 
            $('guest_search_name').focus(); 
            }
        });   
    }

</script>
