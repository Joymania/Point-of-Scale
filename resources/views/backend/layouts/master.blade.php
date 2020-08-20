@include('backend.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
@include('backend.layouts.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('backend.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
 <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@if (session()->has('success'))

<script>
    $(function(){
        $.notify("{{ session()->get('success') }}",{globalPosition:'top right',className:'success'});
    });
</script>

@endif
@if (session()->has('error'))

<script>
    $(function(){
        $.notify("{{ session()->get('error') }}",{globalPosition:'top right',className:'error'});
    });
</script>

@endif



  <!-- /.content-wrapper -->
@include('backend.layouts.footer')
