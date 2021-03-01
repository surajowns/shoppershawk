@extends('front.master')
@section('title','{{$slug}}')
@section('content')
<div class="cart_page_bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
               {!! $page['description'] !!}
            </div>
            <div class="col-sm-2"></div>
          </div>
        </div>
</div>
@endsection