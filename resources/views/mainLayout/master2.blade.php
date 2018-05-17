<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>myRenovation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  @include('mainLayout.mainCSSAdminLTE')
  <link type="text/css" rel="stylesheet" href="{{asset('css/components-card.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('css/custom-card.css')}}" />
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
  <link type="text/css" rel="stylesheet" href="{{asset('vendors/sweetalert/css/sweetalert2.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/pages/sweet_alert.css')}}"/>
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


/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #367fa9;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

  .showMore{
    display:flex; 
    justify-content:center;
  }

  a, .label{
    cursor: pointer;
    color:white;
  }

  .content-wrapper{
    margin:0;
  }

  /* .content{
    background-color: whitesmoke;
  } */

  .box-header.with-border{
  background-color: #367fa9;
  }

  .title{
    font-weight:bold; 
    margin:0;
  }

  .secTitle{
    color:#7aa8d1;
    margin:0;
  }

  </style>

<body>

<div class="wrapper" style="background-color:#ecf0f5;">
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
  <header class="main-header" style="top:0; left:0; right:0; position:fixed; background-color:#3399FF;">
    @yield('header')
  </header>
  
      

  <div class="content-wrapper" style="margin-top:39px; ">

    <section class="content" style="padding-top:0;">

      @yield('content')
      <br>
      <br>
      <br>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
  <script src="../../dist/js/adminlte.min.js"></script>
  
  <script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert2.min.js')}}" defer></script>

  @yield('footer')
  
</body>

</html>

