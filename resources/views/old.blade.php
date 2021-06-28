@extends('layouts.temp1')
@section('content')
    <style type="text/css">
        #map {
            width: 100%;
            height: 400px;
        }
        .mapControls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        #searchMapInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }
         #searchMapInputs {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-right: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }
        #searchMapInput:focus {
            border-color: #4d90fe;
        }
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
<!------ Include the above in your HEAD tag ---------->
@if(empty($datas))
<div id="test" style="display: none;">
  <div id="preloader" >
  <div id="loader"></div>
</div>
</div>
  <div class="card card-card-success" id="testes" style="display: block;">

        {{--   <div class="card-header bg-gradient-success">
            <h3 class="card-title">Breakdown Help Request Page</h3>

          </div> --}}
          <!-- /.card-header -->
          <form method="post" action="{{url('book-now')}}">
            @csrf
              <div class="card-body " >
            <div class="row" id="searchMapInput">
              <div class="col-md-4" >
                <div class="form-group" >
                  <label>Your Location</label>
                  <select class="mapControls select2" name="location" style="width: 100%;">
                    <option selected="selected">Nakuru, London</option>
                                    
                  </select>
                </div>              
              </div>
               <div class="col-md-4" >
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

                  <div class="col-md-4" >
                <div class="form-group" >
                  <label></label>
                  <button type="submit" class="btn btn-block btn-sm bg-gradient-primary" 
                  onclick="document.getElementById('testes').style.display = 'none';
                  document.getElementById('test').style.display = 'block';">Submit</button>
                </div>              
              </div>
       
          </div>
          <div id="map"></div>
         
          </div>
          </form>
        
          <!-- /.card-body -->
         {{--  <div class="card-footer">
           <button>Book Now</button>
          </div> --}}
        </div>
        @else
        <style>.large-header {
   position: relative;
   width: 100%;
   background: #111;
   overflow: hidden;
   background-size: cover;
   background-position: center center;
   z-index: 1;
}

.demo .large-header {
   background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo-bg.jpg");
}

.main-title {
   position: absolute;
   margin: 0;
   padding: 0;
   color: #F9F1E9;
   text-align: center;
   top: 50%;
   left: 50%;
   -webkit-transform: translate3d(-50%, -50%, 0);
   transform: translate3d(-50%, -50%, 0);
}

.demo .main-title {
   text-transform: uppercase;
   font-size: 4.2em;
   letter-spacing: 0.1em;
}

.main-title .thin {
   font-weight: 200;
}

@media only screen and (max-width: 768px) {
   .demo .main-title {
      font-size: 3em;
   }
}</style>
        <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch o">
            <div class="container dem">
   <div class="content">
      <div id="large-header" class="large-header">
         <canvas id="demo-canvas"></canvas>
         <h1 class="main-title"><span class="thin">Truck</span> Locator</h1>
      </div>
   </div>
</div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch" align="center">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Mechanic Requested
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
                </div>
              </div>
            </div>
            @endif
          <!-- Select2 -->
 @section('script')
        <script>
        
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   
  })

        </script>

        <script>

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -0.2784129, lng: 36.0564008},
      zoom: 13
    });
    var input = document.getElementById('searchMapInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
   
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
  
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
  
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
    
        /* If the place has a geometry, then present it on a map. */
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
      
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
      
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
        
        /* Location details */
        document.getElementById('location-snap').innerHTML = place.formatted_address;
        document.getElementById('lat-span').innerHTML = place.geometry.location.lat();
        document.getElementById('lon-span').innerHTML = place.geometry.location.lng();
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js" async defer></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js" async defer></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js" async defer></script>



        @endsection
          @endsection