
@php
  $prefix=Request::route()->getPrefix();
  $route = Route::currentRouteName();
@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Brand Logo -->

    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty(Auth::user()->image))? url('upload/user_images/'.Auth::user()->image):url('upload/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(Auth::user()->usertype=="Admin")

          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link " >
                <i class="fas fa-user"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('users.view') }}" class="nav-link {{( $route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>

            </ul>
          </li>
          @endif
          <li class="nav-item {{($prefix=='/profile')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="far fa-user-circle"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view') }}" class="nav-link {{( $route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('password.edit') }}" class="nav-link {{( $route=='password.edit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>

            </ul>
          </li>

            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
