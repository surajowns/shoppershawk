<div class="header_top">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <div class="Besthawk_message">
                <p>Get free shipping – In All Over in India</p>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="header_top_settings text-right">
                <ul>
                    <li><a href="{{url('/user/account')}}">Track Your Order</a></li>
                    <li>Hotline: <a href="tel:+919711600187">+91-971-160-0187</a></li>
                    <li><a href="mailto:care@shoppershawk.com;">care@shoppershawk.com</a></li>
                   @if(!Auth::check())
                    <li><a href="{{url('/login')}}">Login|Register</a></li>
                    <!-- <li><a href="{{url('/register')}}">Register</a></li> -->
                    @else
                    <li><a href="{{url('user/account')}}">Hi {{Auth::user()->name}}</a></li>
                    <li><a href="{{url('/user/logout')}}">Logout</a></li>
                    @endif

                   
                </ul>
            </div>
        </div>
    </div>
</div>