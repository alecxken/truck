@extends('layouts.lock')

@section('content')



<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Truck</b>Locator</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register With Us today</p>

      <form method="POST" action="{{ route('register') }}">
                        @csrf

        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" required="" name="name" placeholder="Customer Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
                               @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

         <div class="input-group mb-3">
          <input type="number" class="form-control @error('phone') is-invalid @enderror" required="" name="phone" placeholder="Customer Phone Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
                               @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

         <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" required="" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" required="" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>


          <div class="input-group mb-3">
                          <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" required="" name="password_confirmation" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
                              

                        </div>
        <div class="row">
                    <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>            
          </div>
          <center><p>- OR -</p></center> 
        <a href="{{url('/login')}}" class="btn btn-block btn-success">
          <i class="fab fa-facebook mr-2"></i> Already Registed?
        </a>
          <!-- /.col -->
        </div>
      </form>

  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection
