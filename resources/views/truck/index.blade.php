@extends('layouts.temp1')
@section('content')
 <div class="card mb-12">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Pending Request</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Contact</th>
                    <th>Garage/Mechanic</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                   <tbody>
                    @foreach($datas as $data)
                  <tr>
                    <td>{{\App\User::all()->where('id',$data->name)->first()->name}}</td>
                    <td>{{$data->location}}</td>
                    <td>{{\App\User::all()->where('id',$data->name)->first()->contact}}</td>
                    <td>{{$data->mechanic}}</td>
                    <td>{{$data->status}}</td>
                    <td><a href="{{url('book/'.$data->id.'/'.Auth::id())}}">Accept</a> </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endsection