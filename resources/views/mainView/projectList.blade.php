@extends('mainLayout.master2') 

@section('header')
<script src="{{asset('assets/js/jqueryv1.9.1.js')}}"></script>
<link href="{{asset('assets/css/bootstrapv3.3.6.css')}}" rel="stylesheet">
<script src="{{asset('assets/js/typeahead.js')}}"></script>  

    @include('mainLayout.search')

@endsection

@section('content')

<style>
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

</style>

@guest
    <br>
    <h1 class="title">Categories</h1>
    <h5 class="secTitle"> Browse project by Categories</h5>
    <br>
        @foreach ($propertyKind as $propertyKinds)
        <a href="{{ url('projectList') }}/5/{{$propertyKinds->propertyKindID}}">
            <div class="panel box box-primary boxCss">
                <div class="box-header with-border borderCss">
                    <ul id={{$propertyKinds->propertyKindID}} class="accordion">
                        <label class="label" class="box-title">{{$propertyKinds->propertyKindDesc}}</label>
                    </ul>
                </div>
            </div>
        </a>
        @endforeach
@else
    <br>  
    <h1 class="title">Recommended</h1>
    <h5 class="secTitle"> Recommended Project for You</h5>
    <br>    
    @foreach ( $recommendedProject as $recommendedProjects )
        <div id="outsideRec{{$recommendedProjects->RowNumber}}" class="panel box box-primary boxCss accordion">
            <div class="box-header with-border borderCss accordion-button">
                <label class="label" class="box-title">{{$recommendedProjects->projectTitle}}</label>
                <span class="span">+</span>
            </div>
            
            <div class="accordion-panel accordionCss" id="rowNumRec{{$recommendedProjects->RowNumber}}" name='projectID'
                    value='{{$recommendedProjects->projectID}}'>
                <a href="{{ url('projectDetail') }}/{{$recommendedProjects->projectID}}">
                    <div class="col-lg-4 colCss">
                        <div class="card m-t-35">
                            <div class="card-block cardCss">
                                <img src="{{asset($recommendedProjects->downloadPath)}}" class="img-fluid" alt="Photo of sunset">
                            </div>

                            <div class="card-footer bg-white footerCss" >
                                <label>{{$recommendedProjects->projectTitle}}</label>
                                <div class="flex-between">
                                    <h5 class="card-text" style="margin:0;">{{$recommendedProjects->projectDesc}}</h5>

                                    <div style="color:green; border-left:1px solid #f8f8f8; ">
                                        <h5 style="color:black;">Avg Bid </h5>
                                        {{$recommendedProjects->avgBidding}}
                                    </div>
                                </div>

                                <div style="display:flex; color: #6c757d!important; justify-content:space-between;">
                                    <div style="margin:0; padding:0; display:flex; ">
                                        <i class="ti-location-pin" style="margin-top:6px;"></i>
                                        <h5 id="postalCodeRec{{$recommendedProjects->RowNumber}}" class="postalCodeRec" style="font-size:65%;" value={{$recommendedProjects->postalCode}}>
                                        </h5>
                                    </div>
                                    <div style="margin:0; padding:0; display:flex;">
                                        <h5 style="font-size:65%;"> {{$recommendedProjects->propertyKindDesc}}
                                            <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                                        </h5>
                                        <h5 style="font-size:65%;"> {{$recommendedProjects->bidDateLeft}}
                                            <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                                        </h5>
                                        <h5 style="font-size:65%;"> {{$recommendedProjects->bids}} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <script>
            (
                function () {
                    var i = $('.postalCodeRec').length;
                    var kodepos = $('#postalCodeRec' + i).attr("value");
                    var kalaurauAPI = "http://kalarau.net/api/v1/kodepos/" + kodepos;
                    $.getJSON(kalaurauAPI)
                        .done(function (data) {
                            $('#postalCodeRec' + i).text(data.kodepos[0].kecamatan + "-" + data.kodepos[0].kota);

                        });
                })();
        </script>
        @endforeach

        <br>
        <div class="showMore">
            <label>
                <a href="{{ url('projectList') }}/2">Show More</a>
            </label>
        </div>

        <h1 class="title">My Jobs</h1>
        <h5 class="secTitle"> Browse project by your Jobs</h5>
        <br> 
        @foreach ( $jobProject as $jobProjects )
        <div id="outsideJob{{$jobProjects->RowNumber}}" class="panel box box-primary boxCss accordion">
            <div class="box-header with-border borderCss accordion-button">
                <label class="label" class="box-title">{{$jobProjects->projectTitle}}</label>
                <span class="span">+</span>
            </div>

            <div class="accordion-panel accordionCss" id="rowNumJob{{$jobProjects->RowNumber}}" name='projectID'
                value='{{$jobProjects->projectID}}'>
                <a href="{{ url('projectDetail') }}/{{$jobProjects->projectID}}">
                    <div class="col-lg-4 colCss">
                        <div class="card m-t-35">
                            <div class="card-block cardCss">
                                <img src="{{asset($jobProjects->downloadPath)}}" class="img-fluid" alt="Photo of sunset">
                            </div>

                            <div class="card-footer bg-white footerCss">
                                <label>{{$jobProjects->projectTitle}}</label>
                                <div class="flex-between">
                                    <h5 class="card-text" style="margin:0;">{{$jobProjects->projectDesc}}</h5>

                                    <div style="color:green; border-left:1px solid #f8f8f8; ">
                                        <h5 style="color:black;">Avg Bid </h5>
                                        {{$jobProjects->avgBidding}}
                                    </div>
                                </div>

                                <div style="display:flex; color: #6c757d!important; justify-content:space-between;">
                                    <div style="margin:0; padding:0; display:flex; ">
                                        <i class="ti-location-pin" style="margin-top:6px;"></i>
                                        <h5 id="postalCodeJob{{$jobProjects->RowNumber}}" class="postalCodeJob" style="font-size:65%;" value={{$jobProjects->postalCode}}>
                                        </h5>
                                    </div>
                                    <div style="margin:0; padding:0; display:flex;">
                                        <h5 style="font-size:65%;"> {{$jobProjects->propertyKindDesc}}
                                            <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                                        </h5>
                                        <h5 style="font-size:65%;"> {{$jobProjects->bidDateLeft}}
                                            <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                                        </h5>
                                        <h5 style="font-size:65%;"> {{$jobProjects->bids}} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <script>
            (
                function () {
                    var i = $('.postalCodeJob').length;
                    var kodepos = $('#postalCodeJob' + i).attr("value");
                    var kalaurauAPI = "http://kalarau.net/api/v1/kodepos/" + kodepos;
                    $.getJSON(kalaurauAPI)
                        .done(function (data) {
                            $('#postalCodeJob' + i).text(data.kodepos[0].kecamatan + "-" + data.kodepos[0].kota);

                        });
                })();
        </script>
        @endforeach

        <br>
        <div class="showMore">
            <label>
                <a href="{{ url('projectList') }}/4">Show More</a>
            </label>
        </div>

        <h1 class="title">Categories</h1>
        <h5 class="secTitnewhome"> Browse project by Categories</h5>
        <br>
        @foreach ($propertyKind as $propertyKinds)
        <a href="{{ url('projectList') }}/5/{{$propertyKinds->propertyKindID}}">
            <div class="panel box box-primary boxCss">
                <div class="box-header with-border borderCss">
                    <ul id={{$propertyKinds->propertyKindID}} class="accordion">
                        <label class="label" class="box-title">{{$propertyKinds->propertyKindDesc}}</label>
                    </ul>
                </div>
            </div>
        </a>
        @endforeach
@endguest
<script>
    $(function () {
        $(".accordion-button").click(function () {
            $(this).next().slideToggle();
        });
    })
</script>

    @section('footer')
        @include('mainLayout.footer')
        @include('mainLayout.typeAheadScript')
    @endsection
@endsection