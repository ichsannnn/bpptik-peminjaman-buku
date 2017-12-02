@extends('sales.dashboard-skeleton')
@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        @if(session('message'))
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="card-panel green darken-1 white-text">
              {{ session('message') }}
            </div>
          </div>
        </div>
        @endif
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Order Buku</h4>
          </div>
        </div>
        <div class="row">
          <form class="col s12" id="formCreate" action="{{ url('order') }}" method="post">
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
                  <label for="jumlah_pemesanan">Jumlah Pemesanan (Eksemplar)</label>
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
                <a href="{{ url('/') }}" class="btn waves-effect waves-light grey lighten-1">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
