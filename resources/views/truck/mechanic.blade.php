@extends('layouts.temp1')
@section('content')
<div class="card card-register mx-auto mt-5">
      <div class="card-header">Register A Garage</div>
      <div class="card-body">
        <form method="post" action="{{url('/save-mechanic')}}">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
                  <input type="text" id="name" name="name" required="" class="form-control" placeholder="Mechanic Name" required="required" autofocus="autofocus">
                  <label for="name"> Full Name</label>                          
          </div>
        </div>
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputEmail" name="phone" required="" class="form-control" placeholder="Phone Number" required="required">
                  <label for="inputEmail">Phone Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                 <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                 <select required="" class="form-control" name="manager">
                   <option>Choose Location</option>
                   @php $manager = \App\Garage::all(); @endphp
                   @foreach($manager as $team)
                   <option>{{$team->name}}</option>
                   @endforeach
                 </select>
                 
            </div>
          </div>
         
          <button class="btn btn-primary btn-block" type="submit">Register</button>
          </form>
        
      </div>
    </div>
@endsection