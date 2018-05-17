@extends('mainLayout.master2') 

@section('header')
  <script src="{{asset('assets/js/jqueryv1.9.1.js')}}"></script>
  <link href="{{asset('assets/css/bootstrapv3.3.6.css')}}" rel="stylesheet">
  <script src="{{asset('assets/js/typeahead.js')}}"></script>  

  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script> 
<style>

    .marginned{
      margin-top: 15px;
    }

    .title{
    margin-top:7px;
    font-weight:bold;
    }
    .back{
    font-size: 20px; 
    margin:4px 20px;
    }

    .detail{
    font-weight:bold;
    }

    .flex{
    display:flex; 
    padding:0; 
    }

    .green{
    color:darkgreen;
    }

    h5, h4, h6{
    margin: 5px 0;
    }

    hr{
    border-color:#c3b5b5;
    }

    .divider{
    font-size: 47px;
    margin: -10px;
    color: darkgreen;
    }

    .content{
    padding: 0;
    }

    .btmBorder{
    border-bottom: 1px solid ghostwhite; 
    margin:8px auto;
    }

    .btmBorder:last-child{
      border-bottom: none;
    }

    </style>

      <div class="flex" style="justify-content:space-between;">
          <a class="back" href="javascript:history.back()" ><i class="fa fa-arrow-left"></i></a>
          <h4 class="detail" style="margin:10px; color:white;">&nbsp;&nbsp;Project Details</h4>
          <a class="back" href="{{url('/projectTimeline')}}/{{$projectDetail[0]->projectID}}" ><i class="fa  fa-history"></i></a>
      </div>

@endsection

@section('content')

    @foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <p class="alert alert-{{ $key }} alert-dismissable">{{ Session::get($key) }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
        </p>
    @endif
    @endforeach

  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false"  >
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        @foreach ($projectPhoto as $projectPhotos )
            
      <div id = "item{{$projectPhotos->RowNumber}}" class="item">
        <img src="{{asset($projectPhotos->downloadPath)}}" alt="Los Angeles" style="width:100%; height : 160px; object-fit:cover;" >
        </div>
        @endforeach

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

  <span id="spanProjectID" value="{{$projectDetail[0]->projectID}}"></span>
  <span id="spanIsWinner" value="{{$projectDetail[0]->isWinner}}"></span>
  <span id="spanTempData"style="display:none;"></span>
  
  <div class="row examples">

      <div class="col-xl-3 col-lg-4 col-sm-6 m-t-10">
          <button id="hiddenBtn" class="btn btn-success source success m-l-5" style="display:none;"> </button>
      </div>
      
  </div>
            

  <div class="card" style="margin:10px; padding-bottom:40px;">
    <div style="margin:0 15px;">
      <h1 class="title" style="margin-top:20px;" > {{$projectDetail[0]->projectTitle}} </h1>
        <div class="flex green">
          <h5 class="detail">{{$projectDetail[0]->Status}}</h5>
          <h5>&nbsp;&nbsp;/&nbsp;&nbsp;</h5>
          <h5>{{$projectDetail[0]->bidDateLeft}}</h5>
        </div>

        <div class="flex btmBorder">
          <i class="ti-location-pin"></i>
          <h6 id = "postalCode" value = "{{$projectDetail[0]->postalCode}}"></h6>
        </div>

    </div>  

  <div style="margin:0 11px;">
    <div>
      <h5 class="btmBorder">{{$projectDetail[0]->projectDesc}}</h5>

      <h5 class="marginned">Project Budget</h5>
      <h5 class="detail btmBorder">{{$projectDetail[0]->budget}}</h5>

      <div class="flex marginned" style="justify-content:space-around;">
        <div>
            <h5>Avg Bid</h5>
            <h5 class="detail">{{$projectDetail[0]->avgBidding}}</h5>
        </div>
        <div class="divider">
        <span>/</span>
      </div>
        <div>
            <h5>Bids</h5>
            <h5 class="detail">{{$projectDetail[0]->bids}}</h5>
        </div>

      </div>

      <div class="btmBorder">
        <h5 class="marginned">Job Required</h5>
        <h5 class="detail">{{$projectDetail[0]->jobDesc}}</h5>
      </div>

      <div class="flex" style="justify-content:space-between;">
        <h5>Total Bids ({{$projectDetail[0]->totalBids}})</h5>
          <h5 class="detail">
            <a href="projectList/2">See More</a>
          </h5>    
      </div>

      <div id="commentMaster">
      @foreach ($projectBid as $projectBids )
          
      <div class="flex comment btmBorder" >
        <div>
          <img style="min-height:60px; min-width:60px; object-fit:cover;" class="media-object img-thumbnail user-img rounded-circle admin_img3 photos" alt="User Picture" src="{{asset('img/admin.jpg')}}">
        </div>

        <div style="width:60%; margin-left:5px;">
            <h5 style="font-size:11px;"class="detail">Bid : {{$projectBids->biddingAmmount}}</h5>            
            <h5 style="font-size:11px;">by : {{$projectBids->name}}</h5>
            <h5 style="font-size:11px;">{{$projectBids->biddingShortMessage}} </h5>
        </div>

        <div>

        @guest  
            
        @else
        @if(Auth::user()->userID == $projectDetail[0]->userID)
            <button class="btn btn-primary btnUser" status="{{$projectBids->isWinner}}" value="{{$projectBids->userID}}" style="display:none;">Choose</button>
        @else
            <button class="btn btn-primary btnUser" status="{{$projectBids->isWinner}}" value="{{$projectBids->userID}}" style="display:none;">Choose</button>

        @endif
        @endguest
        
        </div>
      </div>

      @endforeach
    </div>
    </div> 
  </div>
  </div>
  <script type="text/javascript">
              $('.examples .success').on('click', function () {
                  swal({
                      title: 'Confirmation',
                      text: $('#spanTempData').text(),
                      type: 'success',
                      confirmButtonColor: '#00c0ef'
                  }).done();
                  return false;
              });

             if ($("#spanIsWinner").attr("value") != 1) {
                  $(".btnUser").show();
             }

             $('.btnUser').each(function(){
                if($(this).attr("status") == 1){  
                    $(this).replaceWith('<i class="fa fa-check text-success" style="font-size:30px;"></i>');
                      
                }
              });
                          
        (
          function() {           
                  var kodepos = $('#postalCode').attr("value");
                  console.log(kodepos);
                  var kalaurauAPI = "http://kalarau.net/api/v1/kodepos/"+kodepos;
                  $.getJSON( kalaurauAPI)
                  .done(function( data ) {
                      $('#postalCode').text(data.kodepos[0].kecamatan +"-"+ data.kodepos[0].kota);
      
                  });
              })();

              $("#item1").attr('class','item active');
            
              $('.btnUser').click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                      });

                  $.ajax({
                        url: '{{ route('saveBidAjax') }}',
                        method: "POST",
                        data: {
                          userID : $(this).val(),
                          projectID : $('#spanProjectID').attr('value')
                        },
                        success: function(data){
                            $('#spanTempData').text(data);
                            $('#hiddenBtn').click();
                            location.reload();
                            
                        }
                      });

              });

      </script>


  @endsection

@section('footer')

  @guest

    @include('mainLayout.footer')

  @else

    @if(Auth::user()->userID == $projectDetail[0]->userID || $projectDetail[0]->Status == "Closed")
      @include('mainLayout.footer')
    @else
      
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Input Your Bid</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('/projectDetail')}}/{{$projectDetail[0]->projectID}}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Your Bid</label>
                    <div style="display:flex;">
                        <input type="number" class="form-control" step="10000" min="0" name = "biddingAmmount" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                        <textarea id="autosize" class="form-control" cols="50" rows="5" maxlength="4000" name = "biddingShortMessage"
                        ></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
              <input id="submitBid" type="submit" class="btn btn-primary">                    
            </div>

          </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->  

      <footer class="main-footer" style = "position : fixed; bottom : 0; width : 100%; margin : 0; padding : 0;">
          <div>
              <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">
            <a class="dropdown-item">     
              <i class="btn btn-primary" style="width : 100%; padding :15px 0; margin:0; border-radius:0;"
                      data-toggle="modal" data-target="#modal-default">
                Place a Bid
              </i>
            </a>
          </div>  
        </div>
      </footer>
    @endif

  @endguest

@endsection


