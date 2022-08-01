<div class="header">
    <div class="header-left"> 
       <a href="{{url('admin/dashboard')}}" class="logo logo-small">
       <img src="{{url('public/admin/assets/img/logo-icon.png')}}" alt="Logo" width="30" height="30">
       </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
    <i class="fas fa-align-left"></i>
    </a>
    <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
    <i class="fas fa-align-left"></i>
    </a>
    <ul class="nav user-menu">
       <!-- Notifications -->
       <li class="nav-item dropdown noti-dropdown">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
          <i class="far fa-bell"></i>@if(count($notification)==0)@else<span class="badge badge-pill"></span>@endif
          </a>
          <div class="dropdown-menu dropdown-menu-right notifications">
             <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
             </div>
             <div class="noti-content">
                <ul class="notification-list">
                   @foreach($notification as $value)
                   <li class="notification-message">
                      <a href="{{url('admin/notification/seenORnotseen/'.$value['id'])}}">
                         <div class="media">
                            <span class="avatar avatar-sm">
                            @if($value->users[0]['profile_image'])
                               <img class="avatar-img rounded-circle" alt="" src="{{url('public/profile/'.$value->users[0]['profile_image'])}}">
                            @else
                               <img class="avatar-img rounded-circle" alt="" src="{{url('public/admin/images/'.Auth::User()->profile_image)}}">
                            @endif
                            </span>
                            <div class="media-body">
                               <p class="noti-details">
                                  <span class="noti-title">{{$value['content']}}</span>
                               </p>
                               <p class="noti-time">
                                  <span class="notification-time">{{date('d M Y h:i A',strtotime($value['created_at']))}}</span>
                               </p>
                            </div>
                         </div>
                      </a>
                   </li>
                   @endforeach
                </ul>
             </div>
             <div class="topnav-dropdown-footer">
                <a href="{{url('/admin/notification')}}">View all Notifications</a>
             </div>
          </div>
       </li>
       <!-- /Notifications -->
       <!-- User Menu -->
       <li class="nav-item dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
          <span class="user-img">
          <img class="rounded-circle" src="{{url('public/admin/images/'.Auth::User()->profile_image)}}" width="40" alt="Admin">
          </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
             <a class="dropdown-item" href="{{url('/admin/profile')}}">Profile</a>
             <a class="dropdown-item" href="{{url('/admin/logout')}}">Logout</a>
          </div>
       </li>
       <!-- /User Menu -->
    </ul>
 </div>