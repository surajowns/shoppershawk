<!--slider area start-->
<section class="slider_section slider_s_three mt-20">
    <div class="slider_area slider3_carousel owl-carousel">
    <?php  App\BannerModel::where('status',1)->where('type',1)->chunk(2,function($topbanner){
      foreach($topbanner as  $slider ){?>
        <a href="{{$slider['link']}}">
            <div class="single_slider d-flex align-items-center" data-bgimg="{{url('public/banner/'.$slider['banner_image'])}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="slider_content slider_c_three color_white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        <?php }}); ?>
        </div>
</section>
    <!--slider area end-->
