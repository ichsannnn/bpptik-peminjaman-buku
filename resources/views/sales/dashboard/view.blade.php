@extends('sales.dashboard-skeleton')
@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Lihat Transaksi</h4>
          </div>
        </div>
        <div class="row">
          <form class="col s12" id="formCreate" action="{{ url('transaksi') }}" method="get">
            <div class="row margin-bottom">
              <div class="col s6 m6 l6">
                <div class="row margin-bottom">
                  <div class="input-field col s12 m12 l12">
                    <select class="browser-default" name="tipe">
                      <option selected disabled>Pilih tipe . .</option>
                      <option value="kp">Kode Pemesanan</option>
                      <option value="e">Email</option>
                      <option value="tp">Tanggal Pemesanan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col s6 m6 l6">
                <div class="row margin-bottom">
                  <div class="input-field col s12 m12 l12">
                    <input type="text" id="email" name="value" autocomplete="off">
                    <label for="nis">Cari Transaksi</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row margin-bottom right">
              <div class="input-field col s12">
                <button type="submit" id="btnCreate" class="btn waves-effect waves-light cyan">Cari</button>
                <a href="{{ url('/') }}" class="btn waves-effect waves-light grey lighten-1">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
