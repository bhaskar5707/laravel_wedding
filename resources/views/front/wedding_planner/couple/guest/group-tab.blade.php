<div class="group tab_group">

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

        @foreach ($groups as $value)                      

        <table class="table table-responsive">
            <tr>
                <th>{{ $value->name }}<span>({{ count($value->guests) }})</span></th>
                <th>ATTENDENCE</th>            
                <th>MENU</th>
                <th class="dropdown drop-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">... </a>
                    
                       <a href="#editGroup" data-toggle="modal" data-target="#editGroup" data-id="{{ $value->id }}" data-title="{{ $value->name }}"><i class="fa fa-pencil" aria-hidden="true"></i>&ensp;Rename </a>
                  
                    @if(!$value->admin_id)
                    
                        <form method="post" action="{{ route('guest.group.delete', [$value->id]) }}" onsubmit="return confirm('Are you sure want to delete this group?')">
                        {{ csrf_field() }}
                        
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i>&ensp;Remove</button>
                        </form>
                        @endif
                    </ul>
                </th> 
            </tr>


            @foreach ($value->guests as $guest)                                      
            
            <tr class="adult" id="searchData">
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
                 
                       
                    <a href="{{ route('couple.guest.edit',$guest->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i>&ensp;Edit</a>
                     
                      
                    <form action="{{ route('couple.guest.delete', [$guest->id]) }}" method="post" onsubmit="return confirm('Are you sure?')">
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i>&ensp;Delete</button>
                    </form>
                      
                    
                </td>                    
            </tr>
            @endforeach


        </table>
        @endforeach  


        <table class="table table-responsive">
            <tr>
                <th>Unasigned Group<span>({{ count($ungroups) }})</span></th>
                <th>ATTENDENCE</th>            
                <th>MENU</th>
                <th></th>
            </tr>
            @foreach ($ungroups as $guest)
            <tr class="adult">   
                <td class="name">
                    <label><input type="checkbox" name="select" class="checkBoxClass" value="{{$guest->id}}"/></label>     
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
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}"
                            @if ($guest->menu_id == $menu->id)
                            selected="selected"
                            @endif                                                        
                            >{{ $menu->name }}</option>
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

    </div>

</div>

<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="editGroup" style="display: none; z-index: 9999;" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
                <h3><strong>Update Group</strong></h2>
            </div>  
            <form method="POST" action="{{ route('guest.group.update') }}">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="item">               
                    <div class="form-group personl-infrm">
                        <label>Name</label>
                        <input type="text" name="groupname" placeholder="Enter Your Group Name">
                        <input type="hidden" name="id">
                        @if($errors->has('groupname')) <span class="error">{{$errors->first('groupname')}}</span> @endif

                    </div>
                    <input type="submit" name="" value="Update Group" class="btn-addmenu red">

                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

$(function(){
        $('#editGroup').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).attr('data-id');
            var title = $(e.relatedTarget).attr('data-title');
            $(this).find('input[name="id"]').val(id);
            $(this).find('input[name="groupname"]').val(title);
        }); 
        @if($errors->has('groupname'))
            $('#editGroup').modal('show');
        @endif  
       

        //alert("JAYMANI");$('#group').hide();

    });

$('input[type="checkbox"][name="all"]').change(function () {
        var status = this.checked;
        $(".checkBoxClass").each(function(){
            this.checked = status;
        });
        //checkedData();
    });
</script>
