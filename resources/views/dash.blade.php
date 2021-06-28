@extends('layouts.template')

@section('content')


<?php

$occupied = \App\Unit::all()->where('hstatus','Occupied')->count();
$vacant =\App\Unit::all()->where('hstatus','vacant')->count();;
?>
<div class="container">
    <div class="box-body">
    <div class="row justify-content-center">
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-cog fa-spin"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Garages</span>
              <span class="info-box-number">{{\App\Garage::all()->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mechanics</span>
              <span class="info-box-number">{{\App\Mechanic::all()->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Users</span>
              <span class="info-box-number">{{\App\User::all()->where('role',0)->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active Request</span>
              <span class="info-box-number">{{\App\Breakdown::all()->where('status','waiting')->count()}}<small>of {{\App\Breakdown::all()->where('status','<>','waiting')->count()}}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
    </div>

          <!-- /.col -->
        </div>
          </div>
   </section>
   @endsection