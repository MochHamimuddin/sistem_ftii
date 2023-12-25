@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Tambah Data Dosen Pembimbing</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('dosen_create.proses') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="kode_dosen" class="col-md-4 col-lg-3 col-form-label">NIDN</label>
              <div class="col-md-8 col-lg-9">
                <input name="kode_dosen" type="number" class="form-control" id="kode_dosen" placeholder="Masukan NIDN">
              </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama">
                </div>
              </div>
              <div class="row mb-3">
                <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                <div class="col-md-8 col-lg-9">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="alamat" class="form-control" id="alamat" style="height: 80px" placeholder="Masukan Alamat Lengkap"></textarea>
                </div>
              </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="text" class="form-control" id="email" placeholder="Masukan Email">
                </div>
              </div>
            <div class="row mb-3">
              <label for="telpon" class="col-md-4 col-lg-3 col-form-label">No Telpon</label>
              <div class="col-md-8 col-lg-9">
                <input name="telpon" type="text" class="form-control" id="telpon" placeholder="Masukan No Telpon">
              </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Password">
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
