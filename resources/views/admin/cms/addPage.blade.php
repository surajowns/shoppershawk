@extends('admin.layouts.master')
@section('title','Create Page')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">        
                <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Title</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="title" value="" id="cname" placeholder="Enter Name" onkeyup = "convertToSlug()" autocomplete="off">
                                <span class="text-danger">{{$errors->first('title')}}</span>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="slug" type="text" value="" id="slug" placeholder="Enter Slug">
                                <span class="text-danger">{{$errors->first('slug')}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Banner</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="page_image" type="file">
                                <span class="text-danger">{{$errors->first('page_image')}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right">Description</label>
                            <div class="col-sm-9">
                                <textarea id="elm1" name="description"></textarea>
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-sm-12">
                            <div class="form-group row">
                                    
                                    <div class="col-sm-12 text-center">
                                    <button class="btn btn-primary " type="submit">Submit</button>
                                                                <a href="{{url('/admin/cmspages')}}" class="btn btn-link">Back</a>			</div>
                                </div>  
                            </div>
                        </div>                                    
                    </div>
                </div> 
                </form>                                                       
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection
@section('javascript')
   
<script src="{{url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/moment.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{url('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/bootstrapValidator.min.html')}}"></script>
<script src="{{url('public/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/select2.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/admin.js')}}"></script>

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
$('#slug').val($slug.toLowerCase());
return $slug.toLowerCase();

}
slug =  slug($('#cname').val());
}
</script> 
@stop
