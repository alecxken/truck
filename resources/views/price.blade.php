@extends('layouts.temp1')
@section('content')



@if(empty($price))
    
@else

  <div class="col-md-12">
                  <div class="col-sm-12">
                    <br>
                     <center>
                      <br>
                    <div class="position-relative  bg-green" style="height: 300px">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-primary">
                       {{$price}}
                        </div>
                      </div>
                     <h1> 
                       Completed Successfully <br>
                      <small>Collect Ksh  {{$price}}</small></h1>
                      <br>
                      <a href="{{url('/')}}" class="btn btn-primary">Received Payments</a>
                    </div>
                    </center>
                  </div>
             
         </div>
              @endif




@endsection