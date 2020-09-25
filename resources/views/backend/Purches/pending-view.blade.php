@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Purches</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purches</li>
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
                  <h3>Pending Purches List
                      {{-- <a class="btn btn-success float-right btn-sm" href="{{ route('purches.add') }}"><i class="fa fa-plus-circle"></i> Add Purches</a> --}}
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive">

                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Date</th>
                            <th>Purches No</th>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Buying Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key => $purches)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('d-m-Y',strtotime($purches->date))}}</td>
                            <td>{{ $purches->purches_no }}</td>
                            <td>{{$purches['supplier']['name']}}</td>
                            <td>{{$purches['category']['name']}}</td>
                            
                            <td>{{ $purches['product']['name'] }}</td>
                            <td>{{$purches->description}}</td>
                            <td>
                              {{$purches->buying_qty}}
                              {{$purches['product']['unit']['name']}}
                            </td>
                            <td>{{$purches->unit_price}}</td>
                            <td>{{$purches->buying_price}}</td>
                            <td>
                              @if($purches->status=='0')
                              <span style="background:#FA5661;padding:5px;">Pending</span>
                              @else
                              <span style="background:green;padding:5px;">Approved</span>
                              @endif
                            </td>
                            <td>
                              @if($purches->status=='0')
                                <a title="Approved" id="approveBtn" class="btn btn-sm btn-success" href="{{ route('purches.approve',$purches->id) }}" ><i class="fa fa-check-circle"></i></a>
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
