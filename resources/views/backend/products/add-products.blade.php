@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                  <h3>Add Products
                      <a class="btn btn-success float-right btn-sm" href="{{ route('products.view') }}"><i class="fa fa-list"></i> Products List</a>
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('products.store') }}" id="myform1">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="supplier_id">Supplier Name</label>
                              <select class="form-control" name="supplier_id" id="supplier_id">
                                <option value="" >Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                        <div class="form-group col-md-6">
                            <label for="category_id">Category</label>
                              <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                @endforeach
                              </select>
                            <font style="color: red">{{ ($errors->has('mobile'))? ($errors->first('mobile')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"  id="name" >
                            <font style="color: red">{{ ($errors->has('email'))? ($errors->first('email')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_id">Units</label>
                              <select class="form-control" name="unit_id" id="unit_id">
                                <option value="">Select Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                              </select>
                            <font style="color: red">{{ ($errors->has('mobile'))? ($errors->first('mobile')):''}}</font>
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

@endsection
@push('script')

<script type="text/javascript">
    $(document).ready(function () {
      $('#myform1').validate({
        rules: {
            supplier_id: {
            required: true,
          },
          category_id: {
            required: true,
          },

          unit_id: {
            required: true,
          },
          name: {
            required: true,
          },

        },
        // messages: {
        // },
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

@endpush
