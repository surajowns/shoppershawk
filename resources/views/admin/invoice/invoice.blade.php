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
         .break_img{
         background: url('/img/restaurant-eating-set.svg');
         width: 14px;
         background-repeat: no-repeat;
         background-size: contain;
         height: 16px;
         opacity: 9;
         margin-right: 60px;
         float: right;
         }
         @page {margin: 2.5cm 2cm 2cm;}
         body{
         width: auto;
         font-family: Georgia, serif;
         font-size: 14px;
         line-height: 1.42857143;
         }
      </style>
        <section class="user-dashbord">
            <div class="container">
                 <h1 class="text-center">Tax Invoice</h1>
                <table class="table">
                <th><img src="http://shoppershawk.com/public/front/img/logo/logo.png" alt="Logo" /></th>
                <th><h5>GSTIN:COMPANY GSTNO</h5></th>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h5>Order Id:&nbsp;&nbsp;{{$orders['order_no']}}</h5>
                                <h5>Order Date:&nbsp;&nbsp;{{date('d M Y',strtotime($orders['created_at']))}}</h5>
                            </th>
                            <th>
                                <h5>Invoice No:{{$orders['order_no']}}</h5>
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
                                    <address>
                                    Name: {{$orders['shipping_name']?$orders['shipping_name']:$orders['billing_name']}}<br>
                                    Email: {{$orders['shipping_email']?$orders['shipping_email']:$orders['billing_email']}}<br>
                                    Phone: {{$orders['shipping_mobile']?$orders['shippingmobileile']:$orders['billing_mobile']}}<br>
                                    Address:  {{$orders['shipping_address']?$orders['shipping_address']:$orders['billing_address']}}<br>
                                    Landmark:  {{$orders['shipping_landmark']?$orders['shipping_landmark']:$orders['billing_landmark']}}<br>
                                    State:  {{$orders['shipping_state']?$orders['shipping_state']:$orders['billing_state']}}<br>
                                    Pincode:  {{$orders['shipping_pincode']?$orders['shipping_pincode']:$orders['billing_pincode']}}<br>
                                    </address>
                            </td>
                            <td>
                                <address>
                                   Name: {{$orders['billing_name']}}<br>
                                    Email: {{$orders['billing_email']}}<br>
                                    Phone: {{$orders['billing_mobile']}}<br>
                                    Address:  {{$orders['billing_address']}}<br>
                                    Landmark:  {{$orders['billing_landmark']}}<br>
                                    State:  {{$orders['billing_state']}}<br>
                                    Pincode:  {{$orders['billing_pincode']}}<br>
                                </address>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Gross Amount</th>
                            <th>Discount</th>
                            <th>Taxable Value</th>
                            <th>IGST</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetails as $value)
                        <tr class="list-item">
                            <td data-label="product" class="tableitem">{{$value['products'][0]['name']}}</td>
                            <td data-label="Quantity" class="tableitem">{{$value['quantity']}}</td>
                            <td data-label="Unit Price" class="tableitem">{{$value['price']}}</td>
                            <td data-label="Taxable Amount" class="tableitem">46.6</td>
                            <td data-label="Tax Code" class="tableitem">DP20</td>
                            <td data-label="%" class="tableitem">20</td>
                            <td data-label="Tax Amount" class="tableitem">9.32</td>
                            <td data-label="Total" class="tableitem">{{number_format($value['total_amount'])}}</td>
                        </tr>
                         @endforeach
                        <tr>
                            <td colspan="6" style="font-weight:bold;">Total Qty: {{$orders['quantity']}}</td>
                            <td style="font-weight:bold;">Total Price: </td>
                            <td style="font-weight:bold;">{{number_format($orders['total_amount'],2)}}</td>
                        </tr>                        
                    </tbody>
                </table>
                <div>
                    <div>
                        <address>
                            <h2 id="supplier">Shoppershawk</h2>
                        <span id="address">Besthawk infosystem pvt ltd, sector-18, Noida</span><br><span id="country">India</span> - <span id="zip">201301</span><br><span id="tax_num">+91-8882137914</span><br>
                        </address>
                    </div>
                </div>
                <br><br><br>
                <table class="table">
                </table>
                <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">Our mailing address is:
                        <span class="email"><a href="mailto:info@shoppershawk.com">info@shoppershawk.com</a></span>
                    </p>
                </div>
                </footer>
            </div>
        </section>
   </body>
</html>