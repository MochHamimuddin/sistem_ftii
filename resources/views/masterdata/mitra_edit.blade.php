@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Edit Data Mitra</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('mitra.update', $mitra->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Mitra</label>
              <div class="col-md-8 col-lg-9">
                <img src="{{ asset('foto_mitra/img/'.$mitra->foto) }}">
                <div class="pt-2">
                  <input name="foto" type="file" class="form-control" id="foto" onchange="readFoto(event)" value="{{ $mitra->foto }}"
                  class="btn btn-primary btn-sm" @error('foto') is-inavalid @enderror>
                  <i>/*nb : ukuran foto 120 x 120</i>
                  <img id="output" style="width: 100px;">
                  @error('foto')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="nama" type="text" class="form-control" id="nama" value="{{ $mitra->nama }}">
                </div>
              </div>
            <div class="text-center">
                <br/>
                <a href="{{ route('mitra.index') }}" class="btn btn-danger">Kembali</a>
              <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
    </div>
  </div>
</section>
@endsection
