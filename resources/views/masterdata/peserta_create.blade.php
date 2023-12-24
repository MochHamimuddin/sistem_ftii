@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Detail Peserta</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('mhs_create.proses') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="nim" class="col-md-4 col-lg-3 col-form-label">Nim</label>
              <div class="col-md-8 col-lg-9">
                <input name="nim" type="number" class="form-control" id="nim" placeholder="Masukan Nim">
              </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="name" type="text" class="form-control" id="name" placeholder="Masukan Nama">
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
                <label for="semester" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                <div class="col-md-8 col-lg-9">
                    <select id="semester" name="semester" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Pilih Semester</option>
                        <option value="1(Ganjil)">1(Ganjil)</option>
                        <option value="2(Genap)">2(Genap)</option>
                        <option value="3(Ganjil)">3(Ganjil)</option>
                        <option value="4(Genap)">4(Genap)</option>
                        <option value="5(Ganjil)">5(Ganjil)</option>
                        <option value="6(Genap)">6(Genap)</option>
                        <option value="7(Ganjil)">7(Ganjil)</option>
                        <option value="8(Genap)">8(Genap)</option>
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
            <div class="row mb-3">
                <label for="program_id" class="col-md-4 col-lg-3 col-form-label">Program</label>
                <div class="col-md-8 col-lg-9">
                    <select id="program_id" name="program_id" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Pilih Program</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->nama }}</option>
                        @endforeach
                    </select>
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
