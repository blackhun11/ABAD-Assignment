

    
    @foreach ( $recommendedProject as $recommendedProjects )
<a style="text-decoration:none;" href="{{ url('projectDetail') }}/{{$recommendedProjects->projectID}}">
        <div style = "margin: 5px 0; padding:0;" name = 'projectID' value = '{{$recommendedProjects->projectID}}' >
            <div class="col-lg-4" style="padding:0;">
                <div class="card m-t-35">
                    <div class="card-block" style="padding:0;">
                        <img src="{{asset($recommendedProjects->downloadPath)}}" class="img-fluid" alt="Photo of sunset">
                    </div>

                    <div class="card-footer bg-white" style="background-color:white;">
                        <label>{{$recommendedProjects->projectTitle}}</label>
                        <div style="display:flex; justify-content:space-between;">
                            <p class="card-text" style="margin:0;">{{$recommendedProjects->projectDesc}}</p>
                            
                            <div style="color:green; border-left:1px solid #f8f8f8; ">
                                    <h5 style="color:black;">Avg Bid </h5>
                                {{$recommendedProjects->avgBidding}}</div>
                        </div>
                       
                        <div style="display:flex; color: #6c757d!important; justify-content:space-between;">

                            <div style="margin:0; padding:0; display:flex; ">
                            <i class="ti-location-pin" style="margin-top:6px;"></i>
                            <h5 id = "postalCode{{$recommendedProjects->RowNumber}}" class="postalCode" style="font-size:65%;" 
                                value={{$recommendedProjects->postalCode}}>
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
        </div>
    </a>
<script>

(
    function() {
            var i = $('.postalCode').length;             
            var kodepos = $('#postalCode'+i).attr("value");
            var kalaurauAPI = "http://kalarau.net/api/v1/kodepos/"+kodepos;
            $.getJSON( kalaurauAPI)
            .done(function( data ) {
                $('#postalCode'+i).text(data.kodepos[0].kecamatan +"-"+ data.kodepos[0].kota);

            });
        })();
        
</script>
                  
    @endforeach
   
