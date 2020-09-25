
@php
  $prefix=Request::route()->getPrefix();
  $route = Route::currentRouteName();
@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Brand Logo -->

    <a href="{{ route('home') }}" class="brand-link">
      {{--  <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">  --}}
      <span class="brand-text font-weight-light"><h3>Point of Scale</h3></span>
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

          <li class="nav-item {{($prefix=='/Suppliers')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fas fa-industry"></i>
              <p>
                Manage Suppliers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('suppliers.view') }}" class="nav-link {{( $route=='suppliers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Suppliers</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{($prefix=='/Customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fas fa-universal-access"></i>
              <p>
                Manage Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customers.view') }}" class="nav-link {{( $route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customers</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{($prefix=='/Unit')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fas fa-sort-amount-up"></i>
              <p>
                Manage Units
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('unit.view') }}" class="nav-link {{( $route=='unit.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Units</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item {{($prefix=='/Category')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.view') }}" class="nav-link {{( $route=='category.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{($prefix=='/Product')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fab fa-product-hunt"></i>
              <p>
                Manage Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.view') }}" class="nav-link {{( $route=='products.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{($prefix=='/Purches')?'menu-open':''}}">
            <a href="#" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
              <p>
                Manage Purches
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purches.view') }}" class="nav-link {{( $route=='purches.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pending.view') }}" class="nav-link {{( $route=='pending.view.')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Purchase</p>
                </a>
              </li>

            </ul>
          </li>

            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
