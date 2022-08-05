<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="Besthawk_message">
                        <p>Get free shipping – In All over in India</p>
                    </div>
                    <div class="header_top_settings text-right">
                        <ul>
                            <li><a href="#">Track Your Order</a></li>
                            <li>Hotline: <a href="tel:+919711600187">+91-971-160-0187</a></li>
                        </ul>
                        <div class="order_button mt-20">
                            @if(!Auth::check())
                                <a class="btn btn-danger" href="{{url('/login')}}">Login|Register</a>
                            @else
                                <a href="{{url('/user/account')}}">Hi {{Auth::user()->name}}</a></li>
                                <a class="btn btn-danger" href="{{url('/user/logout')}}">Logout</a></li>
                            @endif
                        </div>
                    </div>
                    <div id="menu" class="text-left">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <span class="menu-expand">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <a href="javascript:void(0)">Category</a>
                                <ul class="sub-menu" style="display: none;">
                                    @foreach($categories as $cat)
                                        <li class="menu-item-has-children">
                                            <span class="menu-expand">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a>
                                            <ul class="sub-menu" style="display: none;">
                                                @foreach($subcategories as $subcat)
                                                    @if($cat['id']==$subcat['parent_id'])
                                                        <li>
                                                            <a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">
                                                                {{$subcat['name']}}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="{{url('/user/account')}}">my account</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('user/contactus')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="Offcanvas_footer">
                        <span>
                            <a href="#"><i class="fa fa-envelope-o"></i>care@Shoppershawk.com</a>
                        </span>
                        <ul>
                            @if(count($sociallinks)>0)
                                @foreach($sociallinks as $row)
                                    <li class="{{strtolower($row->title)}}">
                                        <a class="{{strtolower($row->title)}}" href="{{$row->links}}" target="_blank">
                                            <i class="fa fa-{{strtolower($row->title)}}"></i>
                                        </a>
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