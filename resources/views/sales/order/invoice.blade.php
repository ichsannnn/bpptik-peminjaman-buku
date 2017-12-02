@extends('sales.skeleton')
@section('content')
  @php
    $book = \App\Book::where('if_kode_buku', $data->if_kode_buku)->first();
    $diskon = "";
    $diskon_total = "";
  @endphp
  {{-- Tidak ada diskon --}}
  @if ($data->if_jumlah_pemesanan < 20 && ($book->if_tahun_terbit - date('Y') == 0))
    @php
      $diskon = 0;
      $netto = $book->if_harga * $data->if_jumlah_pemesanan
    @endphp
  {{-- Diskon Lebih Dari 20 --}}
  @elseif ($data->if_jumlah_pemesanan >= 20 && $data->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit == 0))
    @php
      $diskon = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.2;
      $netto = ($book->if_harga * $data->if_jumlah_pemesanan) - $diskon;
    @endphp
  {{-- Diskon Lebih Dari 40 --}}
  @elseif ($data->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit == 0))
    @php
      $diskon = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.4;
      $netto = ($book->if_harga * $data->if_jumlah_pemesanan) - $diskon;
    @endphp
  {{-- Diskon Lebih Dari 20 dan Buku Lama --}}
  @elseif ($data->if_jumlah_pemesanan >= 20 && $data->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit > 0))
    {{-- Ngitung diskon jumlah dulu --}}
    @php
      $diskon_jumlah = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.2;
    @endphp

    @for ($i=1; $i <= 10 ; $i++)
      {{-- Jika tahun terbit antara 1 - 10 tahun --}}
      @if (date("Y") - $book->if_tahun_terbit == $i)
        @php
          $diskon_tahun = ($book->if_harga * $data->if_jumlah_pemesanan) * ($i * 0.005);
        @endphp
      {{-- Jika tahun terbit lebih dari 10 tahun --}}
      @elseif (date("Y") - $book->if_tahun_terbit > 10)
        @php
          $diskon_tahun = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.5;
        @endphp
      @endif
    @endfor

    @php
      $diskon_total = $diskon_jumlah + $diskon_tahun;
      $netto = ($book->if_harga * $data->if_jumlah_pemesanan) - $diskon_total;
    @endphp
  {{-- Diskon Lebih Dari 40 dan Buku Lama --}}
  @elseif ($data->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit > 0))
    {{-- Ngitung diskon jumlah dulu --}}
    @php
      $diskon_jumlah = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.4;
    @endphp

    @for ($i=1; $i <= 10 ; $i++)
      {{-- Jika tahun terbit antara 1 - 10 tahun --}}
      @if (date("Y") - $book->if_tahun_terbit == $i)
        @php
          $diskon_tahun = ($book->if_harga * $data->if_jumlah_pemesanan) * ($i * 0.005);
        @endphp
      {{-- Jika tahun terbit lebih dari 10 tahun --}}
      @elseif (date("Y") - $book->if_tahun_terbit > 10)
        @php
          $diskon_tahun = ($book->if_harga * $data->if_jumlah_pemesanan) * 0.5;
        @endphp
      @endif
    @endfor

    @php
      $diskon_total = $diskon_jumlah + $diskon_tahun;
      $netto = ($book->if_harga * $data->if_jumlah_pemesanan) - $diskon_total;
    @endphp
  {{-- Diskon Buku Lama --}}
  @elseif ($data->if_jumlah_pemesanan < 20 && (date('Y') - $book->if_tahun_terbit > 0))
    @for ($i=1; $i <= 10 ; $i++)
      @if (date("Y") - $book->if_tahun_terbit == $i)
        @php
          $diskon = ($book->if_harga * $data->if_jumlah_pemesanan) * ($i * 0.005);
          $netto = ($book->if_harga * $data->if_jumlah_pemesanan) - $diskon;
        @endphp
      @endif
    @endfor
  @endif

  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Transaksi</h4>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Status Pembayaran
          </div>
          <div class="col s12 m9 l9">
            @if ($data->if_kode_bayar == "Belum Bayar")
              <span class="left new badge red" data-badge-caption="Belum Bayar"></span>
            @elseif ($data->if_kode_bayar == "Sudah Bayar")
              <span class="left new badge green" data-badge-caption="Sudah Bayar"></span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Kode Pemesanan
          </div>
          <div class="col s12 m9 l9">
            {{ $data->if_kode_pemesanan }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Judul Buku
          </div>
          <div class="col s12 m9 l9">
            {{ $book->if_judul_buku }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Harga Buku
          </div>
          <div class="col s12 m9 l9">
            Rp.{{ number_format($book->if_harga, 2, ',', '.') }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Tahun Terbit
          </div>
          <div class="col s12 m9 l9">
            {{ $book->if_tahun_terbit }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Email Pemesan
          </div>
          <div class="col s12 m9 l9">
            {{ $data->if_email_pemesan }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Jumlah Pemesanan
          </div>
          <div class="col s12 m9 l9">
            {{ $data->if_jumlah_pemesanan }} Eksemplar
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Keterangan
          </div>
          <div class="col s12 m9 l9">
            {{ $data->if_keterangan }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Tangal Pemesanan
          </div>
          <div class="col s12 m9 l9">
            {{ $data->if_tanggal_pemesanan }}
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col s12 m3 l3">
            Brutto
          </div>
          <div class="col s12 m9 l9">
            Rp.{{ number_format(($book->if_harga * $data->if_jumlah_pemesanan), 2, ',', '.') }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m3 l3">
            Diskon
          </div>
          <div class="col s12 m9 l9">
            @if ($diskon_total == "")
              Rp.{{ number_format($diskon, 2, ',', '.') }}
            @elseif ($diskon == "")
              Rp.{{ number_format($diskon_total, 2, ',', '.') }}
            @endif
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col s12 m3 l3">
            Netto
          </div>
          <div class="col s12 m9 l9">
            Rp.{{ number_format($netto, 2, ',', '.') }}
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l12">
            <a href="{{ url('lihat-transaksi') }}" class="btn waves-effect waves-light grey lighten-1">Kembali</a>
            @if ($data->if_kode_bayar == "Belum Bayar")
              <a href="{{ url('admin/transaksi/done/' . $data->id) }}" class="btn waves-effect waves-light green">Setujui</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
