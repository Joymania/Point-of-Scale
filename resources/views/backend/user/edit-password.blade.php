@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
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
                  <h3>Edit Password
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('password.store') }}" id="myform">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="password">Current Password</label>
                            <input type="password" name="currentpassword" id="currentpassword" class="form-control" >
                            <font style="color: red">{{ ($errors->has('currentpassword'))? ($errors->first('currentpassword')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password">New Password</label>
                            <input type="password" name="newpassword" id="newpassword" class="form-control" >
                            <font style="color: red">{{ ($errors->has('newpassword'))? ($errors->first('newpassword')):''}}</font>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" >
                            <font style="color: red">{{ ($errors->has('confirmpassword'))? ($errors->first('confirmpassword')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Update" class="btn btn-primary">

                        </div>

                    </div>

                </form>
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
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
          currentpassword: {
            required: true,
            minlength: 6,
          },
          newpassword: {
            required: true,
            minlength: 6,
          },
          confirmpassword: {
            required: true,
            equalTo:'#newpassword',
          },
        },
        messages: {
          currentpassword: {
            required: "Please enter your current password",
            minlength: "Your password must be at least 6 characters long",
          },
          newpassword: {
            required: "Please enter your new password",
            minlength: "Your password must be at least 6 characters long",
          },
          confirmpassword: {
            required: "Please enter password again",
            equalTo: "Your password doesn't matched",
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection
