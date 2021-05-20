@extends('front.master')
@section('title','Cart')
@section('content')
<div class="cart_page_bg">
    <div class="container">
        <section>
           @include('front.common.categories')

        </section>
        </div>
    </div>
@endsection
@section('javascript')
<script>
    $('.input-number').keyup(function(){
        var value=$(this).val();
        var productid= $(this).data('productid');
    // value++;
    $.ajax({
            Type:"POST",
            url : '{{url("/user/updatecart")}}',
            dataType:'json',
            cache: true,
            data: {value:value,productid:productid},
            success: function(response){
            if(response.status == 'error'){
            toastr.warning("error");
            }
            else{
                location.reload();
            
            }
            }
        })
    })

</script>
@stop