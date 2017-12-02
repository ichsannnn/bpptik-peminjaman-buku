<ul id="slide-out" class="side-nav fixed">
  <li class="waves-effect waves-block @if(str_is(url('/'),url()->current()))active @endif"><a href="{{ url('/') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>

    <li>
      <ul class="collapsible collapsible-accordion">
        <li @if(str_is(url('admin/buku').'*',url()->current()))class="active" @endif>
          <a class="collapsible-header waves-effect waves-block @if(str_is(url('admin/buku').'*',url()->current()))active @endif">Buku<i class="material-icons">insert_drive_file</i></a>
          <div class="collapsible-body">
            <ul>
              <li class="waves-effect waves-block @if(str_is(url('admin/buku').'*',url()->current()))waves-light active @endif"><a href="{{ url('admin/buku') }}">Daftar Buku</a></li>
            </ul>
          </div>
        </li>
        <li @if(str_is(url('admin/transaksi').'*',url()->current()))class="active" @endif>
          <a class="collapsible-header waves-effect waves-block @if(str_is(url('admin/transaksi').'*',url()->current()))active @endif">Transaksi<i class="material-icons">shopping_cart</i></a>
          <div class="collapsible-body">
            <ul>
              <li class="waves-effect waves-block @if(str_is(url('admin/transaksi').'*',url()->current()))waves-light active @endif"><a href="{{ url('admin/transaksi') }}">Daftar Transaksi</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>

  <li class="mobile-menu"><div class="divider"></div></li>
  <li class="mobile-menu"><a class="subheader">Akun Anda</a></li>
  {{-- <li class="mobile-menu waves-effect waves-block"><a href="{{ url('user') }}"><i class="material-icons">account_circle</i>User</a></li> --}}
  <li class="mobile-menu waves-effect waves-block"><a href="{{ url('auth/logout') }}"><i class="material-icons">exit_to_app</i>Keluar</a></li>
  <li class="mobile-menu waves-effect waves-block"><a href="http://110.232.89.67/saspro"><i class="material-icons">apps</i>SiPUINTer</a></li>
</ul>
