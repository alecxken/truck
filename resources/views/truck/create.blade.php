@extends('layouts.temp1')
@section('content')
<div class="card card-register mx-auto mt-5">
      <div class="card-header">New Incident Request</div>
      <div class="card-body">
        <form method="post" action="{{url('/save-mechanic')}}">
          <div class="form-group">
            <div class="form-label-group">
                  <input type="text" id="name" class="form-control" placeholder="Mechanic Name" value="{{Auth::user()->name}}" required="required" autofocus="autofocus">
                  <label for="name"> Full Name</label>                          
          </div>
       <div class="form-group">
            <div class="form-label-group">
                 <select required="" class="form-control" name="manager">
                   <option value="">Choose Request Type</option>
                   <option>Mechanic</option>
                   <option>Breakdown</option>                 
                 </select>                
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                 <select required="" class="form-control" name="manager">
                   <option>Choose Location</option>
                   @php $manager = \App\User::all(); @endphp
                   @foreach($manager as $team)
                   <option>{{$team->name}}</option>
                   @endforeach
                 </select>
                  <label for="name"> Full Name</label>  
            </div>
          </div>
         
         {{--  <button class="btn btn-primary btn-block" type="submit">Submit Request</button> --}}
          <button type="submit" class="btn btn-block bg-gradient-primary">Primary</button>
          </form>
        
      </div>
    </div>
@endsection