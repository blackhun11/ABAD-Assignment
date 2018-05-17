
<script type="text/javascript">

    $(document).ready(function(){    
        $("#search_text").typeahead({
             source: function(query, process) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                        });
                    $.ajax({
                     url: '{{ route('searchAjax') }}',
                     data: {
                         query:$("#search_text").val()
                         
                         },
                     type: 'POST',
                     dataType: 'JSON',
                     success: function(data) {
                                console.log();
                                process(data);
                            } ,          
                        });

             },
        });
    }); 
      </script>