<!-- Sidebar -->
<div class="sidebar" id="sidebar">
			<div class="sidebar-logo">
				<a href="{{url('admin/dashboard')}}">
					<img src="{{url('public/admin/assets/img/logo-icon.png')}}" class="img-fluid" alt="">
				</a>
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="{{Request::segment(2)=='dashboard'?'active':''}}">
							<a href="{{url('admin/dashboard')}}" ><i class="fas fa-columns"></i> <span>Dashboard</span></a>
						</li>
						<li class="{{Request::segment(2)=='banner'?'active':''}}">
								<a href="{{url('admin/banner')}}"><i class="fas fa-images"></i> <span> Manage Banners/ADs </span> </a>
								
							</li>
						<li class="{{Request::segment(2)=='category'?'active':''}}">
							<a href="{{url('admin/category')}}"><i class="fas fa-layer-group"></i> <span>Categories</span></a>
						</li>
						<li class="{{Request::segment(2)=='brand'?'active':''}}">
							<a href="{{url('admin/brand')}}"><i class="fab fa-buffer"></i> <span>Brand</span></a>
						</li>
						<li class="{{Request::segment(2)=='product'?'active':''}}">
							<a href="{{url('/admin/product')}}"><i class="fas fa-bullhorn"></i> <span>Products</span></a>
						</li>
						<li  class="{{Request::segment(2)=='orders'?'active':''}}">
							<a href="{{url('admin/orders')}}"><i class="far fa-calendar-check"></i> <span>Orders</span></a>
						</li>
						<li>
							<a href="{{url('admin/under-construction')}}"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
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
							<a href="{{url('admin/cmspages')}}"><i class="fas fa-wallet"></i> <span> Content Management</span></a>
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
						<!-- <li>
							<a href="service-providers.html"><i class="fas fa-user-tie"></i> <span> Service Providers</span></a>
						</li> 
						<li>
							<a href="settings.html"><i class="fas fa-cog"></i> <span> Settings</span></a>
						</li> -->
						<!-- <li class="submenu">
								<a href="#"><i class="fas fa-border-all"></i> <span> Application</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="chat.html">Chat</a></li>
									<li><a href="calendar.html">Calendar</a></li>
									<li><a href="inbox.html">Email</a></li>
								</ul>
							</li> -->
							<!-- <li class="menu-title"> 
								<span>Pages</span>
							</li>
							<li> 
								<a href="admin-profile.html"><i class="fas fa-user-plus"></i> <span>Profile</span></a>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fas fa-user-lock"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="login.html"> Login </a></li>
									<li><a href="register.html"> Register </a></li>
									<li><a href="forgot-password.html"> Forgot Password </a></li>
									<li><a href="lock-screen.html"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fas fa-exclamation-circle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="error-404.html">404 Error </a></li>
									<li><a href="error-500.html">500 Error </a></li>
								</ul>
							</li> -->
							<!-- <li> 
								<a href="users.html"><i class="fas fa-users"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="blank-page.html"><i class="far fa-file"></i> <span>Blank Page</span></a>
							</li>
							<li> 
								<a href="maps-vector.html"><i class="far fa-map"></i> <span>Vector Maps</span></a>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>
							<li> 
								<a href="components.html"><i class="fas fa-vector-square"></i> <span>Components</span></a>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fab fa-wpforms"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
									<li><a href="form-input-groups.html">Input Groups </a></li>
									<li><a href="form-horizontal.html">Horizontal Form </a></li>
									<li><a href="form-vertical.html"> Vertical Form </a></li>
									<li><a href="form-mask.html"> Form Mask </a></li>
									<li><a href="form-validation.html"> Form Validation </a></li>
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><i class="fas fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="tables-basic.html">Basic Tables </a></li>
									<li><a href="data-tables.html">Data Table </a></li>
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="javascript:void(0);"><i class="fas fa-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
		