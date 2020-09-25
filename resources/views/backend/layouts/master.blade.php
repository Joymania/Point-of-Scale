@include('backend.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
@include('backend.layouts.nav')

@include('backend.layouts.sidebar')


  @yield('content')


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

@include('backend.layouts.footer')



