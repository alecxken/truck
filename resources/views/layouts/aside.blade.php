 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
     {{--  <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" > --}}
      <span class="brand-image img-circle elevation-3 font-weight-bold"
           style="opacity: .8" >Garage Digital</span>
           <hr>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{url('home')}}" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Request Page
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('history')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                My Request History
              </p>
            </a>
          </li>

         
          @if(Auth::user()->role == 2 || Auth::user()->role == 1)
           <li class="nav-item">
            <a href="{{url('mhistory')}}" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                My Response History
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('request')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Active Requests
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endif

            {{-- <li class="nav-item">
            <a href="{{url('mechanic')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Response History
              </p>
            </a>
          </li> --}}

  
            @if(Auth::user()->role == 1)
            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cog "></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('mechanic')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mechanic Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('garage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Garage Registration</p>
                </a>
              </li>
             
            </ul>
          </li>
          @endif

          <li class="nav-item">
             @guest
 @else
     <a class="nav-link btn btn-sm btn-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endif
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>