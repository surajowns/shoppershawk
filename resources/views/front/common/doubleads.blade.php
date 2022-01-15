<?php
    $doublebanner=App\BannerModel::where('status',1)->where('type',3)->get();

?>
<div class="banner_area mb-55">
<div class="container">
    <div class="row">
    @foreach($doublebanner as $banner)
            <div class="col-lg-6 col-md-6">
                <figure class="single_banner">
                    <div class="banner_thumb">
                    <a href="{{$banner['link']}}"><img class="flip-box-img" src="{{url('public/banner/'.$banner->banner_image)}}" alt="{{$banner['title']}}" /></a>
                    </div>
                </figure>
            </div>
        @endforeach
    </div>
</div>
</div>