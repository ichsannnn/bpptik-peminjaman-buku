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
                  <a href="javascript:void(0)" class="breadcrumb">Daftar Buku</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
                <a href="{{ url('admin/buku/tambah') }}" class="btn modal-trigger tooltipped waves-effect waves-light cyan" data-position="top" data-delay="50" data-tooltip="Tambah Buku"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Daftar Buku</h4>
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
         <table class="striped centered responsive-table">
           <thead>
             <th>No</th>
             <th>Kode Buku</th>
             <th>Judul Buku</th>
             <th>Pengarang</th>
             <th>Penerbit</th>
             <th>Tahun Terbit</th>
             <th>Harga</th>
             <th>Opsi</th>
           </thead>
           <tbody>
             @foreach ($book as $key => $value)
               <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $value->if_kode_buku }}</td>
                 <td>{{ $value->if_judul_buku }}</td>
                 <td>{{ $value->if_pengarang }}</td>
                 <td>{{ $value->if_penerbit }}</td>
                 <td>{{ $value->if_tahun_terbit }}</td>
                 <td>Rp{{ number_format($value->if_harga, 2, ',', '.') }}</td>
                 <td>
                   <a href="{{ url('admin/buku/ubah/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light cyan" data-position="top" data-delay="50" data-tooltip="Ubah Buku"><i class="material-icons">edit</i></a>
                   <a href="{{ url('admin/buku/hapus/' . $value->id) }}" class="btn modal-trigger tooltipped waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Hapus Buku"><i class="material-icons">delete</i></a>
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
