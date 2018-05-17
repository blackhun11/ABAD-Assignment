@extends('mainLayout.master2')

@section('content')
@if(Request::url() ==  url('/projectList/2'))
    <h1 style="font-weight:bold; margin:0;">Recomended</h1>
    <h5 style="color: #6c757d!important; margin:0;"> Recommended projects for you</h5>
    <br>
    @include('mainLayout.imageCard')
@elseif(Request::url() ==  url('/projectList/4'))
    <h1 style="font-weight:bold; margin:0;">My Jobs</h1>
    <h5 style="color: #6c757d!important; margin:0;"> Browse project by your Jobs</h5>
    <br>
    @include('mainLayout.imageCard')
@else
<h1 style="font-weight:bold; margin:0;">{{$propertyKind}}</h1>
<h5 style="color: #6c757d!important; margin:0;"> Browse project by Categories - {{$propertyKind}}</h5>
<br> 

@include('mainLayout.imageCard')
@endif

@endsection