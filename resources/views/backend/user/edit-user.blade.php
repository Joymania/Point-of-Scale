@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                  <h3>Edit User
                      <a class="btn btn-success float-right btn-sm" href="{{ route('users.view') }}"><i class="fa fa-list"></i> User List</a>
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('users.update',$data->id) }}" id="myform">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype">User Role</label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="">Select Role</option>
                                <option value="Admin"{{ ($data->usertype=="Admin")?"selected" :"" }}>Admin</option>
                                <option value="User"{{  ($data->usertype=="User")?"selected" :""}}>User</option>
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" >
                            <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $data->email }}" class="form-control" >
                            <font style="color: red">{{ ($errors->has('email'))? ($errors->first('email')):''}}</font>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="submit" value="submit" class="btn btn-primary">

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
           name: {
            required: true,
          },
          usertype: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6,
          },
          password2: {
            required: true,
            equalTo:'#password',
          },
        },
        messages: {
             name:{
                required:"Please enter your name",
            },

            usertype:{
                required:"please select a role",
            },

          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address",
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
          },
          password2: {
            required: "Please provide confirm password",
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
