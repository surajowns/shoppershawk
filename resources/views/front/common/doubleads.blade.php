<?php
    $doublebanner=App\BannerModel::where('status',1)->where('type',3)->get();

?>
<style>
.box-container {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    width: 100%;
}

.box-item {
    position: relative;
    -webkit-backface-visibility: hidden;
    max-width: 100%;
}
.flip-box {
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    perspective: 1000px;
    -webkit-perspective: 1000px;
}
.flip-box-back,
.flip-box-front {
    background-size: cover;
    background-position: center;
    -ms-transition: transform 0.7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform 0.7s cubic-bezier(0.4, 0.2, 0.2, 1);
    -webkit-transition: transform 0.7s cubic-bezier(0.4, 0.2, 0.2, 1);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}
.flip-box-front {
    -ms-transform: rotateX(0);
    -webkit-transform: rotateX(0);
    transform: rotateX(0);
    -webkit-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.flip-box:hover .flip-box-front {
    -ms-transform: rotateX(-180deg);
    -webkit-transform: rotateX(-180deg);
    transform: rotateX(-180deg);
    -webkit-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.flip-box-back {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    -ms-transform: rotateX(180deg);
    -webkit-transform: rotateX(180deg);
    transform: rotateX(180deg);
    -webkit-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.flip-box:hover .flip-box-back {
    -ms-transform: rotateX(0);
    -webkit-transform: rotateX(0);
    transform: rotateX(0);
    -webkit-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.flip-box .inner {
    position: absolute;
    left: 0;
    width: 100%;
    padding: 0;
    outline: 1px solid transparent;
    -webkit-perspective: inherit;
    perspective: inherit;
    z-index: 2;
    transform: translateX(-50%) translateZ(60px) scale(0.94);
    -webkit-transform: translateX(-50%) translateZ(60px) scale(0.94);
    -ms-transform: translateX(-50%) translateZ(60px) scale(0.94);
    top: 45%;
}
</style>
<div class="banner_area mb-55">
<div class="container">
    <div class="row">
        <?php $i=0;?>
    @foreach($doublebanner as $banner)
         <?php   if($i==1){
                $banner_image=$doublebanner->first()->banner_image;
         }else{
            $banner_image=$doublebanner->last()->banner_image;

         } ?>
        <div class="col-lg-6 col-md-6 mb-2">
               <div class="box-container">
                    <div class="box-item">
                        <div class="flip-box">
                            <div class="flip-box-front">
                                <a href="{{$banner['link']}}"><img class="flip-box-img" src="{{url('public/banner/'.$banner->banner_image)}}" alt="" /></a>
                            </div>
                            <div class="flip-box-back">
                                <a href="{{$banner['link']}}"><img class="flip-box-img" src="{{url('public/banner/'.$banner_image)}}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php $i++; ?>
        @endforeach
    </div>
</div>
</div>