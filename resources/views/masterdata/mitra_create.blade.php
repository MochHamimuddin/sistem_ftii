@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Tambah Data Mitra</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('mitra_create.proses') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama">
                </div>
              </div>
              <div class="row mb-3">
                <label for="foto" class="col-md-4 col-lg-3 col-form-label">Foto Mitra</label>
                <div class="col-md-8 col-lg-9">
                  <input name="foto" type="file" class="form-control" id="foto" placeholder="Upload Foto">
                </div>
              </div>
            <div class="text-center">
                <br/>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
          </form>
    </div>
  </div>
</section>
@endsection
