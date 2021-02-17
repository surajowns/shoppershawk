<?php 

$topbanner=App\BannerModel::where('status',1)->where('type',1)->get(); 
$singlebanner=App\BannerModel::where('status',1)->where('type',2)->get(); ?>
 <!--slider area start-->
<section class="slider_section slider_s_three mb-60 mt-20">
        <div class="slider_area slider3_carousel owl-carousel">
        @foreach($topbanner as $slider)
            <div class="single_slider d-flex align-items-center" data-bgimg="{{url('public/banner/'.$slider['banner_image'])}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="slider_content slider_c_three color_white">
                                <h3>new collection</h3>
                                <h1>new Arrivals <br> cellphone new model 2019</h1>
                                    <p>discount <span> -30% off</span> this week</p>
                                    <a class="button" href="shop.html">DISCOVER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach
        </div>
</section>
    <!--slider area end-->
