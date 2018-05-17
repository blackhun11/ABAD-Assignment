
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

    <form>
        <input type="text" id= "search_text" class="form-control" placeholder="search" ></input>
    </form>

    <script type="text/javascript">

$(document).ready(function(){    
    $("#search_text").typeahead({
         source: function(query, process) {

                $.ajax({
                 url: '{{ route('test.ajax') }}',
                 data: {
                     query:$("#search_text").val()
                     
                     },
                 type: 'POST',
                 dataType: 'JSON',
                 success: function(data) {
                          process(data);

                        }               
                    });
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                    });
         },
    });
}); 

    </script>


</body>

</html>