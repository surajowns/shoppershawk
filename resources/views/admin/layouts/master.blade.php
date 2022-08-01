<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>@yield('title')</title>
      <!-- Favicons -->
      <link rel="shortcut icon" href="{{asset('public/admin/assets/img/favicon.png')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/fontawesome/css/all.min.css')}}">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="{{asset('public/admin/assets/css/animate.min.css')}}">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{asset('public/admin/assets/css/admin.css')}}">
      @livewireStyles
   </head>
   <style>
      #DataTables_Table_0_filter{
      text-align: right;
      }
   </style>
   <?php 
      // $notification=App\NotificationModel::with('users')
      // ->where(['is_seen' => 0, 'trash' => 0, 'status' => 1])
      // ->get();
   ?>
   <body>
      <div class="main-wrapper">
         <!-- Header -->
            <livewire:admin.notification />
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
                  		{{-- <h3 class="page-title">{{@message}}!</h3> --}}
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
      <script src="{{asset('public/admin/assets/js/jquery-3.5.0.min.js')}}"></script>
      <!-- Bootstrap Core JS -->
      <script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
      <script src="{{asset('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- Slimscroll JS -->
      <script src="{{asset('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
      <!-- Custom JS -->
	  @if(Request::segment(2)=='dashboard' or substr(Request::segment(3),0,3)=='add'  or Request::segment(2)=='notification' )
      <script src="{{asset('public/admin/assets/js/admin.js')}}"></script>
	  @endif
      <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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
      @livewireScripts
   </body>
</html>