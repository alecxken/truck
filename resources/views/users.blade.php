@extends('layouts.temp1')
@section('content')
@php $datas = \App\Users::all(); @endphp
 <div class="card mb-12">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Pending Request</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Contact</th>
                 
                  </tr>
                </thead>
                   <tbody>
                    @foreach($datas as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>@if($data->role ==1) admin @elseif($data->role ==2) mechanic @else normal user @endif</td>
                    <td>{{$data->contact}}</td>
                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endsection