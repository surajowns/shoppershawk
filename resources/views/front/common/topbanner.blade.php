<?php 

$topbanner=App\BannerModel::where('status',1)->where('type',1)->get();
$singlebanner=App\BannerModel::where('status',1)->where('type',2)->get();

?>
<section class="slider_section slider_s_one mb-60 mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12">
                <div class="swiper-container gallery-top">
                    <div class="slider_area swiper-wrapper">
                    @foreach($topbanner as $banner)
                        <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="{{url('public/banner/'.$banner['banner_image'])}}">
                            <div class="slider_content">
                                <a class="button" href="{{$banner['link']}}">DISCOVER NOW</a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        @foreach($topbanner as $title)
                        <div class="swiper-slide">
                            {{$title->title}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="s_banner col-lg-3 col-md-12">
                <!--banner area start-->
                <div class="sidebar_banner_area">
                @foreach($singlebanner as $single)
                    <figure class="single_banner mb-20">
                        <div class="banner_thumb">
                            <a href="{{$single['link']}}"><img src="{{url('public/banner/'.$single['banner_image'])}}" alt="" /></a>
                        </div>
                    </figure>
                @endforeach
                </div>
                <!--banner area end-->
            </div>
        </div>
    </div>
</section>