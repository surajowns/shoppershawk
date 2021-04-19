@extends('front.master')
@section('title','{{$slug}}')
@section('content')
<div class="cart_page_bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
               {!! $page['description'] !!}
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
</div>
@endsection