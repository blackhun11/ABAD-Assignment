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

  {{-- <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css"> --}}
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

  input[type=text] {
    display:block;
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('https://www.w3schools.com/howto/searchicon.png');
    background-position: 10px 5px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
  }

  input[type=text]:focus {
    display:flex;
    width: 100%%;
  }

  .showMore{
    display:flex; 
    justify-content:center;
  }

  a, .label{
    cursor: pointer;
  }

  .content-wrapper{
    margin:0;
  }

  </style>

<body>
    {{-- <div class="preloader" style=" position: fixed;
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
      </div> --}}
<div class="wrapper">
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
  <header class="main-header" style="top:0; left:0; right:0; position:fixed;">

  
      <link href="{{asset('assets/css/bootstrapv3.3.6.css')}}" rel="stylesheet">
  
      <script src="{{asset('assets/js/jqueryv1.9.1.js')}}"></script>
    
      <script src="{{asset('assets/js/typeahead.js')}}"></script>  
    
      <form>
          <input type="text" id= "search_text" class="form-control" placeholder="search" ></input>
      </form>
  </header>
  
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:50px; background-color:white;">
    <!-- Main content -->
    <section class="content">


      @yield('content')
      <br>
      <br>
      <br>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  @include('mainLayout.footer')
  
</body>

    <script type="text/javascript">

$(document).ready(function(){    
    $("#search_text").typeahead({
         source: function(query, process) {

                $.ajax({
                 url: '{{ route('searchAjax') }}',
                 data: {
                     query:$("#search_text").val()
                     
                     },
                 type: 'POST',
                 dataType: 'JSON',
                 success: function(data) {
                            console.log();
                            process(data);
                        } ,          
                    });
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                    });
         },
    });
}); 

  </script>
</html>

