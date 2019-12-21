{{-- Modal Popup start--}}
{{-- Group Modal Popup --}}
<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="movegroup" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
                <h2 class="text-center">Move to group</h2>
            </div>              
            <div class="modal-body">
                <div class="item">               
                    <div class="form-group">
                        <label>Select a group: </label>
                        <ul class="list-style-none">
                            @foreach ($groups as $group)
                            <li class="" style="list-style-type: none;">
                                <input id="optgroup{{$group->id}}" type="radio" name="group" value="{{$group->id}}" class="radio-but" data-name="{{$group->name}}">
                                <label for="optgroup{{$group->id}}">&ensp;{{$group->name}}</label>
                            </li>                            
                            @endforeach
                        </ul>                        
                    </div>
                    <button onclick="changeBulkGroup()" class="btn-addmenu red">Move</button>
                </div>
            </div>            
        </div>
    </div>
</div>

{{-- Menu Modal Popup --}}
<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="movemenu" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
                <h2 class="text-center">Move to menu</h2>
            </div>              
            <div class="modal-body">
                <div class="item">               
                    <div class="form-group">
                        <label>Select a Menu: </label>
                        <ul class="list-style-none">
                            @foreach ($menus as $menu)
                            <li style="list-style-type: none;">
                                <input id="optmenu{{$menu->id}}" type="radio" name="menu" value="{{$menu->id}}" class="f" data-name="{{$menu->name}}">
                                <label for="optmenu{{$menu->id}}">{{$menu->name}}</label>
                            </li>                            
                            @endforeach
                        </ul>                        
                    </div>
                    <button onclick="changeBulkMenu()" class="btn-addmenu red">Move</button>
                </div>
            </div>            
        </div>
    </div>
</div>

{{-- Attendence Modal Popup --}}
<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="moveattendence" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
                <h2 class="text-center">Move to attendence</h2>
            </div>              
            <div class="modal-body">
                <div class="item">               
                    <div class="form-group">
                        <label>Select a attendence: </label>
                        <ul class="list-style-none">   
                        <li style="list-style-type: none;"><input id="opt_1" type="radio" name="attendence" value="1" ><label for="optattendence1">Attending</label></li>                          
                        <li style="list-style-type: none;"><input id="opt_2" type="radio" name="attendence" value="2" ><label for="optattendence1">Pending</label></li>                          
                        <li style="list-style-type: none;"><input id="opt_3" type="radio" name="attendence" value="3" ><label for="optattendence1">Cancelled</label></li>
                        </ul>                    
                    </div>
                    <button onclick="changeBulkAttendence()" class="btn-addmenu red">Move</button>
                </div>
            </div>            
        </div>
    </div>
</div>

{{-- Delete Modal Popup --}}
<div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="tool-modal-header" aria-hidden="false"  id="movetrush" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon icon-close"></i></button>
                <h2 class="text-center">Remove guests</h2>
            </div>              
            <div class="modal-body">
                <div class="item">               
                    <div class="form-group">
                        <p>Do you want to permanently remove these guests from your account?</p>                    
                    </div>
                    <button onclick="deleteBulkGuest()" class="btn-addmenu red">Move</button>
                </div>
            </div>            
        </div>
    </div>
</div>
{{-- Modal Popup End--}}