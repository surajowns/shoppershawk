@extends('front.master')
@section('title','User Profile')
@section('content')
      <!-- my account start  -->
      <div class="account_page_bg">
        <div class="container">
            <section class="main_content_area">
                <div class="account_dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button">
                                <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">My Account</a></li>

                                    <li><a href="#downloads" data-toggle="tab" class="nav-link">My Cart</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">My Orders</a></li>
                                    <li><a href="#address" data-toggle="tab" class="nav-link">Manage Address</a></li>
                                    <li><a href="#account-details" data-toggle="tab" class="nav-link">Manage details</a></li>
                                    <li><a href="login.html" class="nav-link">logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade show active" id="dashboard">
                                    <h3>My Account </h3>
                                    <p>From your account My Account. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="personal-info">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="profile-img">
                                                            <img src="assets/img/about/testimonial1.jpg" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="personal-details">
                                                            <h4>{{$user['name']}}</h4>
                                                            <p>{{$user['email']}}</p>
                                                            <p>{{$user['mobile']}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="defalt-address">
                                                <h4>Addresss</h4>
                                                <div class="address-type">
                                                    <p>Home</p>
                                                </div>
                                                <p>{{$user['location']}}</p>
                                                <p>Delta 1, Greater Noida, Uttar Pradesh - 201306</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders">
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order No</th>
                                                    <th>Order Date</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                             	@foreach($orders as $value )
											<tr>
												<td>{{$value['order_no']}}</td>
												<td>{{date('d M Y H:i A',strtotime($value['created_at']))}}</td>
												<td>₹{{number_format($value['total_amount'])}}</td>
												<td>
                                                   <a href="{{url('admin/orders/viewdetails/'.$value['id'])}}" class="btn btn-sm bg-info-light"><i class="fa fa-eye mr-1"></i> View</a>
                                                   <a href="{{url('admin/orders/invoice/'.$value['id'])}}" class="btn btn-sm bg-info-light"><i class="fa fa-download"></i>Invoice</a>
                                                </td>

                                            </tr>
											@endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="downloads">
                                    <h3>My Cart</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Downloads</th>
                                                    <th>Status</th>
                                                    <th>View Deatils</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                    <td>May 10, 2018</td>
                                                    <td><span class="text-danger">Out Of stock</span></td>
                                                    <td><a href="#" class="view">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Organic - ecommerce html template</td>
                                                    <td>Sep 11, 2018</td>
                                                    <td><span class="text-warning">Limited Stocks</span></td>
                                                    <td><a href="#" class="view">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                    <td>May 10, 2018</td>
                                                    <td><span class="text-success">Avilable</span></td>
                                                    <td><a href="#" class="view">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <h4 class="billing-address">Billing address</h4>
                                    <a href="#" class="view">Edit</a>
                                    <p><strong>Bobby Jackson</strong></p>
                                    <address>
                                        House #15<br>
                                        Road #1<br>
                                        Block #C <br>
                                        Banasree <br>
                                        Dhaka <br>
                                        1212
                                    </address>
                                        <p>Bangladesh</p>
                                </div>
                                <div class="tab-pane fade" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="#">
                                                    <p>Didn't have an account? <a href="login.html">Log in instead!</a></p>
                                                    <div class="input-radio">
                                                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                    </div> <br>
                                                    <label>First Name</label>
                                                    <input type="text" name="first-name">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last-name">
                                                    <label>Email</label>
                                                    <input type="text" name="email-name">
                                                    <br>
                                                    <div class="save_button primary_btn default_button">
                                                        <button type="submit">Update Profile</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- my account end   -->
    @endsection