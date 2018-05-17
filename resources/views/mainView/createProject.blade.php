
@extends('mainLayout.master')

@section('content')

@foreach (['danger', 'warning', 'success', 'info'] as $key)
@if(Session::has($key))
    <p class="alert alert-{{ $key }} alert-dismissable">{{ Session::get($key) }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
            </button>
    </p>
@endif
@endforeach

<div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Create Project</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form role="form" method="POST" action={{url('/createProject')}} enctype="multipart/form-data">
        @csrf
        <!-- text input -->
        <div class="form-group">
          <label>Project Title</label>
          <input type="text" class="form-control" name="projectTitle" required>
        </div>

        <div class="form-group">
            <label>Job Required</label>
            <select size="3" multiple class="form-control chzn-select" id="test_me_paddington"
            name="job[]" tabindex="8">
                @foreach ($jobDDL as $jobDDLs)
                    <option value="{{$jobDDLs->jobID}}">{{$jobDDLs->jobDesc}}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label>Property Kind</label>
            <select class="form-control" name = "kind">
                @foreach ($propertyKindDDL as $propertyKindDDLs)
                    <option value="{{$propertyKindDDLs->propertyKindID}}">{{$propertyKindDDLs->propertyKindDesc}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Postal Code</label>
            <input type="text" class="form-control" name="postalCode" maxlength="5" required>
          </div>

        <div class="form-group">
            <label>Project Budget</label>
            <div style="display:flex;">
                <input type="number" class="form-control" step="10000" min="0" name = "minBudget" required>
                <label style="margin-top:7px;">&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="number" class="form-control" step="10000" min="0" name = "maxBudget" required>
            </div>
        </div>

        <div class="form-group">
            <label>Project Date</label>
            <div style="display:flex;">
                <input type="text" class="form-control" data-field="datetime" name = "projectStart" required>
                <label style="margin-top:7px;">&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" data-field="datetime" name = "projectEnd" required>
            </div>
        </div>
        
        <div class="form-group">
            <label>Bidding Date</label>
            <div style="display:flex;">
                <input type="text" class="form-control" data-field="datetime" name = "openBidDate" required>
                <label style="margin-top:7px;">&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" data-field="datetime" name = "closedBidDate" required>
            </div>
        </div>
  
        <div id="dtBox"></div>

  
        @include('mainLayout.uploader')

        <div class="form-group" >
                <label>Including Material?</label>
            <div class="left-align" style="display:flex;">
                <div class="radio" style="margin-top:0;">
                    <label class="text-success" style="padding-left:0;">
                        <input type="radio" name="isMaterial" value="1" >
                        <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                        Yes
                    </label>
                </div>
        
                <div class="radio" style="margin-top:0;">
                    <label class="text-danger" >
                        <input type="radio" name="isMaterial" value="0" >
                        <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                    <textarea id="autosize" class="form-control" cols="50" rows="5" maxlength="4000" name = "projectDesc"></textarea>
            </div>

        </div>

        <button class="btn btn-block btn-primary" style="margin-bottom:20px;">
            Create Project
        </button>
   
</div>
 
@endsection
