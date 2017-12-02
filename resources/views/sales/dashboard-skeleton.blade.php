<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Toko Buku</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}" media="screen" title="Materialize CSS" charset="utf-8">
    <link href="{{ url('assets/css/product-sans.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icon.css') }}" rel="stylesheet">
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/materialize.min.js') }}"></script>
  </head>
  <body class="grey lighten-4">
    @include('sales.css.css')
    @include('sales.templates.navbar')
  <main>
    @yield('content')
  </main>
  </body>
</html>
