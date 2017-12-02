@extends('sales.skeleton')

@section('content')
  <a href="{{ url('transaksi/tambah') }}">Order Buku</a>
  <h1>Cari Transaksi</h1>
  <form action="{{ url('transaksi/search') }}" method="get">
    <div>
      <input type="text" name="email" placeholder="Email" value="{{ $email }}">
    </div>
    <div>
      <input type="text" name="tanggal_transaksi" placeholder="Tanggal Transaksi" value="{{ $transaksi }}">
    </div>
    <div>
      <button type="submit">Cari</button>
    </div>
  </form>


  <table border="1">
    <thead>
      <th>No</th>
      <th>Kode Pemesanan</th>
      <th>Judul Buku</th>
      <th>Tahun Terbit</th>
      <th>Email Pemesan</th>
      <th>Harga Buku</th>
      <th>Jumlah Pesanan</th>
      <th>Brutto</th>
      <th>Diskon</th>
      <th>Netto</th>
      <th>Status</th>
      <th>Opsi</th>
    </thead>
    <tbody>
      @foreach ($data as $key => $value)
        @php
          $book = \App\Book::where('if_kode_buku', $value->if_kode_buku)->first();
        @endphp

        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $value->if_kode_pemesanan }}</td>
          <td>{{ $book->if_judul_buku }}</td>
          <td>{{ $book->if_tahun_terbit }}</td>
          <td>{{ $value->if_email_pemesan }}</td>
          <td>Rp.{{ number_format($book->if_harga, 2, ',', '.') }}</td>
          <td>{{ $value->if_jumlah_pemesanan }}</td>
          <td>Rp.{{ number_format($book->if_harga * $value->if_jumlah_pemesanan, 2, ',', '.') }}</td>

          {{-- Tidak ada diskon --}}
          @if ($value->if_jumlah_pemesanan < 20 && ($book->if_tahun_terbit - date('Y') == 0))
            <td>Rp.0</td>
            <td>Rp.{{ number_format($book->if_harga * $value->if_jumlah_pemesanan, 2, ',', '.') }}</td>
          {{-- Diskon Lebih Dari 20 --}}
          @elseif ($value->if_jumlah_pemesanan >= 20 && $value->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit == 0))
            @php
              $diskon = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.2;
              $netto = ($book->if_harga * $value->if_jumlah_pemesanan) - $diskon;
            @endphp
            <td>Rp.{{ number_format($diskon, 2, ',', '.') }}</td>
            <td>Rp.{{ number_format($netto, 2, ',', '.') }}</td>
          {{-- Diskon Lebih Dari 40 --}}
          @elseif ($value->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit == 0))
            @php
              $diskon = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.4;
              $netto = ($book->if_harga * $value->if_jumlah_pemesanan) - $diskon;
            @endphp
            <td>Rp.{{ number_format($diskon, 2, ',', '.') }}</td>
            <td>Rp.{{ number_format($netto, 2, ',', '.') }}</td>
          {{-- Diskon Lebih Dari 20 dan Buku Lama --}}
          @elseif ($value->if_jumlah_pemesanan >= 20 && $value->if_jumlah_pemesanan < 40 && (date('Y') - $book->if_tahun_terbit > 0))
            {{-- Ngitung diskon jumlah dulu --}}
            @php
              $diskon_jumlah = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.2;
            @endphp

            @for ($i=1; $i <= 10 ; $i++)
              {{-- Jika tahun terbit antara 1 - 10 tahun --}}
              @if (date("Y") - $book->if_tahun_terbit == $i)
                @php
                  $diskon_tahun = ($book->if_harga * $value->if_jumlah_pemesanan) * ($i * 0.005);
                @endphp
              {{-- Jika tahun terbit lebih dari 10 tahun --}}
              @elseif (date("Y") - $book->if_tahun_terbit > 10)
                @php
                  $diskon_tahun = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.5;
                @endphp
              @endif
            @endfor

            @php
              $diskon_total = $diskon_jumlah + $diskon_tahun;
              $netto = ($book->if_harga * $value->if_jumlah_pemesanan) - $diskon_total;
            @endphp
            <td>Rp.{{ number_format($diskon_total, 2, ',', '.') }}</td>
            <td>Rp.{{ number_format($netto, 2, ',', '.') }}</td>
          {{-- Diskon Lebih Dari 40 dan Buku Lama --}}
          @elseif ($value->if_jumlah_pemesanan >= 40 && (date('Y') - $book->if_tahun_terbit > 0))
            {{-- Ngitung diskon jumlah dulu --}}
            @php
              $diskon_jumlah = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.4;
            @endphp

            @for ($i=1; $i <= 10 ; $i++)
              {{-- Jika tahun terbit antara 1 - 10 tahun --}}
              @if (date("Y") - $book->if_tahun_terbit == $i)
                @php
                  $diskon_tahun = ($book->if_harga * $value->if_jumlah_pemesanan) * ($i * 0.005);
                @endphp
              {{-- Jika tahun terbit lebih dari 10 tahun --}}
              @elseif (date("Y") - $book->if_tahun_terbit > 10)
                @php
                  $diskon_tahun = ($book->if_harga * $value->if_jumlah_pemesanan) * 0.5;
                @endphp
              @endif
            @endfor

            @php
              $diskon_total = $diskon_jumlah + $diskon_tahun;
              $netto = ($book->if_harga * $value->if_jumlah_pemesanan) - $diskon_total;
            @endphp
            <td>Rp.{{ number_format($diskon_total, 2, ',', '.') }}</td>
            <td>Rp.{{ number_format($netto, 2, ',', '.') }}</td>
          {{-- Diskon Buku Lama --}}
          @elseif ($value->if_jumlah_pemesanan < 20 && (date('Y') - $book->if_tahun_terbit > 0))
            @for ($i=1; $i <= 10 ; $i++)
              @if (date("Y") - $book->if_tahun_terbit == $i)
                @php
                  $diskon = ($book->if_harga * $value->if_jumlah_pemesanan) * ($i * 0.005);
                  $netto = ($book->if_harga * $value->if_jumlah_pemesanan) - $diskon;
                @endphp
              @endif
            @endfor
            <td>Rp.{{ number_format($diskon, 2, ',', '.') }}</td>
            <td>Rp.{{ number_format($netto, 2, ',', '.') }}</td>
          @endif
          <td>{{ $value->if_kode_bayar }}</td>
          <td>
            <a href="{{ url('transaksi/ubah/'.$value->id) }}">Ubah</a>
            <a href="{{ url('transaksi/hapus/'.$value->id) }}">Hapus</a>
          </td>
        </tr>
      @endforeach
      @php
        $sum
      @endphp
      @if (count($data) > 1)
        <tr>
          <td colspan="9">Brutto</td>
          <td colspan="3">{{ count($data) }}</td>
        </tr>
        <tr>
          <td colspan="9">Diskon Lebih Dari 1 Buku</td>
          <td colspan="3">{{ count($data) }}</td>
        </tr>
        <tr>
          <td colspan="9">Netto</td>
          <td colspan="3">{{ count($data) }}</td>
        </tr>
      @else
        <tr>
          <td colspan="9">Netto</td>
          <td colspan="3">{{ count($data) }}</td>
        </tr>
      @endif
    </tbody>
  </table>
@endsection
