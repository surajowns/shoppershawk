<section class="slider_section slider_s_three mt-20">
    <!-- start slider -->
    <div class="slider_area slider3_carousel owl-carousel">
        {{-- @foreach($topbanner as  $slider)
            <a href="{{$slider['link']}}">
                <div class="single_slider d-flex align-items-center"
                    data-bgimg="{{url('public/banner/'.$slider['banner_image'])}}">
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
        @endforeach --}}

        <a href="{{$topbanner[0]['link']}}">
            <div style="heigh"></div>
            <div class="single_slider d-flex align-items-center">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content slider_c_three color_white">
                                <img src="{{url('public/banner/'.$topbanner[0]['banner_image'])}}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <!-- end slider -->
</section>
