
<div class="livesearchguest"></div>
<div class="group tab_attendence">
    <div class="topbar">
        <div class="select">
            <label class="chkall"><input type="checkbox" name="all"/>Select all </label>
            <div class="btn-group moveoption"> 
              <button type="button" class="btn button allchked"><i class="fa fa-check-square"></i></button>
              <button type="button" class="btn button" data-toggle="modal" data-target="#movegroup"><i class="fa fa-exchange"></i> Move</button>
              <button type="button"  class="btn button" data-toggle="modal" data-target="#moveattendence"><i class="fa fa-check-circle"></i> Attendance</button>
              <button type="button"  class="btn button" data-toggle="modal" data-target="#movemenu"><i class="fa fa-graduation-cap"></i> Menu</button>
              <button type="button"  class="btn button" data-toggle="modal" data-target="#movetrush"><i class="fa fa-trash"> </i> Remove</button>
          </div>                              
      </div>
</div>

    <div class="adults">
    
        @foreach ($attendence as $value)                      
    
        <table class="table table-responsive">
            <tr>
                <th>{{ $value->name }}<span>({{ count($value->guests) }})</span></th>
                <th>ATTENDENCE</th>            
                <th>MENU</th>
                <th></th>
            </tr>
            @foreach ($value->guests as $guest)                                      
    
            <tr class="adult">
                <td class="name">
                    <label><input type="checkbox" name="select" class="checkBoxClass" value="{{$guest->id}}" /></label>     
                    <span>
                        @if (($guest->gender == 'male') && ($guest->age == 'adult'))
                        <img src="{{ asset('front/wedding_planner/image/male-adult.jpg') }}">
                        @elseif(($guest->gender == 'male') && ($guest->age == 'child'))
                        <img src="{{ asset('front/wedding_planner/image/male-child.jpg') }}">
                        @elseif(($guest->gender == 'male') && ($guest->age == 'infant'))
                        <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}">
                        @elseif(($guest->gender == 'female') && ($guest->age == 'adult'))
                        <img src="{{ asset('front/wedding_planner/image/female-adult.jpg') }}">
                        @elseif(($guest->gender == 'female') && ($guest->age == 'child'))
                        <img src="{{ asset('front/wedding_planner/image/female-child.jpg') }}">
                        @elseif(($guest->gender == 'female') && ($guest->age == 'infant'))
                        <img src="{{ asset('front/wedding_planner/image/infant.jpg') }}">
                        @endif
                    </span> 
                    <a href="{{ route('couple.guest.edit',$guest->id) }}">{{ $guest->firstname . ' ' . $guest->lastname }}</a>
                </td>
                <td class="attendance{{ $guest->id }}">
                    <span>
                        @if ($guest->attendence_id == 1)
                            <img src="{{ asset('front/wedding_planner/image/attendance/attending.png') }}"/>
                        @elseif($guest->attendence_id == 2)
                            <img src="{{ asset('front/wedding_planner/image/attendance/pending.png') }}"/>
                        @elseif($guest->attendence_id == 3)
                            <img src="{{ asset('front/wedding_planner/image/attendance/cancelled.png') }}"/>
                        @endif
                    </span>
                    <select name="attendence" onchange="return changeAttendence(this.value,{{ $guest->id }});">
                        <option value="">Select Attendence</option>
                        @foreach ($attendence as $element)
                        <option value="{{ $element->id }}"
                            @if ($guest->attendence_id == $element->id)
                            selected="selected"
                            @endif                                                        
                            >{{ $element->name }}
                        </option>
                        @endforeach
                    </select> 
                </td>
                
                <td class="menu{{ $guest->id }}">
                    <select name="menu_id" onchange="return changeMenu(this.value,{{ $guest->id }});">
                        <option value="">Choose Menu</option>
                        @foreach ($menus as $element)
                        <option value="{{ $element->id }}"
                            @if ($guest->menu_id == $element->id)
                            selected="selected"
                            @endif                                                        
                            >{{ $element->name }}
                        </option>
                        @endforeach
                    </select>                         
                </td>
                <td class="dropdown drop-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">... </a>
                    <ul class="dropdown-content dropdown-color">
                        <li>
                           <a href="{{ route('couple.guest.edit',$guest->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i>&ensp;Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('couple.guest.delete', [$guest->id]) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i>&ensp;Delete</button>
                            </form>
                        </li>
                    </ul>
                </td>                    
            </tr>
            @endforeach
        </table>
        @endforeach  
        </div>
    
</div>
<script>
        $(function(){
            //alert("JAYMANI");$('#group').hide();
            checkedData();
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
        /*$('.checkBoxClass').click(function () {
            checkedData();
        });*/

        function checkedData(){
            var favorite = [];
            var selectedData = [];
            $.each($("input[name='select']:checked"), function(){
                favorite.push($(this).val());
            });
            //selectedData = favorite.join(",");
            return favorite;
        } 
        
        $('#searchatten').on('keyup', function(){ //alert('MMM')
            
            var query = $(this).val();  
            fetch_guest_data(query);
            $('#searchgroup').val($(this).val());
        });

    </script>