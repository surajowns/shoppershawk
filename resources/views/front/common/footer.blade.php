<?php 

  $pages=App\CMSModel::get();
  $sociallinks=App\SocialLinksModel::where('status',1)->get();

?>
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-7">
                    <div class="widgets_container contact_us">
                        <h1 id="widgets_containersforgettheapp">GET THE APP</h1>
                        <div class="aff_content">
                            <p><strong>Shoppers Hawk</strong> App is now available on Google Play & App Store. Get it now.</p>
                        </div>
                        <div class="app_img">
                            <figure class="app_img">
                                <a href="#"><img src="{{url('public/front/img/icon/icon-appstore.png')}}" alt="app store" /></a>
                            </figure>
                            <figure class="app_img">
                                <a href="#"><img src="{{url('public/front/img/icon/icon-googleplay.png')}}" alt="google play" /></a>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                            @if(count($pages)>0)
                              @foreach($pages as $page)
                                <li><a href="{{url('/pages/'.$page->slug)}}">{{$page->title}}</a></li>
                                @endforeach
                             @endif   
                                <li><a href="{{url('/user/contactus')}}">Contact Us</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url('/user/account')}}">My Profile</a></li>
                                <li><a href="{{url('user/wishlist_details')}}">My Wishlist</a></li>
                                <li><a href="{{url('user/cart_details')}}">My Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-12">
                    <div class="widgets_container">
                        <h3>CONTACT INFO</h3>
                        <div class="footer_contact">
                            <div class="footer_contact_inner">
                                <div class="contact_icone">
                                    <img src="{{url('public/front/img/icon/icon-phone.png')}}" alt="+91-971-160-0187" />
                                </div>
                                <div class="contact_text">
                                    <p>
                                        Hotline Free 24/7: <br />
                                        <strong><a href="tel:+919711600187">+91-971-160-0187</a></strong>
                                        <strong><a href="mailto:care@shoppershawk.com;">care@shoppershawk.com</a></strong>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="footer_social">
                            <ul>
                             @if(count($sociallinks)>0)
                               @foreach($sociallinks as $row)
                                <li>
                                    <a class="{{strtolower($row->title)}}" href="{{$row->links}}" target="_blank"><i class="fa fa-{{strtolower($row->title)}}"></i></a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2021 <a href="https://www.besthawk.com/" target="_blank">Best Hawk Infosystems Pvt. Ltd.</a> All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment" style="text-align: right;">
                        <img src="{{url('public/front/img/icon/payment.png')}}" alt="payment options" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>