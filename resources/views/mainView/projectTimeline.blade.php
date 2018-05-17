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

    <div class="flex">
        <a class="back" href="javascript:history.back()" ><i class="fa fa-arrow-left"></i></a>
        <h4 class="detail" style="margin:10px; color:white;">&nbsp;&nbsp;Project Timeline</h4>
    </div>

@endsection

@section('content')
<ul class="timeline">

    <br>
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <p class="alert alert-{{ $key }} alert-dismissable">{{ Session::get($key) }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
        </p>
    @endif
    @endforeach
        <!-- timeline time label -->
        @foreach ($projectTimeline as $projectTimelines)
            
        <li class="time-label">
            <span class="bg-green">
                {{$projectTimelines->date}}
            </span>
        </li>
        
        <!-- /.timeline-label -->
    
        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{$projectTimelines->time}}</span>
    
            <h3 class="timeline-header">{{$projectTimelines->status}}</h3>
    
                <div class="timeline-body">
                   {{$projectTimelines->progressDesc}}
                </div>

            </div>
        </li>
        
        <!-- END timeline item -->
    
        @endforeach
        <li>
            <i class="fa fa-clock-o bg-gray"></i>
        </li>
    </ul>


@endsection


@section('footer')

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Update Status</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('/projectTimeline')}}/{{$projectID[0]}}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="statusTimeline">
                        <option value="OnProgress">On Progress</option>
                        <option value="Done">Done</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                        <textarea id="autosize" class="form-control" cols="50" rows="5" maxlength="4000" name = "progressDesc"
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
                Update Status
              </i>
            </a>
          </div>  
        </div>
      </footer>
 
@endsection
