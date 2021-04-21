<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Shoppershawk:Thank you For visting our website</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front/img/favicon.png')}}" />

        <!-- CSS -->

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/plugins.css')}}" />

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/style.css')}}" />
        <!-- Main Responsive CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/responsive.css')}}" />
    </head>
    <?php 
        $user=Auth::user();
        $order=App\Order::where('user_id',isset($user)?$user['id']:'')->orderBy('id','DESC')->first();
    
    ?>
    <body>
<div class="pt-2 pb-2">
        <div class="container">
            <!--faq area start-->
            <div class="">
                <div class="row">
                    <div class="col-sm-4 col-lg-4"></div>
                    <div class="col-sm-12 col-lg-4 text-center">
                        <div class="order-deliverd">
                            <img src="{{url('public/front/img/deliverd.gif')}}" style="border-radius: 50%;">
                            <h3 class="pt-3">YOUR ORDER HAS BEEN RECEIVED</h3>
                            <p></p>
                            <p>Thank you for your payment, it’s processing</p>
                            <p>Your order No is :&nbsp;<b>{{isset($order['order_no'])?$order['order_no']:''}}</b></p>
                            <p>You will receive an order confirmation email with details of your order and a link to track your process.</p>
                        </div>
                        <div class="order_button mt-20">
                                <a href="{{url('/order-details/'.$order['id'])}}"><button class="btn btn-primary">Track Order</button></a><br></br>
                                <a href="{{url('/')}}">Continue Shopping</a>    
                                </div>
                    </div>
                    <div class="col-sm-4 col-lg-4"></div>
                </div>
            </div>
            <!--faq area end-->
        </div>
    </div>
    </body>
    <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
    <script src="{{url('public/front/js/main.js')}}"></script>
    <script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>
  
    