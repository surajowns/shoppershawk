@extends('front.master')
@section('title','User Profile')
@section('content')
<style>
            /*.social-links {
  max-width: 300px;
}*/
          
          /* container */

#share {
	width: 100%;
  	/* margin: 100px auto; */
  	text-align: center;
}

/* buttons */

#share a {
	width: 50px;
  	height: 50px;
  	display: inline-block;
  	margin: 8px;
  	border-radius: 50%;
  	font-size: 24px;
  	color: #fff;
	opacity: 1;
	transition: opacity 0.15s linear;
}

#share a:hover {
	opacity: 1;
}

/* icons */

#share i {
  	position: relative;
  	top: 50%;
  	transform: translateY(-50%);
}

/* colors */

.facebook {
 	background: #3b5998;
}

.twitter {
  	background: #55acee;
}

.googleplus {
  	background: #dd4b39;
}

.linkedin {
  	background: #0077b5;
}

.whatsapp {
  	background: #01e675;
}

            .shareUrl-input {
                cursor: pointer;
            }


            .wrapper {
                background: #c40316;
            }

            p {
                line-height: 1.3;
            }

            .shareUrl {
                width: 100%;
                padding: 20px 20px;
                text-align: center;
            }

            .shareUrl-header {
                margin-bottom: 20px;
            }

            .shareUrl-headerText {
                margin-top: 0;
                margin-bottom: 10px;
                font-size: 22px;
            }

            .shareUrl-subtext {
                margin-top: 10px;
                font-size: 14px;
            }

            .shareUrl-body {
                margin-bottom: 0px;
            }

            .shareUrl-input {
                width: 100%;
                padding: 10px 0;
                border: 2px solid rgba(0, 0, 0, 0.09);
                text-align: center;
                font-size: 26px;
                font-weight: bold;
                color: rgb(196 38 37);
                background: rgb(255 255 255);
                border-radius: 3px;
                transition: all 300ms ease;
            }
            .shareUrl-input:hover,
            .shareUrl-input:focus,
            .shareUrl-input:active {
                color: rgb(196 38 37);
                background: rgb(255 255 255);
            }

            @media (min-width: 568px) {
                .shareUrl {
                    padding: 20px 20px;
                }

                .shareUrl-input {
                    max-width: 100%;
                    font-size: 26px;
                }

                .shareUrl-headerText {
                    font-size: 22px;
                }
            }
            .u-verticalGrid {
                display: flex;
                flex-flow: column wrap;
            }

            .u-flexCenter {
                display: flex;
                align-items: center !important;
            }

            .u-flexCenterHorizontal {
                display: flex;
                justify-content: center !important;
            }

            /*.u-sizeViewHeightMin100 {
  min-height: 100vh !important;
}*/

            .u-size1040 {
                max-width: 1040px;
            }

            .u-marginAuto {
                margin: 0 auto;
            }
        </style>
      <!-- my account start  -->
      <div class="account_page_bg">
        <div class="container">
            <section class="main_content_area">
                <div class="account_dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                              @include('front.common.partials')
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade show active" id="dashboard">
                                    <h3>My Account </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="personal-info">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="profile-img">
                                                        @if(isset($user['profile_image']))
                                                            <img src="{{url('public/profile/'.$user['profile_image'])}}" width="100%">
                                                          @else
                                                          <img src="{{url('public/profile/profile.png')}}" width="100%">

                                                          @endif  
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
												<td>₹{{isset($value['additional_charges'][0])?number_format($value['additional_charges'][0]['amount'],2):number_format($value['total_amount'],2)}}</td>
												<td>
                                                   <a href="{{url('/order-details/'.$value['id'])}}" class="btn btn-sm bg-info-light"><i class="fa fa-eye mr-1"></i>View</a>
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
                                <div class="tab-pane" id="addressess">
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
                                <div class="tab-pane" id="address">
                                @if(!empty($referral_user))
                                        <div class="wrapper">
                                            <div class="content u-sizeViewHeightMin100">
                                                <div class="shareUrl u-verticalGrid u-marginAuto u-size1040">
                                                    <header class="shareUrl-header">
                                                        <h1 class="shareUrl-headerText text-light">Click to Copy Invite Link</h1>
                                                    </header>
                                                    <div class="shareUrl-body">
                                                        <div class="container">
                                                            <!-- COPY INPUT -->
                                                            <input class="shareUrl-input js-shareUrl" type="text" readonly="readonly" />
                                                            <p class="shareUrl-subtext text-light">Click above to copy the link.</p>
       
                                                            <div id="share">

                                                                <!-- facebook -->
                                                                <a class="facebook" href="https://www.facebook.com/share.php?u=https://shoppershawk.com/product_details/lenovo-tab-m10-hd-x-505x-2gb-ram-32gb-rom&title='Refer to your friends and Get Exciting deals on Laptop & Desktop'" target="blank"><i class="fa fa-facebook"></i></a>

                                                                <!-- twitter -->
                                                                <a class="twitter" href="https://twitter.com/intent/tweet?status='Refer to your friends and Get Exciting deals on Laptop & Desktop'+{{$refferal['link']}}" target="blank"><i class="fa fa-twitter"></i></a>

                                                                <!-- google plus -->
                                                                <a class="googleplus" href="https://plus.google.com/share?url={{$refferal['link']}}" target="blank"><i class="fa fa-envelope"></i></a>

                                                                <!-- linkedin -->
                                                                <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{$refferal['link']}}&title='Refer to your friends and Get Exciting deals on Laptop & Desktop'" target="blank"><i class="fa fa-linkedin"></i></a>
                                                                <a class="whatsapp" href="https://api.whatsapp.com/send?phone={{$user['mobile']}}&text={{isset($refferal['link'])?$refferal['link']:''}}" target="blank"><i class="fa fa-whatsapp"></i></a>

                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <h3 class="mt-3">My Referrals</h3>
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Name</th>
                                                        <th>Phone No.</th>
                                                        <th>Email Address</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(!empty($referral_user))
                                                     @foreach($referral_user as $val)
                                                      <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$val->name}}</td>
                                                        <td><span class="success">{{$val->mobile}}</span></td>
                                                        <td>{{$val->email}}</td>
                                                        <td>{{date('d M Y',strtotime($val->created_at))}}</td>
                                                     </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                         <h3>No Referrals Available</h3>
                                        @endif
                                    </div>
                                <div class="tab-pane fade" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form class="col-10" action="{{url('/user/profile')}}" method="post" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="row pb-2">
                                                  <div class="col-sm-6">
                                                  <label>Name</label>
                                                    <input class="form-control" type="text" name="name" value="{{$user['name']}}" required>
                                                  </div> 
                                                  <div class="col-sm-6">
                                                  <label>Mobile</label>
                                                    <input class="form-control" type="text" name="mobile" value="{{$user['mobile']}}" required>
                                                  </div>
                                                </div>
                                                <div class="row pb-2">
                                                  <div class="col-sm-12">
                                                  <label>Email Address</label>
                                                    <input class="form-control" type="text" name="email" value="{{$user['email']}}" required>
                                                  </div>
                                                </div>
                                                <div class="row pb-2">
                                                  <div class="col-sm-12">
                                                  <label>Address</label>
                                                    <input class="form-control" type="text" name="location"  id="address_id" value="{{$user['location']}}" required>
                                                  </div>
                                                </div>
                                                <div class="row pb-2">
                                                  <div class="col-sm-12">
                                                  <label>Profile</label>
                                                    <input class="form-control" type="file" name="profile_image" value="{{url('public/admin/images/'.$user['profile_image'])}}">
                                                  </div>
                                                </div>
                                                  
                            
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
    @section('javascript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPOxoqGdov5Z9xJw1SMVa_behLLSPacVM&libraries=places"></script>

<script>

google.maps.event.addDomListener(window, 'load', function () {
     var options = {
          componentRestrictions: {country: "IND"}
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('address_id','latitude','longitude'),options);
        google.maps.event.addListener(places, 'place_changed', function () {
          var place = places.getPlace();
          var address = place.formatted_address;
          var latitude = place.geometry.location.lat();
          var longitude = place.geometry.location.lng();
          // var mesg = address;
        
          // var suburb = address.split(',');
          $('#latitude').val(latitude);
          $('#latitude').val(latitude);


          $('#longitude').val(longitude);
          // alert(mesg+' latitude:- '+latitude+' longitude:-'+longitude);
        });
      });
 </script>
 <script>
            (function () {
                function copy(element) {
                    return function () {
                        document.execCommand("copy", false, element.select());
                    };
                }
                var shareUrl = document.querySelector(".js-shareUrl");
                var copyShareUrl = copy(shareUrl);
                shareUrl.value = "{{isset($refferal['link'])?$refferal['link']:'No Referral Link Available'}}";
                shareUrl.addEventListener("click", copyShareUrl, false);
            })();
        </script>
 @stop