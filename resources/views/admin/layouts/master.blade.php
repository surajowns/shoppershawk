<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>@yield('title')</title>
      <!-- Favicons -->
      <link rel="shortcut icon" href="{{url('public/admin/assets/img/favicon.png')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{url('public/admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
      <link rel="stylesheet" href="{{url('public/admin/assets/plugins/fontawesome/css/all.min.css')}}">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="{{url('public/admin/assets/css/animate.min.css')}}">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{url('public/admin/assets/css/admin.css')}}">
   </head>
   <style>
      #DataTables_Table_0_filter{
      text-align: right;
      }
   </style>
   <?php 
      $notification=App\NotificationModel::with('users')->where('is_seen',0)->where('trash',0)->where('status',1)->get();
      
      ?>
   <body>
      <div class="main-wrapper">
         <!-- Header -->
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
                  <i class="far fa-bell"></i>@if($notification->count()==0)@else<span class="badge badge-pill"></span>@endif
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
         <!-- /Header -->
         <!-- Sidebar -->
         @include('admin.partials.sidebar')
         <!-- /Sidebar -->
         <div class="page-wrapper">
            <div class="content container-fluid">
               @include('message')
               <!-- Page Header -->
               <!-- <div class="page-header">
                  <div class="row">
                  	<div class="col-12">
                  		<h3 class="page-title">{{@message}}!</h3>
                  	</div>
                  </div>
                  </div> -->
               <!-- /Page Header -->
               <!-- content render -->
               @yield('content')
               <!-- /content render -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{url('public/admin/assets/js/jquery-3.5.0.min.js')}}"></script>
      <!-- Bootstrap Core JS -->
      <script src="{{url('public/admin/assets/js/popper.min.js')}}"></script>
      <script src="{{url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- Slimscroll JS -->
      <script src="{{url('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
      <!-- Custom JS -->
	  @if(Request::segment(2)=='dashboard' or substr(Request::segment(3),0,3)=='add'  or Request::segment(2)=='notification' )
      <script src="{{url('public/admin/assets/js/admin.js')}}"></script>
	  @endif
      <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
      @yield('javascript')
      <script> 
         // $(document).ready(function () { 
         
             $('li').click(function (e) { 
         // alert('dfdfbd')
                 $('li').removeClass('active'); 
                 $(this).addClass('active'); 
         // alert('dfdfd');
             }); 
         // }); 
      </script> 
      <script>
         CKEDITOR.replace('specification' );
      </script>
      <script>
         CKEDITOR.replace('comment' );
      </script>
      <script>
         CKEDITOR.replace('description' );
      </script>
   </body>
</html>