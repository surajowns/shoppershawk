<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta name="viewport" content="width=device-width" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body class="size-1140">
      <style type="text/css">
       @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
* {
  margin: 0;
  box-sizing: border-box;
  -webkit-print-color-adjust: exact;
}
body {
  background: #e0e0e0;
  font-family: "Roboto", sans-serif;
}
::selection {
  background: #f31544;
  color: #fff;
}
::moz-selection {
  background: #f31544;
  color: #fff;
}
         table {
         border-collapse: collapse;
         width: 100%;
         }
         th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         }
         .notes-employee{
         width: auto;
         height: auto;
         }
         .col-2 {
         width: 17%;
         }
         tr:hover {background-color:#f5f5f5;}
         .space {margin-top: 100px !important;}
         .container {margin:0 5%;}
         .lunch_break_icon {
         width: 12%;
         margin-left: 5px;
         }
        
         @page {margin: 2.5cm 2cm 2cm;}
         /* body{
         width: auto;
         font-family: Georgia, serif;
         font-size: 14px;
         line-height: 1.42857143;
         } */
      </style>
        <section class="user-dashbord">
            <div class="container">
                 <h1 class="text-center">Tax Invoice</h1>
                <table class="table">
                <th><img src="http://shoppershawk.com/public/front/img/logo/logo.png" alt="Logo" /></th>
                <th><h5>@if($orders['gst_no'] !=null )GSTIN:{{$orders['gst_no']}} @endif</h5></th>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h5>Order Id:&nbsp;&nbsp;{{$orders['order_no']}}</h5>
                                <h5>Order Date:&nbsp;&nbsp;{{date('d M Y',strtotime($orders['created_at']))}}</h5>
                            </th>
                            <th>
                                <h5>Invoice No:&nbsp;000001</h5>
                                <h5>Invoice Date:{{date('d M Y',strtotime($orders['created_at']))}}</h5>
                            </th>
                            <th>
                              @if($orders['gst_no'])
                                <label>GSTIN <br>{{$orders['gst_no']}}</label>
                                @endif
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h3>Shipping Address</h3>
                            </th>
                            <th>
                                <h3>Billing Address</h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                   <h5> Name: {{$orders['shipping_name']?$orders['shipping_name']:$orders['billing_name']}}</h5>
                                   <h5> Email: {{$orders['shipping_email']?$orders['shipping_email']:$orders['billing_email']}}</h5>
                                   <h5>  Phone: {{$orders['shipping_mobile']?$orders['shipping_mobile']:$orders['billing_mobile']}}</h5>
                                   <h5>  Address:  {{$orders['shipping_address']?$orders['shipping_address']:$orders['billing_address']}}</h5>
                                   <h5>  Landmark:  {{$orders['shipping_landmark']?$orders['shipping_landmark']:$orders['billing_landmark']}}</h5>
                                   <h5> State:  {{$orders['shipping_state']?$orders['shipping_state']:$orders['billing_state']}}</h5>
                                   <h5>  Pincode:  {{$orders['shipping_pincode']?$orders['shipping_pincode']:$orders['billing_pincode']}}</h5>
                            </td>
                            <td>
                                <h5>   Name: {{$orders['billing_name']}}</h5>
                                <h5>    Email: {{$orders['billing_email']}}</h5>
                                <h5>    Phone: {{$orders['billing_mobile']}}</h5>
                                <h5>  Address:  {{$orders['billing_address']}}</h5>
                                <h5>   Landmark:  {{$orders['billing_landmark']}}</h5>
                                <h5>   State:  {{$orders['billing_state']}}</h5>
                                <h5>    Pincode:  {{$orders['billing_pincode']}}</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table" style="border: 1px solid #cccccc;">
                    <thead>
                        <tr>
                           <!-- <th>S.N</th> -->
                            <th>Product</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Gross Amount</th>
                            <th>Taxable Value</th>
                            <th>IGST</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetails as $value)
                        <tr class="list-item">
                            <!-- <td>{{$loop->iteration}}</td> -->
                            <td data-label="product" class="tableitem">{{$value['products'][0]['name']}}</td>
                            <td> IGST&nbsp;{{$value['products'][0]['gst']}}&nbsp;%</td>
                            <td data-label="Quantity" class="tableitem">{{$value['quantity']}}</td>
                            <td data-label="Unit Price" class="tableitem">{{number_format($value['price'],2)}}</td>
                            <td>{{number_format($value['price']-$value['price']*($value['products'][0]['gst'])/100,2)}}</td>
                            <td data-label="gst" class="tableitem">{{number_format($value['price']*($value['products'][0]['gst'])/100,2)}}</td>
                            <td data-label="Total" class="tableitem">{{number_format($value['total_amount'],2)}}</td>
                        </tr>
                         @endforeach
                        <tr>
                            <td colspan="1" style="font-weight:bold;">Total Qty: {{$orders['quantity']}}</td>
                            <td colspan="2" style="font-weight:bold;">Discount: {{number_format($orders['discount'],2)}}</td>
                            <td colspan="2" style="font-weight:bold;">Additional charges: {{number_format($additinal_charges,2)}}</td>
                            <td  colspan="2" style="font-weight:bold;">Total Price(INR):&nbsp;{{number_format($transaction_amount,2)}} </td>
                        </tr>                        
                    </tbody>
                </table>
                <div>
                    <div>
                         <h2 id="supplier">Shoppers Hawk</h2>
                        <span id="address">Besthawk infosystem pvt ltd, sector-18, Noida</span><br><span id="country">India</span> - <span id="zip">201301</span><br><span id="tax_num">+91 120-2514786</span><br>
                    </div>
                </div>
                <br><br><br>
                <table class="table">
                </table>
                <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">Our mailing address is:
                        <span class="email"><a href="mailto:care@shoppershawk.com">care@shoppershawk.com</a></span>
                    </p>
                </div>
                </footer>
            </div>
        </section>
   </body>
</html>