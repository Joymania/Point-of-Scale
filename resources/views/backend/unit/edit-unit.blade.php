@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Units</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Units</li>
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
                  <h3>Edit Units
                      <a class="btn btn-success float-right btn-sm" href="{{ route('unit.view') }}"><i class="fa fa-list"></i> Units List</a>
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('unit.update',$data->id) }}" id="myform">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="name">Unit Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" >
                            <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="update" class="btn btn-primary">

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
        },
        messages: {
             name:{
                required:"Please enter your name",
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
