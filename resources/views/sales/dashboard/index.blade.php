@extends('sales.dashboard-skeleton')
@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <a href="{{ url('order') }}" class="btn cyan">Order Buku</a>
            <h4>Daftar Buku</h4>
          </div>
        </div>
         <table class="striped centered responsive-table" border="1">
           <thead>
             <th>No</th>
             <th>Kode Buku</th>
             <th>Judul Buku</th>
             <th>Pengarang</th>
             <th>Penerbit</th>
             <th>Tahun Terbit</th>
             <th>Harga</th>
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
