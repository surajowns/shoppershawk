@extends('front.master')
@section('title','Cart')
@section('content')
<div class="cart_page_bg">
    <div class="container">
        <section>
            <div class="container">
      <div class="row">
        @foreach($category as $cat)
        <div class="col-md-3 col-sm-6">
            <div class="service_box">
                <div class="service_icon">
                 <a href="{{url('/products/'.'?cat='.$cat['slug'])}}"><img src="{{url('public/category/'.$cat['image'])}}" alt="" /></a>

                </div>
                <h3><a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a></h3>
                <p> @foreach($subcategories as $subcat)
                                @if($cat['id']==$subcat['parent_id']) 
                                    <a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}&nbsp;&nbsp;</a>
                                @endif
                     @endforeach</p>
            </div>
        </div>
     @endforeach
    </div>
</div>
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