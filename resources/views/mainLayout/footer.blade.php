
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Are You Sure Want to Logout&hellip;?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-left:5px;">No</button>
          <button type="button" class="btn btn-primary" href="/home" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Yes</button>                    
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<footer class="main-footer" style = "position : fixed; bottom : 0; width : 100%; margin : 0; padding : 0;">
    <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">
        <a href="#" class="fa fa-sort-up" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></a>
    </div>
        <div class="row icon-list-demo" style="
            display: flex;
            justify-content: space-evenly;
            margin:0;">

            <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">
                <a href="{{ url('home') }}">
                  <i class="ion-home" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></i>
                </a>
            </div>

            <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">
              <a href="{{ url('projectList') }}">  
                <i class="fa fa-search" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></i>
              </a>
            </div>
            <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">           
                @guest
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa fa-tasks" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></i> 
                    </a>     
                @else
                  <a href="{{ url('myProject') }}">
                    <i class="fa fa-tasks" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></i>
                </a>
                @endguest
            </div>
             
            <div class="col-4 text-center bg-mint" style="padding:0; margin :0; padding:0; width:100%">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="ion-log-in" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;"></i> 
                    </a>     
                @else
                  <a class="dropdown-item">
                    <i class="ion-log-out" style="border: none; width: 100%; border-radius:0%; margin:0; padding:0;" data-toggle="modal" data-target="#modal-default"> </i>
                 </a>
  
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest  
        </div>
    </div>
    </footer>

    