@extends('sales.skeleton')
@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m6 l6">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12">
                  <a href="{{ Request::url('/') }}" class="breadcrumb">Admin</a>
                  <a class="breadcrumb">Buku</a>
                  <a href="javascript:void(0)" class="breadcrumb">Tambah</a>
                </div>
              </div>
            </nav>
          </div>
        </div>

        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tambah Buku</h4>
          </div>
        </div>
        <div class="row">
          <form class="col s12" id="formCreate" action="{{ url('admin/buku/tambah') }}" method="post">
            <div class="row margin-bottom">
              {!! csrf_field() !!}
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" name="judul_buku">
                  <label>Judul Buku</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" name="pengarang">
                  <label for="nis">Pengarang</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" name="penerbit">
                  <label for="nis">Penerbit</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" name="tahun_terbit">
                  <label for="nis">Tahun Terbit</label>
                </div>
              </div>
              <div class="row margin-bottom">
                <div class="input-field col s12 m12 l12">
                  <input type="text" name="harga">
                  <label for="nis">Harga</label>
                </div>
              </div>
            </div>
            <div class="row margin-bottom right">
              <div class="input-field col s12">
                <button type="submit" id="btnCreate" class="btn waves-effect waves-light cyan">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
