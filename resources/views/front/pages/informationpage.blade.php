@extends('front.master')
@section('title','{{$slug}}')
@section('content')
<div class="cart_page_bg">
        <div class="container">
           {!! $page['description'] !!}
        </div>
</div>
@endsection