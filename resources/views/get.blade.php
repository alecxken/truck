@extends('layouts.temp1')
@section('content')


<html>
  <head>
    <script src="https://cdn.maptiler.com/maptiler-geocoder/v1.1.0/maptiler-geocoder.js"></script>
    <link href="https://cdn.maptiler.com/maptiler-geocoder/v1.1.0/maptiler-geocoder.css" rel="stylesheet" />
  </head>
  <body>
    <input autocomplete="off" id="search" type="text" />
    <script>
      var geocoder = new maptiler.Geocoder({
        input: 'search',
        key: 'ICdEGYLRsgF27BSzwGqR'
      });
      geocoder.on('select', function(item) {
        console.log('Selected', item);
      });
    </script>
  </body>
</html>
@endsection