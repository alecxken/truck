@extends('layouts.temp1')
@section('content')

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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@if(empty($datas))

@else

@if($datas->status == 'waiting')

<div id="test" style="display: block;">
  <div id="preloader" >
  <div id="loader"></div>
  <center><a href="" class="btn btn-info">Notify Others</a><span>||</span><a href="{{url('cancel/'.$data->id)}}" class="btn btn-warning">Cancel Order</a></center>
</div>
</div>

@else
@php $mech = \App\Mechanic::all()->where('id',$datas->mechanic)->first();@endphp
@if(!empty($mech))
  <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$mech->name}}</h3>

                <p class="text-muted text-center">From {{$mech->garage}} Garage</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Experience</b> <a class="float-right">2+ Years</a>
                  </li>
                  <li class="list-group-item">
                    <b>Time Taken</b> <a class="float-right">5 min Closer</a>
                  </li>
                  <li class="list-group-item">
                    <b>Cost</b> <a class="float-right">500 - 5000</a>
                  </li>
                </ul>

               <a href="tel:{{$mech->phone}}" class="btn btn-sm bg-teal">
                      <i class="fas fa-lg fa-phone">Call Mechanic</i>
                    </a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
          @else
          <p><center><h1>Something went wrong</h1></center></p>
    @endif
         
            @endif
              @endif




@endsection