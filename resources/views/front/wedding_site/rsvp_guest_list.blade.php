
<?php $i=1;?>
@foreach($usersCount1 as $val)
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">

        <div class="panel-heading">
        <h4 class="panel-title">
            <a>{{ $val->firstname.' '.$val->lastname }}  </a>
            <a style="float: right;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" onclick="GetId({{ $val->id }})">Select </a>
        </h4>
        </div>

        


    </div>
  </div> 
 <?php $i++;?>
 @endforeach
<script type="text/javascript">
    function GetId(VAL){
        $('#username').val(VAL);
        $('.panel-body').show();
    }
</script>
<div class="panel-body" style="display: none;">

    <div id="show_invitation_form">
        <form id="invitation_form">
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="radio" name="invitation" value="2" required="" checked> Pending
                    <input type="radio" name="invitation" value="1"> I Accept
                    <input type="radio" name="invitation" value="3"> I Don't accept
                </div>
            </div>
            <input type="hidden" name="username" id="username" value="">
            <div class="col-lg-12">
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Leave a message for the couple" id="message" required=""></textarea>
                </div>
            </div>
            <div class="sendbtn sd-btm">
                 <!-- <input type="submit" class="btn btn-success send_invitation" value="RSVP"> -->
                 <button type="button" class="btn btn-success send_invitation">RSVP </button>
            </div>
        </form>
    </div>

</div>

 <script type="text/javascript">
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $(".send_invitation").click(function(e){
        e.preventDefault();

        var invitation = $("input[name='invitation']:checked").val();
        var username = $("input[name=username]").val();
        var message = $("#message").val();
        //alert(invitation);
        if(invitation == '' && message =='')
        {
           alert('Please input all field');
           return false;
        }else{

            $.ajax({

               type:'GET',

               url:'{{ url("/ajaxRequestInvitation") }}',

               //data:{name:name, password:password, email:email},
               data:{invitation:invitation , message:message, username:username},

               success:function(data){
                    //alert(data);
                    $('#confirm').text('Your confirmation has been sent successfully.');
                    $('#show_invitation_form').hide();
                    $('#guest_form').show(); 
                    $('#no_guest').hide();
                    $('#gusetInfo').hide();
               }

            });
        }

    });

</script>



