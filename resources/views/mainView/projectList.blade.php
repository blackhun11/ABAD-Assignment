@extends('mainLayout.master2') 
@section('content')

<h1 style="font-weight:bold; margin:0;">Recomended</h1>
<h5 style="color: #6c757d!important; margin:0;"> Recommended projects for you</h5>
<br>

<style>
    .accordion .accordion-panel {
        display: none;
    }
    
    .span{
        float: right;
    }
</style>


@foreach ( $recommendedProject as $jobProjects )
<div id="outsideRec{{$jobProjects->RowNumber}}" class="panel box box-primary accordion" style="margin:0;">
    <div class="box-header with-border accordion-button" style="border-bottom: 1px solid #d9e5e8; border-top: 1px solid #d9e5e8; cursor:pointer;">
        <label class="label" style="color:black;" class="box-title">{{$jobProjects->projectTitle}}</label>
        <span class="span">+</span>
    </div>

    <div class="accordion-panel" id="rowNumRec{{$jobProjects->RowNumber}}" style="margin: 5px 0; padding:0;" name='projectID'
        value='{{$jobProjects->projectID}}'>
        <div class="col-lg-4" style="padding:0;">
            <div class="card m-t-35">
                <div class="card-block" style="padding:0;">
                    <img src="{{asset($jobProjects->downloadPath)}}" class="img-fluid" alt="Photo of sunset">
                </div>

                <div class="card-footer bg-white" style="background-color:white;">
                    <label>{{$jobProjects->projectTitle}}</label>
                    <div style="display:flex; justify-content:space-between;">
                        <h5 class="card-text" style="margin:0;">{{$jobProjects->projectDesc}}</h5>

                        <div style="color:green; border-left:1px solid #f8f8f8; ">
                            <h5 style="color:black;">Avg Bid </h5>
                            {{$jobProjects->avgBidding}}
                        </div>
                    </div>

                    <div style="display:flex; color: #6c757d!important; justify-content:space-between;">
                        <div style="margin:0; padding:0; display:flex; ">
                            <i class="ti-location-pin" style="margin-top:10px;"></i>
                            <h5 id="postalCodeRec{{$jobProjects->RowNumber}}" class="postalCodeRec" style="font-size:80%;" value={{$jobProjects->postalCode}}>
                            </h5>
                        </div>
                        <div style="margin:0; padding:0; display:flex;">
                            <h5 style="font-size:80%;"> {{$jobProjects->propertyKindDesc}}
                                <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                            </h5>
                            <h5 style="font-size:80%;"> {{$jobProjects->bidDateLeft}}
                                <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                            </h5>
                            <h5 style="font-size:80%;"> {{$jobProjects->bids}} </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    // (function() {
    //       var i = $('.postalCodeRec').length;
    //       $('#outsideRec'+i).click(function(j) { 
    //           var dropDown = $('#rowNumRec'+i);
    //           dropDown.slideToggle();
    //       });                
    // })();
</script>
@endforeach

<br>
<div class="showMore">
    <label>
        <a href="projectList/2">Show More</a>
    </label>
</div>

<h1 style="font-weight:bold; margin:0;">My Jobs</h1>
<h5 style="color: #6c757d!important; margin:0;"> Browse project by your Jobs</h5>
<br> @foreach ( $jobProject as $jobProjects )
<div id="outsideJob{{$jobProjects->RowNumber}}" class="panel box box-primary accordion" style="margin:0;">
    <div class="box-header with-border accordion-button" style="border-bottom: 1px solid #d9e5e8; border-top: 1px solid #d9e5e8; cursor:pointer;">
        <label class="label" style="color:black;" class="box-title">{{$jobProjects->projectTitle}}</label>
        <span class="span">+</span>
    </div>

    <div class="accordion-panel" id="rowNumJob{{$jobProjects->RowNumber}}" style="margin: 5px 0; padding:0;" name='projectID'
        value='{{$jobProjects->projectID}}'>
        <div class="col-lg-4" style="padding:0;">
            <div class="card m-t-35">
                <div class="card-block" style="padding:0;">
                    <img src="{{asset($jobProjects->downloadPath)}}" class="img-fluid" alt="Photo of sunset">
                </div>

                <div class="card-footer bg-white" style="background-color:white;">
                    <label>{{$jobProjects->projectTitle}}</label>
                    <div style="display:flex; justify-content:space-between;">
                        <h5 class="card-text" style="margin:0;">{{$jobProjects->projectDesc}}</h5>

                        <div style="color:green; border-left:1px solid #f8f8f8; ">
                            <h5 style="color:black;">Avg Bid </h5>
                            {{$jobProjects->avgBidding}}
                        </div>
                    </div>

                    <div style="display:flex; color: #6c757d!important; justify-content:space-between;">
                        <div style="margin:0; padding:0; display:flex; ">
                            <i class="ti-location-pin" style="margin-top:10px;"></i>
                            <h5 id="postalCodeJob{{$jobProjects->RowNumber}}" class="postalCodeJob" style="font-size:80%;" value={{$jobProjects->postalCode}}>
                            </h5>
                        </div>
                        <div style="margin:0; padding:0; display:flex;">
                            <h5 style="font-size:80%;"> {{$jobProjects->propertyKindDesc}}
                                <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                            </h5>
                            <h5 style="font-size:80%;"> {{$jobProjects->bidDateLeft}}
                                <h5 style="margin-top: 13px; font-size: 7px;">&#9670;</h5>
                            </h5>
                            <h5 style="font-size:80%;"> {{$jobProjects->bids}} </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <a href="projectList/4">Show More</a>
    </label>
</div>

<h1 style="font-weight:bold; margin:0;">Categories</h1>
<h5 style="color: #6c757d!important; margin:0;"> Browse project by Categories</h5>
<br> @foreach ($propertyKind as $propertyKinds)
<a href="/projectList/5/{{$propertyKinds->propertyKindID}}">
    <div class="panel box box-primary" style="margin:0;">
        <div class="box-header with-border" style="border-bottom: 1px solid #d9e5e8; border-top: 1px solid #d9e5e8; cursor:pointer;">
            <ul id={{$propertyKinds->propertyKindID}} class="accordion">
                <label class="label" style="color:black;" class="box-title">{{$propertyKinds->propertyKindDesc}}</label>
            </ul>
        </div>
    </div>
</a>
@endforeach

<script>
    $(function () {
        $(".accordion-button").click(function () {
            $(this).next().slideToggle();
        });
    })
</script>
@endsection