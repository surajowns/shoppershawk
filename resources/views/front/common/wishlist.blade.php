@extends('front.master')
@section('title','Wishlist')
@section('content')
<div class="wishlist_page_bg">
        <div class="container">
        @if(!empty($products))
            <div class="wishlist_area">
                <div class="wishlist_inner">
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc wishlist">
                                    <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product_remove">Remove</th>
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product Name</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product_quantity">Stock Status</th>
                                                    <th class="product_total">Add To Cart</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $details)
                                                <tr class="removefromwishlist">
                                                    <td class="product_remove"><a  class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}"><i class="fa fa-trash-o"></i></a></td>
                                                    <td class="product_thumb"><a href="{{url('/product_details/'.$details['slug'])}}"><img src="{{url('public/product_image/'.$details['product_image'][0]['image'])}}" alt=""></a></td>
                                                    <td class="product_name"><a href="{{url('/product_details/'.$details['slug'])}}">{{$details['name']}}</a></td>
                                                    <td class="product-price">₹{{number_format($details['selling_price'],2)}}</td>
                                                    <td class="product_quantity">
                                                        @if($details['qty']>0)
                                                         In Stock
                                                         @else
                                                         Out of Stock
                                                        @endif
                                                    </td>
                                                    <td class="product_total">
                                                    @if($details['qty'] != 0)
                                                       <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$details['id']}}">Add to cart</a>
                                                    @endif
                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-sm-12 text-center">
                   <img src="{{url('/public/front/img/emptywish.jpg')}}" alt="">
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection