@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
<div class="row">
<div class="col-xl-8 offset-xl-2">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Update Product</h3>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="card">
    <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
<div class="col-lg-12">
<div class="form-group row">
        <div class="col-sm-9">
            <input class="form-control" type="hidden" name="id" value="{{$product['id']}}" id="title" placeholder="Enter Name" value=""   autocomplete="off">
            <span class="text-danger">{{$errors->first('id')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="{{$product['name']}}" id="edittitle" onkeyup = "convertToSlug()" placeholder="Enter Name" required autocomplete="off">
            <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Slug</label>
			<div class="col-sm-9">
				<input class="form-control" name="slug" type="text" value="{{$product['slug']}}" id="editproductslug"   placeholder="Enter Slug ">
				<span class="text-danger">{{$errors->first('slug')}}</span>
			</div>
		</div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Type</label>
        <div class="col-sm-9">
            <select name="type" id="" class="form-control" required>
            <option value="">--Select Type--</option>
                @foreach($type as $key=>$value)
                <option value="{{ $value->id }}" {{$value->id==$product['type']?"selected":""}}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Brand</label>
        <div class="col-sm-9">
            <select name="brand" id="" class="form-control" required>
            <option value="">--Select Brand--</option>
                @foreach($brand as $key=>$value)
                <option value="{{ $value->id }}" {{$value->id==$product['brand']?"selected":""}}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Model Number</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="model_no" value="{{$product['model_no']}}" id="title" required placeholder="Enter Model Number" required  autocomplete="off">
            <span class="text-danger">{{$errors->first('model_no')}}</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Hsn Number</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="hsn_no" value="{{$product['hsn_no']}}" id="hsn_no" required placeholder="Enter HSN Number" required  autocomplete="off" >
            <span class="text-danger">{{$errors->first('hsn_no')}}</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Category *</label>
        <div class="col-sm-9">
            <select name="supercategory_id" id="" class="form-control" required>
            <option value="">Select Category</option>
                @foreach($categories as $key=>$value)
                <option value="{{ $value->id }}"  {{$value->id==$product['supercategory_id']?"selected":""}}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">SubCategory *</label>
        <div class="col-sm-9">
            <select   class="form-control" name="category_id"   required="required" >
            @foreach($subcategories as $key=>$value)
                <option value="{{ $value->id }}"  {{$value->id==$product['category_id']?"selected":""}}>{{ $value->name }}</option>
                @endforeach           
         </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Price</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="price" value="{{$product['price']}}" id="title" required placeholder="Enter Price"  autocomplete="off">
            <span class="text-danger">{{$errors->first('price')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Selling Price</label>
        <div class="col-sm-9">
        <span>Including GST</span>
            <input class="form-control" type="text" name="selling_price" value="{{$product['selling_price']}}" id="title" required placeholder="Enter Selling price" onkeyup = "convertToSlug()" autocomplete="off">
            <span class="text-danger">{{$errors->first('selling_price')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">IGST In %</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="gst" value="{{$product['gst']}}" id="gst" required placeholder="Enter IGST " oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
            <span class="text-danger">{{$errors->first('gst')}}</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">In Stock</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="qty" value="{{$product['qty']}}" id="title" placeholder="Enter Qty" required  required autocomplete="off">
            <span class="text-danger">{{$errors->first('qty')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Specification</label>
        <div class="col-sm-9">
            <textarea class="form-control" type="text" name="specification" value="{{$product['specification']}}" id="editor" required placeholder="Product Description"  autocomplete="off">{{$product['specification']}}</textarea>
            <span class="text-danger">{{$errors->first('specification')}}</span>
        </div> 
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" type="text" name="description" value="{{$product['description']}}" id="editor" placeholder="Product Description" required  autocomplete="off" style="height:250px;">{{$product['description']}}</textarea>
            <span class="text-danger">{{$errors->first('description')}}</span>
        </div> 
    </div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label">Image</label>
    <div class="col-sm-9">
        <input class="form-control" name="image[]" type="file" value="" id="image" multiple  placeholder="Enter ">
        <span class="text-danger">{{$errors->first('image')}}</span>
    </div>
</div>

<div class="form-group row">
    
    <div class="col-sm-12 text-center">
    <button class="btn btn-primary" type="submit">Edit Product</button>
                                <a href="{{url('/admin/product')}}" class="btn btn-link">Back</a></div>
</div>                                    
</div>
</div> 
</form> 
<label for="inputEmail3" class="col-sm-12 col-form-label">Product Preview</label>
<div class="row">
 @foreach($productimage as $images)
             <div class="col-sm-3">
             <a class="whRemove delete_wish_list_item removeitem" href="{{url('admin/remove-image/'.$images['id'])}}" onclick="if(!window.confirm('Do You Want to Delete ?')) return false;"  title="Remove Item" data="{{$images['id']}}"><i class="fa fa-times"></i></a>
            <img src="{{url('public/product_image/'.$images['image'])}}" alt="" style="width: 80px;height:80px; border: 2px solid" class="img-responsive">
            </div>
            @endforeach   
    </div>
</div>
</div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="supercategory_id"]').on('change', function() {
          
            var catID = $(this).val();
          
            if(catID) {
               $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                $.ajax({
                    url: '{{ url('admin/getcategory') }}/'+catID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="category_id"]').empty();
                        $('select[name="category_id"]').append('<option value="">Select SubCategory</option>');
                        $.each(data, function(key, value) {
                        $('select[name="category_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            
                        });


                    }
                });
            }else{
                $('select[name="category_id"]').append('<option value="">Select SubCategory</option>');
            }
        });
    });
</script> 
<script>
function convertToSlug()
{ 
    // alert('dvfdvf');
var slug = function(str) {
var $slug = '';
var trimmed = $.trim(str);
$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
replace(/-+/g, '-').
replace(/^-|-$/g, '');
$('#editproductslug').val($slug.toLowerCase());
return $slug.toLowerCase();

}
slug =  slug($('#edittitle').val());
}
</script> 
@stop 
