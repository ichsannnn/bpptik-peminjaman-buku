<div class="navbar-fixed">
  <nav class="cyan">
  <div class="nav-wrapper container">
    <a href="{{ url('/') }}" class="brand-logo"><i class="material-icons">local_library</i>Toko Buku</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      @if (Auth::check())
        <li class="waves-effect waves-light"><a href="{{ url('admin/buku') }}" class="main-nav">Admin</a></li>
        <li class="waves-effect waves-light"><a href="{{ url('logout') }}" class="main-nav">Keluar</a></li>
      @else
        <li class="waves-effect waves-light"><a href="{{ url('lihat-transaksi') }}" class="main-nav">Lihat Transaksi</a></li>
        <li class="waves-effect waves-light"><a href="{{ url('login') }}" class="main-nav">Login</a></li>
      @endif
    </ul>
  </div>
</nav>
</div>
