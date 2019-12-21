@extends('front.wedding_planner_layout.mainlayout')
@section('content')
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="images/couple-profile.jpg" alt="" class="img-circle"></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">Emma &amp; Jhon<small>Welcome Back Couple</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="couple-dashboard.html"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                    <li><a href="couple-wishlist.html"><i class="fa fa-heart db-icon"></i>My Wishlist </a></li>
                    <li class="active"><a href="couple-checklist.html"><i class="fa fa-list db-icon"></i>My Checklist</a></li>
                    <li><a href="couple-budget.html"><i class="fa fa-calculator db-icon"></i>My Budget</a></li>
                    <li><a href="couple-guestlist.html"><i class="fa fa-users db-icon"></i>My Guest List</a></li>
                    <li><a href="couple-profile.html"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-page-head">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="page-title">
                                <h1>My Checklist <small>Create your wedding to do and start planning.</small></h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> <a href="#" class="btn btn-default" id="show">Add To Do</a> </div>
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
                            <div class="bg-white pinside40 todo-form mb30">
                                <h2 class="form-title">Create New Task</h2>
                                <div class="close-sign"><a href="#" id="hide"><i class="fa fa-close"></i></a></div>
                                <form class="row">
                                    <div class="col-md-6">
                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="control-label" for="tasktitle">Task Title</label>
                                            <div class="">
                                                <input id="tasktitle" name="tasktitle" type="text" placeholder="Task Title" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="taskdate">Task Date</label>
                                            <div class="">
                                                <input id="taskdate" name="taskdate" type="text" placeholder="Task Date" class="form-control input-md" required="">
                                                <span class="help-block"> </span> </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-md-6">
                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="control-label" for="taskdescriptions">Task Descriptions</label>
                                            <div class="">
                                                <textarea class="form-control" id="taskdescriptions" name="taskdescriptions" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-right">
                                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save Task</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="st-accordion">
                                <!-- shortcode -->
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title"> <a class="title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-angle-double-up sign"></i> Janudary 2017</a> </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="todo-list-group">
                                                <!-- List group -->
                                                <ul class="listnone">
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#todo1" aria-expanded="false" aria-controls="collapseExample">Various Over The Years</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="todo1">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#todo2" aria-expanded="false" aria-controls="collapseExample">Suspendisse Sedipsum Metus</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="todo2">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#todo3" aria-expanded="false" aria-controls="collapseExample">Consectetur Adipiscing Elit</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="todo3">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo"><i class="fa fa-angle-double-up sign"></i> February 2017</a> </h4>
                                        </div>
                                        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="todo-list-group">
                                                <!-- List group -->
                                                <ul class="listnone">
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#feb-todo1" aria-expanded="false" aria-controls="collapseExample">Various Over The Years</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="feb-todo1">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#feb-todo2" aria-expanded="false" aria-controls="collapseExample">Suspendisse Sedipsum Metus</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="feb-todo2">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#feb-todo3" aria-expanded="false" aria-controls="collapseExample">Consectetur Adipiscing Elit</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="feb-todo3">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><i class="fa fa-angle-double-up sign"></i> March 2017</a> </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="todo-list-group">
                                                <!-- List group -->
                                                <ul class="listnone">
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#march-todo1" aria-expanded="false" aria-controls="collapseExample">Various Over The Years</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="march-todo1">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#march-todo2" aria-expanded="false" aria-controls="collapseExample">Suspendisse Sedipsum Metus</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="march-todo2">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="todo-list-item">
                                                        <div class="todo-list">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <div class="todo-checkmark">
                                                                        <input type="checkbox" name="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="todo-task">
                                                                        <h3 class="todo-title"><a  class="title" data-toggle="collapse" href="#march-todo3" aria-expanded="false" aria-controls="collapseExample">Consectetur Adipiscing Elit</a> </h3>
                                                                        <span class="todo-date">20 sept, 2017</span> </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="todo-action"> <a href="#" class="btn-circle" title="Edit list"><i class="fa fa-edit"></i></a> <a href="#" class="btn-circle" title="Delete List"><i class="fa fa-trash-o"></i></a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="collapse" id="march-todo3">
                                                                    <div class="todo-notes pinside30">
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet tortor vitae augue dictum, non luctus quam mollis. Ut congue eu justo eget iaculis. In sollicitudin pellentesque eros, vel faucibus nibh tempor ut. Aenean laoreet dolor gravida feugiat lobortis. Phasellus nec enim eu leo cursus consequat non quis libero. Maecenas tincidunt turpis lectus, quis aliquam enim vehicula id. Donec sed quam congue, rhoncus erat at, suscipit velit. Donec ultricies vitae ex imperdiet pretium.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white pinside30 widget-todo">
                                        <h3>Summary of To Dos</h3>
                                        <div class="todo-percentage" data-percent="65"> </div>
                                        <div class="todo-value"> <span class="todo-done">70 Done </span> <span class="todo-pending">8 To-Dos </span> </div>
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

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="{!! asset('front/wedding_planner/js/date-script.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#hide").click(function() {
        $(".todo-form").hide(400);
    });
    $("#show").click(function() {
        $(".todo-form").show(400);
    });
});
</script>
<script type="text/javascript" src="{!! asset('front/wedding_planner/js/jquery.circlechart.js') !!}"></script>
<script>
$('.todo-percentage').percentcircle({});
</script>

@endsection 


