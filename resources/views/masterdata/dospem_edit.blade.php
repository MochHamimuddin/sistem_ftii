@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Edit Data Dosen Pembimbing</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('dosen.update', $dosen->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
              <div class="col-md-8 col-lg-9">
                <img src="{{ asset('foto_peserta/img/'.$dosen->foto) }}">
                <div class="pt-2">
                  <input name="foto" type="file" class="form-control" id="foto" onchange="readFoto(event)" value="{{ $dosen->foto }}"
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
              <label for="kode_dosen" class="col-md-4 col-lg-3 col-form-label">NIDN</label>
              <div class="col-md-8 col-lg-9">
                <input name="kode_dosen" type="number" class="form-control" id="kode_dosen" value="{{ $dosen->kode_dosen }}">
              </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="nama" type="text" class="form-control" id="nama" value="{{ $dosen->nama }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                <div class="col-md-8 col-lg-9">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-lg" required>
                        @if($dosen->jenis_kelamin == 'L')
                            <option value="L" selected>Laki-laki</option>
                            <option value="P">Perempuan</option>
                        @elseif($dosen->jenis_kelamin == 'P')
                            <option value="L">Laki-laki</option>
                            <option value="P" selected>Perempuan</option>
                        @else
                            <option value="{{ $dosen->jenis_kelamin }}" selected>{{ $dosen->jenis_kelamin }}</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        @endif
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="alamat" class="form-control" id="alamat" style="height: 80px">{{ $dosen->alamat }}</textarea>
                </div>
              </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="text" class="form-control" id="email" value="{{ $dosen->email }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="password" type="password" class="form-control" id="password" value="{{ $dosen->password }}">
                </div>
              </div>
            <div class="row mb-3">
              <label for="telpon" class="col-md-4 col-lg-3 col-form-label">No Telpon</label>
              <div class="col-md-8 col-lg-9">
                <input name="telpon" type="text" class="form-control" id="telpon" value="{{ $dosen->telpon }}">
              </div>
            </div>
            <div class="text-center">
                <br/>
                <a href="{{ route('dosen.index') }}" class="btn btn-danger">Kembali</a>
              <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
    </div>
  </div>
</section>
@endsection
