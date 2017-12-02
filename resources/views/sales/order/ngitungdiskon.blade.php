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
