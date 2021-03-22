@extends('admin.layouts.master')
@section('model_no','Add Product')
@section('content')
<div class="row">
<div class="col-xl-8 offset-xl-2">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-model_no">Add Product</h3>
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
        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="name" value="" id="model_no" placeholder="Enter Name"  onkeyup = "convertToSlug()" autocomplete="off" required>
            <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Slug</label>
			<div class="col-sm-9">
				<input class="form-control" name="slug" type="text" value="" id="productslug"  required placeholder="Enter Slug" autocomplete="off">
				<span class="text-danger">{{$errors->first('slug')}}</span>
			</div>
		</div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Type</label>
        <div class="col-sm-9">
            <select name="type" id="" class="form-control" required>
            <option value="5">--Select Type--</option>
                @foreach($type as $key=>$value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Model Number</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="model_no" value="" id="model_no" required placeholder="Enter Model Number" required  autocomplete="off" >
            <span class="text-danger">{{$errors->first('model_no')}}</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Category *</label>
        <div class="col-sm-9">
            <select name="supercategory_id" id="" class="form-control" required>
            <option value="">Select Category</option>
                @foreach($categories as $key=>$value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">SubCategory *</label>
        <div class="col-sm-9">
            <select   class="form-control" name="category_id"   required="required" >
             <option value="dedw">--Select Subcategory--</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Price</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="price" value="" id="price" required placeholder="Enter Price"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"  autocomplete="off">
            <span class="text-danger">{{$errors->first('price')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Selling Price</label>
       
        <div class="col-sm-9">
           <span>Including GST</span>
            <input class="form-control" type="text" name="selling_price" value="" id="selling_price" required placeholder="Enter Selling price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
            <span class="text-danger">{{$errors->first('selling_price')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">IGST In %</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="gst" value="" id="gst" required placeholder="Enter IGST " oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
            <span class="text-danger">{{$errors->first('gst')}}</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">In Stock</label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="qty" value="" id="title" placeholder="Enter Qty" required  required autocomplete="off">
            <span class="text-danger">{{$errors->first('qty')}}</span>
        </div>
        
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Specification</label>
        <div class="col-sm-9">
            <textarea class="form-control" type="text" name="specification" value="" id="editor" required placeholder="Product Description"  autocomplete="off"></textarea>
            <span class="text-danger">{{$errors->first('specification')}}</span>
        </div> 
    </div>

    <div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" type="text" name="description" value="" id="editor" placeholder="Product Description" required  autocomplete="off" style="height:250px;"></textarea>
            <span class="text-danger">{{$errors->first('description')}}</span>
        </div> 
    </div>
    <div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label">Product Image</label>
    <div class="col-sm-9">
        <input class="form-control" name="product_image" type="file" value="" id="product_image"  required placeholder="Enter ">
        <span class="text-danger">{{$errors->first('product_image')}}</span>
    </div>
</div>
<!-- <div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label">Variant Image</label>
    <div class="col-sm-9">
        <input class="form-control" name="image[0][]" type="file" value="" id="image" multiple required placeholder="Enter ">
        <span class="text-danger">{{$errors->first('image')}}</span>
    </div>
</div> -->

<div class="form-group row">
    
    <div class="col-sm-12 text-center">
    <button class="btn btn-primary" type="submit">Add Product</button>
                                <a href="{{url('/admin/product')}}" class="btn btn-link">Back</a></div>
</div>                                    
</div>
</div> 
</form>                       
        
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
$('#productslug').val($slug.toLowerCase());
return $slug.toLowerCase();

}
slug =  slug($('#model_no').val());
}
</script> 
@stop 
