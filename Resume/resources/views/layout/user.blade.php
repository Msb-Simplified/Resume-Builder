<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Laravel CSRF Token -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- here show dynamic page title, which define from another blade file -->
    <title> @yield('title') </title>
    {{-- Title image --}}
    <link rel="icon" href="{{url('/Asset/image/msb.png')}}">



    <!-- CSS Link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ url('/Asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/Asset/css/layout/default.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">


    <script src="{{ url('/Asset/js/plugin/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ url('/Asset/js/plugin/bootstrap.bundle.min.js') }}"></script>

    @stack('styles')
    @stack('scripts')
  </head>

  <body>  


    <!-- Here show dynamic blade.php file content -->
    @yield('content')
    
    
    <script>
      @if(Session::has('message'))
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
      var type = "{{ Session::get('alert-type') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
      @endif


    </script>

  </body>
</html>