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
                  <h3>Products List
                      <a class="btn btn-success float-right btn-sm" href="{{ route('products.add') }}"><i class="fa fa-plus-circle"></i> Add Products</a>
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key => $products)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $products['supplier']['name'] }}</td>
                            <td>{{ $products['category']['name'] }}</td>
                            <td>{{ $products->name }}</td>
                            <td>{{ $products['unit']['name']}}</td>
                            @php
                            $count_supplier=App\Purches::where('product_id',$products->id)->count();
                            @endphp
                            <td>
                                <a title="Edit"  class="btn btn-sm btn-primary" href="{{ route('products.edit',$products->id) }}"><i class="fa fa-edit"></i></a>
                                @if($count_supplier<1)
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('products.delete',$products->id) }}" ><i class="fa fa-trash"></i></a>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
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
