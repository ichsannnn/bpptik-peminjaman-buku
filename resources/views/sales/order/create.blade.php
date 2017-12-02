@extends('sales.dashboard-skeleton')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        {{-- <div class="row">
          <div class="col s12 m6 l6">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12">
                  <a href="{{ Request::url('/') }}" class="breadcrumb">Admin</a>
                  <a class="breadcrumb">Transaksi</a>
                  <a href="javascript:void(0)" class="breadcrumb">Tambah</a>
                </div>
              </div>
            </nav>
          </div>
        </div> --}}

        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Order Buku</h4>
          </div>
        </div>
        <div class="row">
          <form class="col s12" id="formCreate" action="{{ url('transaksi/tambah') }}" method="post">
            <div class="row margin-bottom">
              {!! csrf_field() !!}
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <select class="browser-default" name="kode_buku">
                    <option selected disabled>Pilih buku . .</option>
                    @foreach ($book as $key => $value)
                      <option value="{{ $value->if_kode_buku }}">{{ $value->if_judul_buku }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" id="email" name="email_pemesan" autocomplete="off">
                  <label for="nis">Email</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="number" id="jumlah_pemesanan" name="jumlah_pemesanan" autocomplete="off">
                  <label for="jumlah_pemesanan">Jumlah Pemesanan</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12">
                  <textarea name="keterangan"  class="materialize-textarea"></textarea>
                  <label for="textarea1">Keterangan</label>
                </div>
              </div>
            </div>
            <div class="row margin-bottom right">
              <div class="input-field col s12">
                <button type="submit" id="btnCreate" class="btn waves-effect waves-light cyan">Order</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- <h1>Order Buku</h1>
  <form action="{{ url('transaksi/tambah') }}" method="post">
    {!! csrf_field() !!}
    <div>
      <input type="text" name="email_pemesan" placeholder="Email">
    </div>
    <div>
      <select name="kode_buku">
        <option selected disabled>Pilih buku . .</option>
        @foreach ($book as $key => $value)
          <option value="{{ $value->if_kode_buku }}">{{ $value->if_judul_buku }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <input type="number" name="jumlah_pemesanan" placeholder="Jumlah Pesanan">
    </div>
    <div>
      <textarea name="keterangan" rows="4" cols="40" placeholder="Keterangan"></textarea>
    </div>
    <div>
      <button type="submit">Pesan</button>
    </div>
  </form> --}}
@endsection
