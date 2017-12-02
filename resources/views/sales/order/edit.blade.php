@extends('sales.skeleton')

@section('content')
  <h1>Ubah Order</h1>
  <form action="{{ url('transaksi/ubah') }}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div>
      <input type="text" name="email_pemesan" placeholder="Email" value="{{ $data->if_email_pemesan }}">
    </div>
    <div>
      <select name="kode_buku">
        <option selected disabled>Pilih buku . .</option>
        @foreach ($book as $key => $value)
          <option value="{{ $value->if_kode_buku }}" @if ($value->if_kode_buku == $data->if_kode_buku) selected @endif>{{ $value->if_judul_buku }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <input type="number" name="jumlah_pemesanan" placeholder="Jumlah Pesanan" value="{{ $data->if_jumlah_pemesanan }}">
    </div>
    <div>
      <textarea name="keterangan" rows="4" cols="40" placeholder="Keterangan">{{ $data->if_keterangan }}</textarea>
    </div>
    <div>
      <button type="submit">Pesan</button>
    </div>
  </form>
@endsection
