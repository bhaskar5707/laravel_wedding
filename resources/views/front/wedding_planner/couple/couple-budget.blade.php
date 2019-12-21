@extends('front.wedding_planner_layout.mainlayout')
@section('content')


<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="{!! asset('front/wedding_planner/images/couple-profile.jpg') !!}" alt="" class="img-circle"></div>
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
                    <li><a href="couple-checklist.html"><i class="fa fa-list db-icon"></i>My Checklist</a></li>
                    <li class="active"><a href="couple-budget.html"><i class="fa fa-calculator db-icon"></i>My Budget</a></li>
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
                                <h1>My Budget <small>Create your wedding to do and start planning.</small></h1>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="action-block"> <a href="#" class="btn btn-default" id="show">Add Category</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white pinside40 todo-form mb30">
                    <h2 class="form-title">Create New Category</h2>
                    <div class="close-sign"><a href="#" id="hide"><i class="fa fa-close"></i></a></div>
                    <form class="row">
                        <div class="col-md-6">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="control-label" for="categoryname">Category Name</label>
                                <input id="categoryname" name="categoryname" type="text" placeholder="Category Name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add Category</button>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                    </form>
                </div>
            </div>
        </div>
        <div class="budget-board">
            <div class="list-group">
                <div href="#" class="list-group-item active">
                    <div class="row">
                        <div class="col-md-4"> Budget Category </div>
                        <div class="col-md-2">Estimated Cost</div>
                        <div class="col-md-2">Actual</div>
                        <div class="col-md-1">Paid</div>
                        <div class="col-md-1">Due</div>
                        <div class="col-md-2">Edit / Delete</div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" data-toggle="collapse" href="#Ceremony" aria-expanded="false" aria-controls="Ceremony"> Ceremony </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="Ceremony">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table ceremony">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Ceremony Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> Officiate Fee / Donation</th>
                                                <td>1200</td>
                                                <td>1000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bridesmaid Dresses</th>
                                                <td>1200</td>
                                                <td>1000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Program for Church</th>
                                                <td>1200</td>
                                                <td>1000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ceremony Location Fee</th>
                                                <td>1200</td>
                                                <td>1000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Wedding Directory</th>
                                                <td>1200</td>
                                                <td>1000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="add new item" class="btn btn-primary add-item">+ Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" role="button" data-toggle="collapse" href="#Reception" aria-expanded="false" aria-controls="Reception"> Reception </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="Reception">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered receptions">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Reception Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Plates, Cups, Silverware</th>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td>$400</td>
                                                <td>$200</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Gratuity of Caterer</th>
                                                <td>$3000</td>
                                                <td>$1500</td>
                                                <td>$1000</td>
                                                <td>$500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rental Items of Caterer</th>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td>$400</td>
                                                <td>$200</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tent and Table Rental</th>
                                                <td>$3000</td>
                                                <td>$1500</td>
                                                <td>$1000</td>
                                                <td>$500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Favors for Reception</th>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td>$400</td>
                                                <td>$200</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Wedding/Grooms Cake</th>
                                                <td>$3000</td>
                                                <td>$1500</td>
                                                <td>$1000</td>
                                                <td>$500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Guest Books</th>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td>$400</td>
                                                <td>$200</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Music at Reception</th>
                                                <td>$3000</td>
                                                <td>$1500</td>
                                                <td>$1000</td>
                                                <td>$500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reception Place Rental</th>
                                                <td>$1000</td>
                                                <td>$600</td>
                                                <td>$400</td>
                                                <td>$200</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="add new item" class="btn btn-primary add-author">Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" role="button" data-toggle="collapse" href="#GroomExpenses" aria-expanded="false" aria-controls="GroomExpenses"> Groom's Expenses </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="GroomExpenses">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table receptions">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Groom Expenses Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Groomsmen Gifts</th>
                                                <td>$400</td>
                                                <td>$350</td>
                                                <td>300</td>
                                                <td>50</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rings</th>
                                                <td>$4000</td>
                                                <td>$3500</td>
                                                <td>3000</td>
                                                <td>500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Grooms' Accessories</th>
                                                <td>$4000</td>
                                                <td>$3500</td>
                                                <td>3000</td>
                                                <td>500</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="" class="btn btn-primary add-author">Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" role="button" data-toggle="collapse" href="#FloristFlowers" aria-expanded="false" aria-controls="FloristFlowers">Florist/Flowers </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="FloristFlowers">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered receptions">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">FloristFlowers Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Groomsmen's Boutonnieres</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Flowers for Reception</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Flower Girl's Flowers</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bridesmaid's Bouquets</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bride's Bouquet</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Flowers for Church</th>
                                                <td>$40</td>
                                                <td>$35</td>
                                                <td>30</td>
                                                <td>5</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="" class="btn btn-primary add-author">Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" role="button" data-toggle="collapse" href="#InvitationsExpenses" aria-expanded="false" aria-controls="InvitationsExpenses">Invitations Expenses </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="InvitationsExpenses">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered receptions">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Invitations Expenses Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Invitations</th>
                                                <td>$120</td>
                                                <td>$100</td>
                                                <td>80</td>
                                                <td>20</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Postage</th>
                                                <td>$120</td>
                                                <td>$100</td>
                                                <td>80</td>
                                                <td>20</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Thank You Notes</th>
                                                <td>$120</td>
                                                <td>$100</td>
                                                <td>80</td>
                                                <td>20</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="" class="btn btn-primary add-author">Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-4"><a class="#" role="button" data-toggle="collapse" href="#VideoPhotographyExpenses" aria-expanded="false" aria-controls="VideoPhotographyExpenses">Video/Photography Expenses </a> </div>
                        <div class="col-md-2">$12000</div>
                        <div class="col-md-2">$8000</div>
                        <div class="col-md-1">$6000</div>
                        <div class="col-md-1">$2000</div>
                        <div class="col-md-2"><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></div>
                        <div class="collapse col-md-12 item-title" id="VideoPhotographyExpenses">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered receptions">
                                        <thead>
                                            <tr>
                                                <th class="col-md-4">Video-PhotographyExpenses Item</th>
                                                <th class="col-md-2">Estimated</th>
                                                <th class="col-md-2">Actual</th>
                                                <th class="col-md-1">Paid</th>
                                                <th class="col-md-1">Due</th>
                                                <th class="col-md-2">Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Wedding Portrait</th>
                                                <td>$120</td>
                                                <td>$100</td>
                                                <td>80</td>
                                                <td>20</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Video</th>
                                                <td>$120</td>
                                                <td>$100</td>
                                                <td>80</td>
                                                <td>20</td>
                                                <td><a href="#" class="btn-edit"><i class="fa fa-edit"></i></a><a href="#" class="btn-delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" title="" class="btn btn-primary add-author">Add New</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection 

