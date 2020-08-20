@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                  <h3>Profile
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="card card-primary card-outline col-md-4 offset-md-4">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ (!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}"
                             alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center">{{ $user->name }}</h3>

                      <p class="text-muted text-center">{{ $user->address }}</p>

                     <table width="100%" class="table table-bordered">
                         <tbody>
                             <tr>
                                 <td>Mobile No</td>
                                 <td>{{ $user->mobile }}</td>
                             </tr>
                             <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                         </tbody>
                     </table>

                      <a href="{{ route('profiles.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    </div>
                    <!-- /.card-body -->
                  </div>
              </div><!-- /.card-body -->
            </div>

          </section>
          <!-- /.Le
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
