<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trafas | Mobile Tracker</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css?v=3.2.0">

  @stack('custom-css')
  @livewireStyles

</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    @include('layout.navbar')

    @include('layout.sidebar')

    <div class="content-wrapper">
      <section class="content-header">
        {{-- <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blank Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
              </ol>
            </div>
          </div>
        </div> --}}

        @yield('namepage')
      </section>

      <section class="content">

        @yield('content')

      </section>
    </div>

    @include('layout.footer')

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>

  {{-- Script JS --}}
  <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
  <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js?v=3.2.0"></script>

  @stack('custom-script')
  @livewireScripts
</body>

</html>
