<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Masuk - Toko Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}" media="screen" title="Materialize CSS" charset="utf-8">
    <link href="{{ url('assets/css/product-sans.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/login.css') }}" rel="stylesheet">
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/materialize.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('.button-collapse').sideNav();
      });
    </script>
  </head>
  <body class="grey lighten-4">
  <div class="navbar-fixed">
    <nav class="cyan">
      <div class="nav-wrapper container">
        <a href="{{ url('/') }}" class="brand-logo"><i class="material-icons">local_library</i>Toko Buku</a>
        <a href="javascript:void(0)" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
  <div class="login-container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <form action="{{ url('login') }}" method="post">
            {{ csrf_field() }}
            <div class="row margin-bottom center">
              <div class="col s12 m12 l12">
                <div class="cyan center login-circle">
                  <i class="material-icons md-120 white-text">local_library</i>
                </div>
              </div>
            </div>
            <div class="row margin-bottom">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text" name="username" class="validate" required>
                <label for="username">Username</label>
              </div>
            </div>
            <div class="row margin-bottom">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix">lock</i>
                <input id="password" type="password" name="password" class="validate" required>
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <button type="submit" class="btn btn-full cyan waves-effect waves-block waves-light">Masuk</button>
              </div>
            </div>
            @if(session('message'))
            <div class="row margin-bottom">
              <div class="col s12 m12 l12">
                <div class="card-panel red darken-1 white-text">
                  {{ session('message') }}
                </div>
              </div>
            </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
