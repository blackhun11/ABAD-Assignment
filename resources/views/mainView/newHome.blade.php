@extends('mainLayout.master')

@section('content')

<style>
  .item{
    width:100%; 
    height : 160px; 
    object-fit:cover;
  }
</style>

<div class="bg-warning m-t-35 header_align" style="background-color:#3399FF; margin:-15px; padding:21px;">
  <div class="row">
      <div class="col-lg-12 col-12">
          <div class="row" style="margin:0">
            <div>
                <h3 style="font-weight:bold; 
                          color:#fff; 
                          display: flex;justify-content:
                          flex-start;font-family: 
                          copperplate;font-size: 18px;">
                    Hire expert jobseeker for your renovation
                  </h3>
            </div>
          </div>
      </div>
  </div>

  <div style="display:flex; justify-content:center;">
      @guest
          <a href="{{ route('login') }}" class="button button-pill button-primary button-keren">I want to hire</a>   
      @else
          <a href="createProject" class="button button-pill button-primary button-keren">I want to hire</a>
      @endguest
  </div>
</div>

<div class="container" style="margin : 38px 0; padding : 0;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../../dist/img/user2-160x160.jpg" alt="Los Angeles">
      </div>

      <div class="item">
        <img src="../../dist/img/user2-160x160.jpg" alt="Chicago">
      </div>
    
      <div class="item">
        <img src="../../dist/img/user2-160x160.jpg" alt="New york">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  @guest
  <div style="text-align:center; margin:10px;">
      <a href="{{ url('projectList') }}">
    <button class="btn btn-primary" >Explore
      
      
      </button>
    </a>
    </div>
  
  @else
    <div style="display:flex; margin-top:20px; justify-content:space-between;">
    <label class = "rec">Recommended for you</label>
        <label>
        <a href="{{ url('projectList') }}/2">View All</a>
      </label>    
  </div>
   <script src="{{asset('js/jquery.min.js')}}"></script>
  @include('mainLayout.imageCard')
 

  @endguest
  </div>
  @endsection