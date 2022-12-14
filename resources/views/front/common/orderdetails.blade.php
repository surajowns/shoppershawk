@extends('front.master')
@section('title','Order Details')
@section('content')
<style>
  .list-group {
                border-color: #d0d5dc !important;
            }
            .list-group .list-group-item {
                border-color: #d0d5dc !important;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-weight: 500 !important;
            }

            a.account-card {
                text-decoration: none;
                color: unset;
            }
            a.account-card i.fa {
                font-size: 42px;
                width: 45px;
            }
            a.account-card .card {
                background: #f9fafb;
                border: 1px solid #d0d5dc;
            }
            a.account-card .card:hover {
                background: #ffffff;
            }
            a.account-card .card:active {
                background: #f0f2f5;
            }

            .bg-yellow {
                background: #f5d847;
                color: #222c3a;
            }

            .list-group-item-action {
                background: #f9fafb;
            }
            .list-group-item-action .fa {
                width: 22px;
            }
            .list-group-item-action .fa.fa-angle-right {
                font-size: 20px;
                position: absolute;
                right: 5px;
                top: 14px;
            }

            .coupon {
                background: #f9fafb;
                border: 2px dashed #d0d5dc !important;
            }

            .reward-status-box {
                position: relative;
                width: 100%;
                color: #ffffff;
                background: #1b8cb2;
                border: 2px solid #38b7e1;
                border-radius: 5px;
            }
            .reward-status-box .reward-status {
                width: 60%;
                background: #38b7e1;
                padding: 15px;
            }
            .reward-status-box .current-status {
                position: absolute;
                right: 15px;
                top: 15px;
                color: #ffffff;
            }
            .reward-status-box .current-status-2 {
                position: absolute;
                right: 15px;
                top: 41px;
                color: #ffffff;
            }

            .text-orange {
                color: #ec9532 !important;
            }

            .text-carbon {
                color: #222c3a !important;
            }

            .text-pebble {
                color: #79879a !important;
            }

            .text-gray {
                color: #a2abb9 !important;
            }

            .text-cloud {
                color: #d0d5dc !important;
            }

            .text-blue {
                color: #49aed0 !important;
            }

            .text-gray {
                color: #a2abb9 !important;
            }

            .text-pale-sky {
                color: #a2abb9 !important;
            }

            .bg-black {
                background: #111822 !important;
            }

            .bg-snow {
                background: #f9fafb !important;
            }

            .bg-fog {
                background: #f0f2f5 !important;
            }

            .bb1-cloud {
                border-bottom: 1px solid #d0d5dc;
            }

            .fs-14 {
                font-size: 14px !important;
            }

            .fs-22 {
                font-size: 22px !important;
            }

            .tanga-header .navbar-brand {
                margin-bottom: 5px;
            }
            .tanga-header .nav-link {
                color: #a2abb9;
            }
            .tanga-header .nav-link:hover {
                color: #ffffff;
            }
            .tanga-header .nav-link:active {
                color: #a2abb9;
            }

            .tanga-navbar {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .tanga-navbar:-webkit-scrollbar {
                display: none;
            }
            .tanga-navbar .nav-link {
                white-space: nowrap;
                color: #79879a;
            }
            .tanga-navbar .nav-link:hover {
                color: #354050;
            }
            .tanga-navbar .nav-link:active {
                color: #79879a;
            }

            .btn-primary {
                background: #c62931;
                border-color: #c62931;
                cursor: pointer;
            }
            .btn-primary:hover {
                background: #d94950;
                border-color: #d94950;
            }

            .btn-secondary {
                background: #ffffff !important;
                color: #354050 !important;
                border-color: #d0d5dc !important;
                cursor: pointer;
            }
            .btn-secondary:hover {
                color: #354050 !important;
                background: #f9fafb !important;
            }
            .btn-secondary:active {
                color: #79879a !important;
                background: #f0f2f5 !important;
            }
            .btn-secondary:focus {
                color: #79879a !important;
                background: #f0f2f5 !important;
                outline: 0 !important;
            }

            .mobile-nav {
                position: fixed;
                bottom: 0;
                z-index: 50;
                display: block;
                width: 100%;
                background: #111822;
            }
            .mobile-nav a {
                text-decoration: none !important;
                cursor: pointer;
                color: #a2abb9;
                font-size: 12px;
                float: left;
                width: 20%;
                display: inline-block;
                text-align: center;
                margin: 0 !important;
                padding: 8px 0px 5px 0px;
            }
            .mobile-nav a.active {
                background: #222c3a;
                color: #ffffff;
            }
            .mobile-nav a i {
                font-size: 23px;
                display: block;
                margin: 0 auto;
                margin-bottom: 2px;
            }

            .fs-18 {
                font-size: 18px !important;
            }

            .fs-22 {
                font-size: 22px !important;
            }

            .bg-snow {
                background: #f9fafb !important;
            }

            .card {
                border-color: #d0d5dc !important;
            }

            .text-pebble {
                color: #79879a !important;
            }

            .text-charcoal {
                color: #354050 !important;
            }

            .bottom-drawer {
                position: fixed;
                bottom: 56px;
                width: 100%;
                border-top: 1px solid #d0d5dc;
            }

            .bg-white {
                background: #ffffff !important;
            }

            .list-group {
                border-color: #d0d5dc !important;
            }

            .list-group-item {
                border-color: #d0d5dc !important;
            }

            .text-red {
                color: #c62931 !important;
            }

            .text-green {
                color: #00a362 !important;
            }

            .text-link-blue {
                color: #3373cc !important;
            }

            .form-control {
                background: #f9fafb;
                border-color: #d0d5dc !important;
            }

            .bd-2-cloud {
                border: 2px dashed #d0d5dc;
            }

            .b-1-green {
                border: 2px solid #00a362 !important;
            }

            .br-8 {
                border-radius: 5px;
            }

            .address-radio .address-label {
                padding: 1rem;
                margin-bottom: 0 !important;
            }
            .address-radio [type="radio"]:checked,
            .address-radio [type="radio"]:not(:checked) {
                position: absolute;
                opacity: 0;
            }
            .address-radio [type="radio"]:checked + label,
            .address-radio [type="radio"]:not(:checked) + label {
                position: relative;
                padding-left: 50px;
                width: 100%;
                cursor: pointer;
                line-height: 20px;
                display: inline-block;
                color: #354050;
            }
            .address-radio [type="radio"]:checked + label:before,
            .address-radio [type="radio"]:not(:checked) + label:before {
                content: "";
                position: absolute;
                left: 1rem;
                top: 1rem;
                width: 20px;
                height: 20px;
                border: 2px solid #d0d5dc;
                border-radius: 50%;
                background: #fff;
            }
            .address-radio [type="radio"]:checked + label:after,
            .address-radio [type="radio"]:not(:checked) + label:after {
                content: "";
                width: 12px;
                height: 12px;
                background: #00a362;
                position: absolute;
                top: 20px;
                left: 20px;
                border-radius: 50%;
                transition: all 0.2s ease;
            }
            .address-radio [type="radio"]:not(:checked) + label:after {
                opacity: 0;
                transform: scale(0);
            }
            .address-radio [type="radio"]:checked + label:after {
                opacity: 1;
                transform: scale(1);
            }
            .address-radio [type="radio"]:not(:checked) ~ label p {
                display: none;
            }
            .address-radio [type="radio"]:checked ~ label p {
                display: unset;
            }
            ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}
</style>
<div class="login_page_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-sm-12">
                        <div class="container mt-3 mt-md-5">
                            <h2 class="text-charcoal hidden-sm-down">Order Details</h2>
                            <div class="row">
                                <div class="col-12">
                                <div class="col-6 col-md">
                                                    <h5 class="text-charcoal mb-0 w-100">Order Number</h5>
                                                    <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$orders['order_no']}}</a>
                                                </div>
                                    <div class="list-group mb-5">
                                        <div class="list-group-item p-3 bg-snow" style="position: relative;">
                                            <div class="row w-100">
                                               
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-0 w-100">Date</h6>
                                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{date('d M Y h:i A',strtotime($orders['created_at']))}}</p>
                                                </div>  
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-0 w-100">Price</h6>
                                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">???{{number_format($orders['price'],2)}}</p>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-0 w-100">Discount</h6>
                                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">???{{number_format($orders['discount'],2)}}</p>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-0 w-100">Additional charges</h6>
                                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">??? 00.00</p>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-0 w-100">Total</h6>
                                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">???{{number_format($total_amount,2)}}</p>
                                                </div>
                                                
                                                <div class="col-12 col-md-3">
                                                    <a href="{{url('/user/account')}}" class="btn btn-primary w-100">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-3 bg-white">
                                            <div class="row no-gutters">
                                                <div class="col-md-12 mb-5 text-center">
                                                    <ol class="progtrckr" data-progtrckr-steps="5">
                                                        <li class="{{$orders['status'] <=7 ? 'progtrckr-done' : 'progtrckr-todo'}}">Pending</li>
                                                        <li class="{{$orders['status'] >=2 && $orders['status'] <=7 ? 'progtrckr-done' : 'progtrckr-todo'}}">Confirm</li>
                                                        <li class="{{$orders['status'] >=3 && $orders['status'] <=7 ? 'progtrckr-done':'progtrckr-todo'}}">Inprogress</li>
                                                        <li class="{{$orders['status'] >=4 && $orders['status'] <=7 ?'progtrckr-done':'progtrckr-todo'}}">Delivered</li>
                                                        @if($orders['status']==5)
                                                        <li class="{{$orders['status'] ==5 ?'progtrckr-done':'progtrckr-todo'}}">Cancelled</li>
                                                        @endif
                                                        @if($orders['status'] >= 6 && $orders['status'] <=7)
                                                        <li class="{{$orders['status'] >=6 && $orders['status'] <= 7?'progtrckr-done':'progtrckr-todo'}}">Return</li>
                                                        @endif
                                                    </ol>
                                                </div>
                                                @foreach($orderdetails as $value )
                                                <div class="row no-gutters mt-3">
                                                    <div class="col-1"></div>
                                                    <div class="col-3 col-md-1">
                                                        <img class="img-fluid pr-3" src="{{url('public/product_image/'.$value['products'][0]['productImage'][0]['image'])}}" alt="">
                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="col-4 col-md-6 pr-0 pr-md-3">
                                                        <h6 class="text-charcoal mb-2 mb-md-1">
                                                            <a href="{{url('/product_details/'.$value['products'][0]['slug'])}}" class="text-charcoal">{{$value['products'][0]['name']}}</a>
                                                        </h6>
                                                        <ul class="list-unstyled text-pebble mb-2 small">
                                                            <li class=""><b>Price:</b>&nbsp;&nbsp; ???{{number_format($value['price']),2}}</li>
                                                            <li class=""><b>Quantity:</b>&nbsp;&nbsp;{{$value['quantity']}}</li>
                                                        </ul>
                                                        <h6 class="text-charcoal text-left mb-0 mb-md-2"><b>Total:</b><b>&nbsp;&nbsp;???{{number_format($value['total_amount']),2}}</b></h6>
                                                    </div>
                                                    <div class="col-3 col-md-3 hidden-sm-down">
                                                       @if($orders['status'] >=4 && $orders['status'] <=7)
                                                        <a href="{{url('/product_details/'.$value['products'][0]['slug'])}}" class="btn btn-secondary w-100 mb-2" >Buy It Again</a>
                                                       @endif
                                                       
                                                    </div>
                                                </div>
                                                @endforeach
                                    
                                            </div>
                                        </div>
                                        <div class="list-group-item p-3 bg-snow" style="position: relative;">
                                            <div class="row w-100">
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-20 w-100"><b>Billing Address</b></h6>
                                                   
                                                    <p>Address:&nbsp;&nbsp;{{ucfirst($orders['billing_address'])}}</p> 
                                                    <p>Pincode:&nbsp;&nbsp;{{ucfirst($orders['billing_pincode'])}}</p> 
                                                    <p>Landmark:&nbsp;&nbsp;{{ucfirst($orders['billing_landmark'])}}</p>
                                                    </div>
                                                <div class="col-6 col-md">
                                                    <h6 class="text-charcoal mb-20 w-100"><b>Shipping Address</b></h6>
                                                    @if($orders['shipping_name'])
                                                        
                                                    <p>Address:&nbsp;&nbsp;{{ucfirst($orders['shipping_address'])}}</p> 
                                                    <p>Pincode:&nbsp;&nbsp;{{ucfirst($orders['shipping_pincode'])}}</p> 
                                                    <p>Landmark:&nbsp;&nbsp;{{ucfirst($orders['shipping_landmark'])}}</p>                                                     
                                                        @else
                                                 
                                                        <p>Address:&nbsp;&nbsp;{{ucfirst($orders['billing_address'])}}</p> 
                                                        <p>Pincode:&nbsp;&nbsp;{{ucfirst($orders['billing_pincode'])}}</p> 
                                                        <p>Landmark:&nbsp;&nbsp;{{ucfirst($orders['billing_landmark'])}}</p>                                                        
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>

                        <div class="p-3 hidden-md-up"></div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
@endsection
