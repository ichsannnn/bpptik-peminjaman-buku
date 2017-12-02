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
        <div class="row">
          <table class="striped centered responsive-table" border="1">
            <thead>
              <th>Kode Pemesanan</th>
              <th>Judul Buku</th>
              <th>Email Pemesan</th>
              <th>Jumlah Pesanan</th>
              <th>Status Pembayaran</th>
            </thead>
            <tbody>
              @php
                $book = \App\Book::where('if_kode_buku', $data->if_kode_buku)->first();
              @endphp
              <tr>
                <td><a href="{{ url('transaksi/' . $data->if_kode_pemesanan) }}">{{ $data->if_kode_pemesanan }}</a></td>
                <td>{{ $book->if_judul_buku }}</td>
                <td>{{ $data->if_email_pemesan }}</td>
                <td>{{ $data->if_jumlah_pemesanan }}</td>
                <td>
                  @if ($data->if_kode_bayar == "Belum Bayar")
                    <span class="new badge red" data-badge-caption="Belum Bayar"></span>
                  @elseif ($data->if_kode_bayar == "Sudah Bayar")
                    <span class="new badge green" data-badge-caption="Sudah Bayar"></span>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
