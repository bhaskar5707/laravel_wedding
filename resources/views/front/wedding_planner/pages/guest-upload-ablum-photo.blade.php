@extends('front.wedding_planner_layout.mainlayout')
@section('content')

<style>
    
    img#output {
    margin: 10px 0px;
    max-height: 100px;
}
    .topmenu{ display: none;}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<div class="main-container">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="dashboard-page-head">
    <div class="row">
        <div class="col-md-8">
            <div class="page-title">
                <h1>Access your wedding album to see and share the best pictures. <small></small></h1>
            </div>
        </div>
        <div class="col-md-4">
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
                

            <div class="row">
                   <div class="col-sm-12">

                        <div class="col-xs-12">
                            
                            <form method="post" action="{{url('guest-photos/upload/store')}}" enctype="multipart/form-data" 
                                  class="dropzone" id="dropzone">
                                @csrf
                            </form>  

                            <a href="{{ url('check-mobile-otp')}}" enctype="multipart/form-data) }}" class="snd-btn">Update</a>  


                        </div>
                                               
                    </div>

                    <div class="photo">
                        <div class="row">
                            <div class="col-md-12">

                            @foreach($guestalbum as $val)   
                                <div class="col-md-3">
                                    <div style=" border: 1px solid #ccc; width: 200px; margin-bottom: 20px;">
                                        <a href="{{ url('guest-albumby-id/delete/'.$val->id) }}" style="border: 1px solid #e73177; margin-right: 12px; background: #e73177; color: #fff; border-radius: 50%; width: 32px; height: 32px; position: absolute; top: -15px; right: 70px;" title="delete the photo">
                                            <i class="fa fa-trash" aria-hidden="true" style="margin-left: 8px; margin-top: 5px; font-size: 17px;"></i>
                                        </a>
                                        <a href="#">
                                            <img src="{{ asset('front/wedding_planner/image/guest_album/'.$val->filename) }}" class="img-responsive" width="200" height="100" style="width:200px; height: 120px">
                                        </a>
                                        
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
</div>
</div>
</div>
</div>
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            //acceptedFiles: ".mp4",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'GET',
                    url: '{{ url("guest-photos/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        //alert(data);
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                //alert(response);
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>



@endsection 
