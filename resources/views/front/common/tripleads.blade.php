<?php 
   
   $triplebanner=App\BannerModel::where('status',1)->where('type',4)->get();

?>
<div class="banner_area banner_style2 mb-55">
    <div class="container">
        <div class="row">
        @foreach($triplebanner as $triple)
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                          <a href="{{$triple['link']}}"><img class="flip-box-img" src="{{url('public/banner/'.$triple['banner_image'])}}" alt="" /></a>
                        </div>
                    </figure>
                </div>
         @endforeach   
        </div>
    </div>
</div>