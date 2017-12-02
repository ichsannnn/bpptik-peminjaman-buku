@extends('sales.skeleton')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12">
                  <a href="{{ Request::url() }}" class="breadcrumb">Admin</a>
                  <a href="javascript:void(0)" class="breadcrumb">Daftar Transaksi</a>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Daftar Transaksi</h4>
          </div>
        </div>
        <div class="row margin-bottom">
            {{-- <form id="search_form" class="col s12 ml6 l6" action="{{ url('master/grade/search') }}" method="get">
              <div class="row margin-bottom">
                <div class="input-field col s9">
                  <input id="search_grade" name="query" type="text" class="validate" >
                  <label for="search_grade">Cari Kelas</label>
                </div>
                <div class="input-field col s3">
                  <button type="submit" class="btn waves-effect waves-light cyan"><i class="material-icons">search</i></button>
                </div>
              </div>
            </form> --}}
         </div>
         <table class="striped centered responsive-table" border="1">
           <thead>
             <th>No</th>
             <th>Kode Pemesanan</th>
             <th>Judul Buku</th>
             <th>Email Pemesan</th>
             <th>Jumlah Pesanan</th>
             <th>Status Pembayaran</th>
             <th width="200">Opsi</th>
           </thead>
           <tbody>
             @foreach ($data as $key => $value)
               @php
                 $book = \App\Book::where('if_kode_buku', $value->if_kode_buku)->first();
               @endphp

               <tr>
                 <td>{{ $key + 1 }}</td>
                 <td><a href="{{ url('admin/transaksi/' . $value->if_kode_pemesanan) }}">{{ $value->if_kode_pemesanan }}</a></td>
                 <td>{{ $book->if_judul_buku }}</td>
                 <td>{{ $value->if_email_pemesan }}</td>
                 <td>{{ $value->if_jumlah_pemesanan }}</td>
                 <td>
                   @if ($value->if_kode_bayar == "Belum Bayar")
                     <span class="left new badge red" data-badge-caption="Belum Bayar"></span>
                   @elseif ($value->if_kode_bayar == "Sudah Bayar")
                     <span class="left new badge green" data-badge-caption="Sudah Bayar"></span>
                   @endif
                 </td>
                 <td>
                   @if ($value->if_kode_bayar == "Belum Bayar")
                     <a href="{{ url('admin/transaksi/done/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light blue" data-position="top" data-delay="50" data-tooltip="Setujui Transaksi"><i class="material-icons">done</i></a>
                   @elseif ($value->if_kode_bayar == "Sudah Bayar")
                     <a href="{{ url('admin/transaksi/cancel/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Batalkan Transaksi"><i class="material-icons">close</i></a>
                   @endif
                   <a href="{{ url('admin/transaksi/ubah/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light cyan" data-position="top" data-delay="50" data-tooltip="Ubah Transaksi"><i class="material-icons">edit</i></a>
                   <a href="{{ url('admin/transaksi/hapus/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Hapus Transaksi"><i class="material-icons">delete</i></a>
                 </td>
               </tr>
             @endforeach
           </tbody>
         </table>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <div class="right">
              {{-- @if($query!="")
              {{ $data->appends(['query'=>$query])->links() }}
              @else
              {{ $data->links() }}
              @endif --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
