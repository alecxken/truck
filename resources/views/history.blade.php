@extends('layouts.temp1')
@section('content')

<div class="card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">My App History</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped small">
                  <thead class="bg-info">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Request</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($datas as $deta)
                    <tr>
                      <td>{{$deta->id}}</td>
                      <td>{{$deta->location}} - {{$deta->garage}}<br><small>{{$deta->created_at}}</small></td>
                      
                      <td>
                      	@if($deta->status == 'waiting')
								 	<span class="badge bg-warning">Pending</span>                      		
                      	@elseif($deta->status == 'Accept')
								 	<span class="badge bg-info">Inprogress</span>
                      	@elseif($deta->status == 'complete')
								 	<span class="badge bg-success">Complete</span>
                      	@elseif($deta->status == 'cancel')
								 	<span class="badge bg-danger">Canceled</span>
                      	@endif
                     
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endsection