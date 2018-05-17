@extends('mainLayout.master2')
@section('header')
@include('mainLayout.mainCSSAdminLTE')
<script src="{{asset('assets/js/jqueryv1.9.1.js')}}"></script>
<link href="{{asset('assets/css/bootstrapv3.3.6.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/typeahead.js')}}"></script>  

@include('mainLayout.search')

@endsection
@section('content')
@if(Request::url() ==  url('/projectList/2'))
    <br>
        <h1 class="title">Recomended</h1>
        <h5 class="secTitle"> Recommended projects for you</h5>
    <br>
    @include('mainLayout.imageCard')
@elseif(Request::url() ==  url('/projectList/4'))
    <br>
        <h1 class="title">My Jobs</h1>
        <h5 class="secTitle"> Browse project by your Jobs</h5>
    <br>
    @include('mainLayout.imageCard')
@elseif(Request::url() ==  url('/projectList/5').'/'.$propertyKindID)
    <br>
        <h1 class="title">{{$propertyKind}}</h1>
        <h5 class="secTitle"> Browse project by Categories - {{$propertyKind}}</h5>
    <br> 
@include('mainLayout.imageCard')
@else
    <br>
        <h1 class="title">Search Result for {{$param2}}</h1>
    <br>
@include('mainLayout.imageCard')
@endif

@section('footer')

@include('mainLayout.footer')
@include('mainLayout.typeAheadScript')
@endsection
@endsection