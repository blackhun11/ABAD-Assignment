<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>myRenovation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 
  @include('mainLayout.mainCSSAdminLTE')
  <link type="text/css" rel="stylesheet" href="{{asset('css/components-card.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('css/custom-card.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('vendors/inputlimiter/css/jquery.inputlimiter.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('vendors/chosen/css/chosen.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('vendors/multiselect/css/multi-select.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/themify/css/themify-icons.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/ionicons/css/ionicons.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/icon.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/widgets.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/Buttons/css/buttons.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/buttons.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/colorpicker_hack.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/j_timepicker/css/jquery.timepicker.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/clockpicker/css/jquery-clockpicker.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('vendors/fileinput/css/fileinput.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/pages/form_elements.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/pages/radio_checkbox.css')}}" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<style>
  ::-webkit-scrollbar { 
    display: none; 
}

  .no-print {
    display: none;
  }

  .chosen-choices{
    border-radius:0 !important; 
    border-shadow: none !important;
    border-color: #d2d6de !important;
}

  .content-wrapper{
    margin:0;
  }
</style>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="preloader" style=" position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 100000;
    backface-visibility: hidden;
    background: #ffffff;">
          <div class="preloader_img" style="width: 200px;
    height: 200px;
    position: absolute;
    left: 48%;
    top: 48%;
    background-position: center;
  z-index: 999999">
              <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
          </div>
      </div>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <div style="display:flex;">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="width : 0;">
      <!-- Sidebar toggle button-->      
      {{-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> --}}
      </a>
    </nav>
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b>Renovation</span>
    </a>
  </div>
  </header>
  
{{--buat 2 header --}}

  {{-- <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b>Renovation</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header> --}}

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  {{-- <aside class="main-sidebar" style="padding-top:50px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      @guest
      <div class="user-panel">
          <div class="pull-left image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            
          </div>
        </div>
      @else
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-dollar text-success"></i>Token : </a>
        </div>
      </div>
      @endguest
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside> --}}
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-top : 50px; background-color:white;">
    <!-- Main content -->
    <section class="content">
        @yield('content')
        <br>
        <br>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('mainLayout.footer')
  
  @include('mainLayout.mainJSAdminLTE')

  {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}

<script type="text/javascript" src="{{asset('js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/icons.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{asset('assets/js/pages/widget2.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('assets/vendors/circliful/js/jquery.circliful.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/raphael/js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/Buttons/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/Buttons/js/buttons.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/validval/js/jquery.validVal.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/form.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/datetime_piker.js')}}"></script>

<script type="text/javascript" src="{{asset('vendors/chosen/js/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/jquery-tagsinput/js/jquery.tagsinput.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/autosize/js/jquery.autosize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/inputmask/js/inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/inputmask/js/jquery.inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/fileinput/js/theme.js')}}"></script>
<script type="text/javascript" src="{{asset('js/pages/form_elements.js')}}"></script>

{{--  --}}





<!--end of plugin scripts-->


</body>

</html>

