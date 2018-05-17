@extends('mainLayout.master2') 

@section('header')
<script src="{{asset('assets/js/jqueryv1.9.1.js')}}"></script>
<link href="{{asset('assets/css/bootstrapv3.3.6.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/typeahead.js')}}"></script>  

<style>
    .flex{
        display:flex;
    }

    .width50{
        width:50%;
    }

        .accordion .accordion-panel {
        display: none;
    }
    
    .span{
        float: right;
    }

    .boxCss{
        margin: 0;
    }
    .borderCss{
        border-bottom: 1px solid #d9e5e8; 
        border-top: 1px solid #d9e5e8; 
        cursor:pointer;
    }

    .accordionCss{
        margin: 0; 
        padding:0;
    }

    .colCss, .cardCss{
        padding: 0;
    }

    .footerCss{
        background-color:white;
    }
    
    .flex-between{
        display:flex;
        justify-content:space-between;
    }

    a:hover{
        color: #72afd2;
        text-decoration: none;
    }
    .back{
        font-size: 20px; 
        margin:4px 20px;
    }
</style>

    <div class="flex">
        <a class="back" href="javascript:history.back()" ><i class="fa fa-arrow-left"></i></a>
        <h4 class="detail" style="margin:10px; color:white;">&nbsp;&nbsp;My Project & Bids</h4>
    </div>

@endsection

@section('content')
    <br>  
      <div class="row">
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom" >
            <ul class="nav nav-tabs flex" style="justify-content:center;">
              <li class="active width50"><a href="#tab_1" data-toggle="tab">My Projects</a></li>
              <li class="width50"><a href="#tab_2" data-toggle="tab">My Bids</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                    @foreach ($myProject as $myProjects)
                    <a href="{{ url('projectDetail') }}/{{$myProjects->projectID}}">
                        <div class="panel box box-primary boxCss">
                            <div class="box-header with-border borderCss">
                                <ul id={{$myProjects->projectID}} class="accordion">
                                    <div class="flex-between">
                                        <label class="label" class="box-title">{{$myProjects->projectTitle}}</label>
                                        <label class="label" class="box-title">{{$myProjects->status}}</label>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </a>

                    @endforeach
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

                    @foreach ($myBid as $myBids)
                    <a href="{{ url('projectDetail') }}/{{$myBids->projectID}}">
                        <div class="panel box box-primary boxCss">
                            <div class="box-header with-border borderCss">
                                <ul id={{$myBids->projectID}} class="accordion">
                                    <div class="flex-between">
                                        <label class="label" class="box-title">{{$myBids->projectTitle}}</label>
                                        <label class="label" class="box-title">{{$myBids->status}}</label>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </a>

                    @endforeach

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->



    @section('footer')
        @include('mainLayout.footer')
        @include('mainLayout.typeAheadScript')
    @endsection

@endsection