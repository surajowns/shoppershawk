<?php
    $singlebanner=App\BannerModel::where('status',1)->where('type',2)->orderBy('id','DESC')->limit(1)->get();

?>
@if(!empty($singlebanner))
<div class="banner_area mb-55">
<div class="container">
    <div class="row">
    @foreach($singlebanner as $banner)
            <div class="col-lg-12 col-md-12">
                <figure class="single_banner">
                    <div class="banner_thumb">
                    <a href="{{$banner['link']}}"><img class="flip-box-img" src="{{url('public/banner/'.$banner['banner_image'])}}" alt="" /></a>
                    </div>
                </figure>
            </div>
        @endforeach
    </div>
</div>
</div>
@endif