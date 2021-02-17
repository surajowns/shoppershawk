<?php 

$topbanner=App\BannerModel::where('status',1)->where('type',1)->get(); 
$singlebanner=App\BannerModel::where('status',1)->where('type',2)->get(); ?>
<section class="slider_section slider_s_three mb-60 mt-20">
    <div class="slider_area slider3_carousel owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 9443px;">
               @foreach($topbanner as $slider)
               <div class="owl-item" style="width: 1349px;">
                    <div class="single_slider d-flex align-items-center" data-bgimg="{{url('public/banner/'.$slider['banner_image'])}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="slider_content slider_c_three color_white">
                                        <h3>new collection</h3>
                                        <h1>
                                            new Arrivals <br />
                                            cellphone new model 2019
                                        </h1>
                                        <p>discount <span> -30% off</span> this week</p>
                                        <a class="button" href="{{$slider['link']}}">DISCOVER NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="owl-nav disabled">
            <div class="owl-prev">prev</div>
            <div class="owl-next">next</div>
        </div>
        <div class="owl-dots">
            <div class="owl-dot active"><span></span></div>
            <div class="owl-dot"><span></span></div>
            <div class="owl-dot"><span></span></div>
        </div>
    </div>
</section>
