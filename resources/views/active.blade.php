@extends('layouts.temp1')
@section('content')



@if(empty($datas))
    
@else

  <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{\App\User::all()->where('id',$datas->name)->first()->name}}</h3>

                <p class="text-muted text-center">Hailing Driver</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Current Location</b> <a class="float-right">{{$datas->locations}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">200 - 1000</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">{{\App\User::all()->where('id',$datas->name)->first()->phone}}</a>
                  </li>
                </ul>
                <a href="{{url('cancel/'.$datas->id)}}" class="btn btn-warning btn-block"><b>Cancel Trip</b></a>
                <a href="{{url('endtrip/'.$datas->id)}}" class="btn btn-danger btn-block"><b>End Trip</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
  
         
              @endif




@endsection