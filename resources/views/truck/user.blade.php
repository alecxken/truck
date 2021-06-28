@extends('layouts.temp1')
@section('content')
<div class="card card-register mx-auto mt-5">
      <div class="card-header">Register A Garage</div>
      <div class="card-body">
        <form method="post" action="{{url('/save-garage')}}">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
                  <input type="text" id="name" class="form-control" name="name" placeholder="Garage Name" required="required" autofocus="autofocus">
                {{--   <label for="name"> Full Name</label>  --}}                         
          </div>
        </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="location" placeholder="Location" required="required">
               
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                 <select required="" class="form-control" name="manager">
                   <option value="">Choose Manager</option>
                   @php $manager = \App\User::all(); @endphp
                   @foreach($manager as $team)
                   <option>{{$team->name}}</option>
                   @endforeach
                 </select>
                 
            </div>
          </div>
          <div class="form-group">
           <div class="form-label-group">
                  <input type="number" id="inputEmail" name="phone" class="form-control" placeholder="Phone Number" required="required">
                {{--   <label for="inputEmail">Contact Number</label> --}}
                </div>
          </div>
        
          <button class="btn btn-primary btn-block" type="submit">Register</button>
          </form>
        
      </div>
    </div>
@endsection