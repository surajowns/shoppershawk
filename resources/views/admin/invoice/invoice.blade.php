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
         border-bottom: 1px solid #333;
         }
         tr th{
          font-size:15px
         }
         td{
          font-size:10px
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
        <section class="user-dashbord" style="margin-top:200px;">
            <div class="container">
                 
                <table class="table">
                <th><img src="http://shoppershawk.com/public/front/img/logo/logo.png" alt="Logo" /></th>
                <th><h3 class="text-center" style="text-align:center">Tax Invoice</h3></th>
                </table>
                <table class="table" style="border: 1px solid #333;">
                    <thead>
                        <tr>
                            <th>
                                <h6>Order Id:&nbsp;&nbsp;{{$orders['order_no']}}</h6>
                                <h6>Order Date:&nbsp;&nbsp;{{date('d/m/Y',strtotime($orders['created_at']))}}</h6>
                                
                            </th>
                            <th>
                                <h6>Invoice No:&nbsp;00000{{$orders['id']}}</h6>
                                <h6>Invoice Date:{{date('d/m/Y',strtotime($orders['created_at']))}}</h6>
                            </th>
                            <th>
                                <h6>GSTIN:&nbsp;07AAECB3642C1Z5</h6>
                                <h6>PAN:&nbsp;AAECB3642C</h6>
                            </th>
                        </tr>
                    </thead>
                </table>
                <table class="table" style="border: 1px solid #333;">
                    <thead>
                        <tr>
                            <th>
                                <h6>Shipping Address</h6>
                            </th>
                            <th>
                                <h6>Billing Address</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                   <h6> Name: {{$orders['shipping_name']?$orders['shipping_name']:$orders['billing_name']}}</h6>
                                   <h6> Email: {{$orders['shipping_email']?$orders['shipping_email']:$orders['billing_email']}}</h6>
                                   <h6>  Phone: {{$orders['shipping_mobile']?$orders['shipping_mobile']:$orders['billing_mobile']}}</h6>
                                   <h6>  Address:  {{$orders['shipping_address']?$orders['shipping_address']:$orders['billing_address']}}</h6>
                                   <h6>  Landmark:  {{$orders['shipping_landmark']?$orders['shipping_landmark']:$orders['billing_landmark']}}</h6>
                                   <h6> State:  {{$orders['shipping_state']?$orders['shipping_state']:$orders['billing_state']}}</h6>
                                   <h6>  Pincode:  {{$orders['shipping_pincode']?$orders['shipping_pincode']:$orders['billing_pincode']}}</h6>
                                   <h6>@if($orders['gst_no'] !=null )GSTIN:{{$orders['gst_no']}} @endif</h6>
                                </td>
                            <td>
                                <h6>   Name: {{$orders['billing_name']}}</h6>
                                <h6>    Email: {{$orders['billing_email']}}</h6>
                                <h6>    Phone: {{$orders['billing_mobile']}}</h6>
                                <h6>  Address:  {{$orders['billing_address']}}</h6>
                                <h6>   Landmark:  {{$orders['billing_landmark']}}</h6>
                                <h6>   State:  {{$orders['billing_state']}}</h6>
                                <h6>    Pincode:  {{$orders['billing_pincode']}}</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table" style="border: 1px solid #333;">
                    <thead>
                        <tr>
                           <!-- <th>S.N</th> -->
                            <th><h6> Product </h6></th>
                            <th><h6>HSN</h6></th>
                            <th><h6>IGST rate</h6></th>
                            <th><h6>Qty</h6></th>
                            <th><h6>Gross Amount</h6></th>
                            <th><h6>Discount</h6></th>
                            <th><h6>Net Amount</h6></th>
                            <th><h6>Taxable</h6></th>
                            <th><h6>CGST</h6></th>
                            <th><h6>SGST</h6></th>
                            <th><h6>IGST</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetails as $value)
                        <tr class="list-item">
                            <td data-label="product" class="tableitem">{{$value['products'][0]['name']}}</td>
                            <td>{{$value['products'][0]['hsn_no']}}</td>
                            <td>{{$value['products'][0]['gst']}}&nbsp;%</td>
                            <td data-label="Quantity" class="tableitem">{{$value['quantity']}}</td>
                            <td data-label="Unit Price" class="tableitem">{{number_format($value['price'],2)}}</td>
                            <td data-label="discount">{{number_format($value['quantity']*$discount,2)}}</td>
                            <td data-label="net amount">{{number_format($value['price']-($value['quantity']*$discount),2)}}</td>

                            <td data-label="taxable">{{number_format(($value['price']-($value['quantity']*$discount))/1.18,2)}}</td>

                            <!-- <td data-label="Unit Price">{{number_format(($value['price']/1.18)-($value['quantity']*$discount),2)}}</td> -->
                            <td data-label="sgst"> @if($orders['shipping_state']?$orders['shipping_state']:$orders['billing_state']=='Delhi'){{number_format(((($value['price']-($value['quantity']*$discount))/1.18)*18/100)/2,2)}} @else 00.00 @endif</td>
                            <td data-label="cgst">@if($orders['shipping_state']?$orders['shipping_state']:$orders['billing_state']=='Delhi'){{number_format(((($value['price']-($value['quantity']*$discount))/1.18)*18/100)/2,2)}} @else 00.00 @endif</td>
                            <td data-label="gst" class="tableitem">{{number_format((($value['price']-($value['quantity']*$discount))/1.18)*18/100,2)}}</td>
                            <!-- <td data-label="Total" class="tableitem">{{number_format((($value['price']/1.18)-($value['quantity']*$discount))+(($value['price']/1.18)-($value['quantity']*$discount))*18/100,2)}}</td> -->
                        </tr>
                         @endforeach
                        <tr>
                            <td colspan="3" style="font-weight:bold;">Total Qty: {{$orders['quantity']}}</td>
                            <td colspan="4" style="font-weight:bold;">Additional charges:00.00</td>
                            <td  colspan="4" style="font-weight:bold;">Total Price(INR):&nbsp;{{number_format($orders['total_amount'],2)}}</td>
                        </tr>                        
                    </tbody>
                </table>
                <div style="margin-top:20px">
                    <div>
                         <h5 id="supplier">Shoppers Hawk</h5>
                         <h6>  <span id="address">F-133/2, A.F Enclave Part 2,Shaheen Bagh,Jamia Nagar,Delhi, 110025</span><br><span id="country">India</span></span><br><span id="tax_num">+91 120-2514786</span><br></h6>
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