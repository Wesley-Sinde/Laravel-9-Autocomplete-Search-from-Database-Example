<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Typehead Search Autocomplete Example -wesley sinde</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>

</head>
<body>
   
<div class="container mt-3">
    <h1 class="mb-3">Laravel 9 Autocomplete Search using Bootstrap Typeahead JS - Wesley</h1>   
    <input class="typeahead form-control" type="text">
</div>
   

<script type="text/javascript">
    var path = "{{ url('search-auto-db') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
   
</body>
</html>