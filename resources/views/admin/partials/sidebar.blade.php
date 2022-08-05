<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <a href="{{url('admin/dashboard')}}">
            <img src="{{asset('public/admin/assets/img/logo-icon.png')}}" class="img-fluid" alt="">
        </a>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{Request::segment(2)=='dashboard'?'active':''}}">
                    <a href="{{url('admin/dashboard')}}">
						<i class="fas fa-columns"></i> 
						<span>Dashboard</span>
					</a>
                </li>
                <li class="{{Request::segment(2)=='banner'?'active':''}}">
                    <a href="{{url('admin/banner')}}">
						<i class="fas fa-images"></i> 
						<span> Manage Banners/ADs </span>
                    </a>
                </li>
                <li class="{{Request::segment(2)=='category'?'active':''}}">
                    <a href="{{url('admin/category')}}"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
                </li>
                <li class="{{Request::segment(2)=='brand'?'active':''}}">
                    <a href="{{url('admin/brand')}}"><i class="fab fa-buffer"></i> <span>Brand</span></a>
                </li>
                <li class="{{Request::segment(2)=='color'?'active':''}}">
                    <a href="{{url('admin/color')}}"><i class="fas fa-palette"></i> <span>Color</span></a>
                </li>
                <li class="{{Request::segment(2)=='product'?'active':''}}">
                    <a href="{{url('/admin/product')}}"><i class="fas fa-bullhorn"></i> <span>Products</span></a>
                </li>
                <li class="{{Request::segment(2)=='orders'?'active':''}}">
                    <a href="{{url('admin/orders')}}">
						<i class="far fa-calendar-check"></i> 
						<span>Orders</span>
					</a>
                </li>
                <li class="{{Request::segment(2)=='notification'?'active':''}}">
                    <a href="{{url('admin/notification')}}">
						<i class="far fa-bell"></i>
						<span>Notification</span>
					</a>
                </li>
                <li class="{{Request::segment(2)=='contactus'?'active':''}}">
                    <a href="{{url('admin/contactus')}}">
						<i class="fa fa-inbox" aria-hidden="true"></i>
						<span>Enquiry List</span>
					</a>
                </li>
                <li class="{{Request::segment(2)=='payment'?'active':''}}">
                    <a href="{{url('admin/payment')}}"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
                </li>
                <li class="{{Request::segment(2)=='coupon'?'active':''}}">
                    <a href="{{url('admin/coupon')}}"><i class="fas fa-ticket-alt"></i> <span>Coupons</span></a>
                </li>
                <li class="{{Request::segment(2)=='rating'?'active':''}}">
                    <a href="{{url('/admin/rating')}}"><i class="fas fa-star"></i> <span>Ratings&Review</span></a>
                </li>
                <li class="{{Request::segment(2)=='social_links'?'active':''}}">
                    <a href="{{url('admin/social_links')}}"><i class="fas fa-link"></i> <span>Social Links</span></a>
                </li>
                <li class="{{Request::segment(2)=='cmspages'?'active':''}}">
                    <a href="{{url('admin/cmspages')}}">
						<i class="fas fa-wallet"></i> 
						<span> Content Management </span>
					</a>
                </li>
                <li class="{{Request::segment(2)=='role'?'active':''}}">
                    <a href="{{url('/admin/role')}}"><i class="fas fa-user"></i><span>Role</span></a>
                </li>
                <li class="{{Request::segment(2)=='admin_users'?'active':''}}">
                    <a href="{{url('/admin/admin_users')}}"><i class="fas fa-user"></i> <span>Admin Users</span></a>
                </li>
                <li class="{{Request::segment(2)=='front_users'?'active':''}}">
                    <a href="{{url('/admin/front_users')}}"><i class="fas fa-users"></i> <span>Users</span></a>
                </li>
                <li class="{{Request::segment(2)=='user_logs'?'active':''}}">
                    <a href="{{url('admin/user_logs')}}"><i class="fas fa-user-tie"></i> <span>Logs</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
