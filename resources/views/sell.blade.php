@extends('layouts.temp1')
@section('content')


<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=fetch,Promise"></script>
  <script src="https://cdn.maptiler.com/ol/v6.0.0/ol.js"></script>
  <script src="https://cdn.maptiler.com/ol-mapbox-style/v5.0.2/olms.js"></script>
  <link rel="stylesheet" href="https://cdn.maptiler.com/ol/v6.0.0/ol.css">
  <style>
    #map {position: absolute; top: 0; right: 0; bottom: 0; left: 0;}
  </style>

      <style type="text/css">
      body {
  background-color: #222;
}
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #9370DB;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}
#loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #BA55D3;
    -webkit-animation: spin 3s linear infinite;
    animation: spin 3s linear infinite;
}
#loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #FF00FF;
    -webkit-animation: spin 1.5s linear infinite;
    animation: spin 1.5s linear infinite;
}
@-webkit-keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes spin {
    0%   {
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
    </style>

    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div id="test" style="display: block;">
  <div id="preloader" >
  <div id="loader"></div>
</div>
</div>
</head>
<body>

  @if(empty($datas))
  <div id="testes" style="display: block;"> <div id="map" >   <input autocomplete="off" id="search" type="text" /></div> </div> 
  
        
         
    <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        	<form method="post" action="{{url('book-now')}}">
        		@csrf
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Get Support </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12" >
                <div class="form-group" >
                  <label>Your Location</label>
                  <select class="mapControls select2" name="location" style="width: 100%;">
                    <option selected="selected">Nakuru</option>
                                    
                  </select>
                </div>              
              </div>
               <div class="col-md-12" >
                <div class="form-group" >
                  <label>Garage Locations</label>
                  <select required="" name="garage" class="mapControls select2" style="width: 100%;">
                    @php $manager = \App\Garage::all(); @endphp
                 
                   @foreach($manager as $team)
                    <option >{{$team->location}}</option>
                    @endforeach
                  
                  </select>
                </div>              
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"  onclick="document.getElementById('testes').style.display = 'none';
                  document.getElementById('test').style.display = 'block';">Submit changes</button>
            </div>
          </div>
      </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @else
 
      <br>
      <div class="row">
      {{-- <div class="col-md-8 d-flex align-items-stretch"></div> --}}
       <div class="col-md-12 d-flex align-center">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Support Mechanic
                                 </div>
       <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$datas->name}}</b></h2>
                      <p class="text-muted text-sm"><b>Garage: </b> {{$datas->garage}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <!--<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$datas->garage}}</li>-->
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : + 254 -{{$datas->phone}}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-money"></i></span> KES 500 - 1500</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="tel:{{$datas->phone}}" class="btn btn-sm bg-teal">
                      <i class="fas fa-lg fa-phone">Call Mechanic</i>
                    </a>
                   {{--  <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a> --}}
                  </div>
                </div>              </div>
            </div>

    
      </div>
      
         
            @endif

             <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
      <script >
      	@if(!empty($datas)) 
      $(window).load(function(){
         
      toastr.success('successfully submitted.')
      });
         document.getElementById('test').style.display= none;
  
    @else
      $(window).load(function(){     
      toastr.info('Welcome Feel free to choose your location.')
      });
    @endif
      </script>
    <script>
      var styleJson = 'https://api.maptiler.com/maps/streets/style.json?key=ICdEGYLRsgF27BSzwGqR';
      var map = new ol.Map({
        target: 'map',
        view: new ol.View({
          constrainResolution: true,
          center: ol.proj.fromLonLat([36.06373, -0.28124]),
          zoom: 15
        })
      });
      olms.apply(map, styleJson);
   
        
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   
  })

        </script>
</body>

@endsection