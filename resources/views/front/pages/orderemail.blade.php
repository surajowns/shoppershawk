<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Confirmation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        ol,
        ul {
            list-style: none;
        }
        
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }        
        body {font-family: 'Roboto', sans-serif;
            
        }
        td{padding:10px 8px;}
        .stores-icons, .pd_social{margin-top: 10px;}
       .pd_social a > i {color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background: #c40316;
    margin: 3px;
    border-radius: 50px;
}
    </style>
</head>
<body>
    <div class="order-tables">
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="background: #f1f1f1;padding:25px 0;font-size: 14px;">
    <tr>
        <td align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="15" cellspacing="0" width="600">
                            <tr>
                                <td align="center">
                                    <a href="{{url('/')}}"><img src="{{url('public/front/img/logo/logo.png')}}" alt="logo" style="max-width: 120px;"></a>
                                </td>
                            </tr>
                        </table>
                        <table border="0" cellpadding="5" cellspacing="0" width="600" style="background: #fff; border:1px solid #c40316;">
                            <tr>
                                <td align="center" style="font-size: 24px; font-weight: bold; color: #c40316; letter-spacing: 1px; border-bottom:2px solid #c40316; padding: 15px;"> Order Confirmation</td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" cellspacing="0" width="580">
                                       
                                                                          
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" style="font-size: 18px; color: #c40316;"><strong>Order Detail</strong></td>
                                                           <td align="right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">Order ID:{{$order_no}}<strong></strong></td>
                                                            <td align="right">Date &amp; Time : {{$orders['created_at']}} <strong></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="600" border="0" cellpadding="10" cellspacing="0" style="border:1px solid #ccc">
                                                    <thead style="text-transform:uppercase;color:#222;background:#333">
                                                        <tr>
                                                            <th colspan="2" align="left" style="border-right:1px solid #ccc;color:#fff;">Product</th>
                                                            <th width="100" style="color:#fff;">Price</th>
                                                            <th style="border-right:1px solid #ccc;color:#fff;">Quantity</th>
                                                            <th width="100" style="color:#fff;">Total Price</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    <?php $subtotal=0;?>
                                                       @foreach($orders->orderdetails as $value)
                                                    
                                                        <tr>
                                                        <td valign="top" style="border-right:1px solid #ccc;border-top:1px solid #ccc">
                                                                <img src="{{url('public/product_image/')}}}" width="70" >
                                                            </td>
                                                            <td valign="top" style="border-right:1px solid #ccc;border-top:1px solid #ccc">
                                                                @foreach($value->products as $data)
                                                                <strong>{{$data['name']}}</strong>
                                                                @endforeach
                                                                <br>
                                                              
                                                                <span style="display:block;font-size:13px"><span style="display:inline-block;width:50px"></span><span style="display:inline-block"></span></span>
                                                                
                                                               
                                                                 
                                                              
                                                            </td>
                                                            <td align="center" style="border-right:1px solid #ccc;border-top:1px solid #ccc"><p>₹{{number_format($value['price'],2)}}</p></td>
                                                            <td align="center" style="border-right:1px solid #ccc;border-top:1px solid #ccc">{{$value['quantity']}}</td>
                                                            <td align="center" style="border-top:1px solid #ccc;border-right:1px solid #ccc;">
                                                            <p>₹ {{number_format($value['quantity']*$value['price'],2)}}</p>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4" style="border-right:1px solid #ccc;border-top:1px solid #ccc"><strong>Subtotal:</strong></td>
                                                            <td align="center" style="border-top:1px solid #ccc;border-right:1px solid #ccc;"><strong>₹ {{number_format($orders['price'],2)}}</strong></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td colspan="4" style="border-right:1px solid #ccc;border-top:1px solid #ccc"><strong>Total:</strong></td>
                                                            <td align="center" style="border-top:1px solid #ccc;border-right:1px solid #ccc;"><strong>₹{{number_format($orders['total_amount'],2)}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <span>Payment Method: <strong>{{$orders['order_type']}}</strong></span>
                                                                <p>Team,
                                                                    <br> <a href="#" target="_blank" >Shoppershawk</a> </p>
                                                            </td>
                                                            <td align="right" valign="top"><span><strong>Delivery Address</strong><br>{{isset($orders['shipping_address'])?$orders['shipping_address']:$orders['billing_address']}}&nbsp;&nbsp;{{isset($orders['shipping_landmark'])?$orders['shipping_landmark']:$orders['billing_landmark']}}&nbsp;&nbsp;{{isset($orders['shipping_pincode'])?$orders['shipping_pincode']:$orders['billing_pincode']}}<br></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <span><strong>Download Mobile App</strong></span>
                                                                <div class="stores-icons">
                                                                
                                                                </div>
                                                                
                                                            </td>
                                                            <td align="right" valign="top"><span><strong>Social Media</strong></span>
                                                            <div class="pd_social">
                                                                <div class="d-flex">
                                                                
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>

  </body>
</html>
