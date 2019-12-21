<script type="text/javascript">
    
$(function(){  
    showgroup();
    
    @if (Session::has('type') && (Session::get('type') == 'group'))
    $('#showgroup').click();
    @endif
    @if (Session::has('type') && (Session::get('type') == 'menu'))
    $('#showmenu').click();
    @endif
    @if (Session::has('type') && (Session::get('type') == 'attendance'))
    $('#showattendance').click();
    @endif
    @if ($errors->has('firstname') || $errors->has('group_id') || $errors->has('gender') || $errors->has('age'))
    $('#newGustRegister').modal('show');
    $('#first_step').click();
    @elseif ($errors->has('email') || $errors->has('mobile') || $errors->has('postalcode'))
    $('#newGustRegister').modal('show');
    $('#second_step').click();
    @endif   
});
function showgroup()
{ 
    $('#groupregis').show();
    $('#menuregis').hide();  
    var userid = {{Auth::user()->id }};
    $.ajax({
        url: '{{ url('couple-guests-showgroup') }}',
        type: 'get',
        data:{userid:userid},
        dataType: 'html',        
        success: function(json) {
            $('#group').html(json);
        },
        error: function(data) {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });
}
function showmenu(){ 
    $('#groupregis').hide();
    $('#menuregis').show(); 
    var userid = {{Auth::user()->id }};
    $.ajax({
        url: '{{ url('couple-guests-showmenu') }}',
        type: 'get',
        data:{userid:userid},
        dataType: 'html',        
        success: function(json) {
            $('#menus').html(json);
        },
        error: function(data) {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });                
}
function showattendance(){
    var userid = {{Auth::user()->id }};     
    $.ajax({
        url: '{{ url('couple-guests-showattendance') }}',
        type: 'get',
        data:{userid:userid},
        dataType: 'html',        
        success: function(json) {
            $('#attendance').html(json);
        },
        error: function(data) {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });                
}


function changeBulkGroup(){
    var groupid  = $('input[type="radio"][name="group"]:checked');
    var groupValue  = groupid.data('name');
    var confirmed =  confirm("Are you sure want to move into "+groupValue+" ?");
    var column = 'group_id';
    if(confirmed){
        changeBulk(groupid.val(),column);
        $('#movegroup').modal('hide'); 
    }        
}

 function changeBulkMenu(){
    var menuid  = $('input[type="radio"][name="menu"]:checked');
    var menuValue  = menuid.data('name');
    var confirmed =  confirm("Are you sure want to move into "+menuValue+" ?");
    var column = 'menu_id';
    if(confirmed){
        changeBulk(menuid.val(),column);
        $('#movemenu').modal('hide');  
    }        
}

function changeBulkAttendence(){
    var menuValue  = $('input[type="radio"][name="attendence"]:checked').val();       
    var confirmed =  confirm("Are you sure want to move into "+menuValue+" ?");
    var column = 'attendence_id';
    if(confirmed){
        changeBulk(menuValue,column);
        $('#moveattendence').modal('hide');  
    }        
}
function deleteBulkGuest(){
    var confirmed = confirm("Are you sure want to delete selected guest?");        
    if(confirmed){
        deleteBulk();
        $('#movetrush').modal('hide');
    }        
}

function changeBulk(value,column){  
    var idArray = checkedData();      
    $.ajax({
        url: "{{ url('/changeBulkStatus') }}",
        data:{id:idArray,value:value,column:column,_token:'{{ csrf_token() }}'},
        type: 'POST',
        success:function(data){
            console.log(data);
            showgroup();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function checkedData(){
    var favorite = [];
    var selectedData = [];
    $.each($("input[name='select']:checked"), function(){
        favorite.push($(this).val());
    });
    //selectedData = favorite.join(",");
    return favorite;
} 

function deleteBulk(){  
    var idArray = checkedData();        
    $.ajax({
        url: "{{ url('/deleteBulkGuest') }}",
        data:{id:idArray,_token:'{{ csrf_token() }}'},
        type: 'POST',
        success:function(data){
            console.log(data);
            showgroup();
            showmenu();
            showattendance();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}



function changeAttendence(value,id){            
    $.ajax({
        url: "{{ url('/changeAttendence') }}",
        data:{id:id,value:value,_token:'{{ csrf_token() }}'},
        type: 'POST',
        success:function(data)
        {
            //alert(data);
            location.reload();
            console.log(data);
            $('.attendance'+id+' img').attr("src",data['src']);
        },
        beforeSend: function(){
        //alert('here we go...');
    },
    error: function (data) {
        console.log('Error:', data);
    }
});
}

function changeMenu(value,id){            
    $.ajax({
        url: "{{ url('/changeMenu') }}",
        data:{userid:id,menuid:value,_token:'{{ csrf_token() }}'},
        type: 'POST',
        success:function(data){
            location.reload();
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function changeGroup(value,id){            
    $.ajax({
        url: "{{ url('/changeGroup') }}",
        data:{id:id,value:value,_token:'{{ csrf_token() }}'},
        type: 'POST',
        success:function(data){
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

</script>