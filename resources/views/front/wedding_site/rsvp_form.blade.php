<section id="rsvp" class="wed_section_inner wed_image_bck wed_fixed" data-stellar-background-ratio="0.2" data-image="{!! asset('front/wedding_site/images/young_couple/dream.jpg') !!}">
<!-- over -->
<div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="color"></div>
<div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.2"></div>

<div class="container text-center wed_wht_txt wed_great_titles">
  <div class="row">
    <div class="col-md-8 col-md-pull-2 col-md-push-2 col-sm-12">
    <h2 class="wed_form_txt">Be our guest!</h2>
    <p class="wed_form_txt">Cupiditate neque libero porro nulla.</p>
      <form id="guest_form" class="wed_form">
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="First Name" name="fname" required>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input type="submit" class="btn btn_new wed_btn_margbot btn-submit" value="Send">
          </div>

        </div>
      </form>

      <h5 id="no_guest"></h5>
      <h5 id="gusetInfo"></h5>
      <h5 id="confirm"></h5>
      <div class="result"></div>

    </div>
    <!-- col end -->
  </div>
  <!-- row end -->
  </div>
  <!-- container end -->
</section>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){
        e.preventDefault();

        var fname = $("input[name=fname]").val();
        var lname = $("input[name=lname]").val();     
        $.ajax({
            url: '{{ url('ajaxRequest') }}',
            type: 'get',
            data:{name:fname,lname:lname},
            dataType: 'html',        
            success: function(json) 
            {
                $('.result').html(json);
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        }); 

    });

</script>