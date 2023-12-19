@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Detail Peserta</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('mhs.update', $mhs->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
              <div class="col-md-8 col-lg-9">
                <img src="{{ asset('foto_peserta/img/'.$mhs->foto) }}">
                <div class="pt-2">
                  <input name="foto" type="file" class="form-control" id="foto" onchange="readFoto(event)" value="{{ $mhs->foto }}"
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
              <label for="nim" class="col-md-4 col-lg-3 col-form-label">Nim</label>
              <div class="col-md-8 col-lg-9">
                <input name="nim" type="number" class="form-control" id="nim" value="{{ $mhs->nim }}">
              </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <input name="name" type="text" class="form-control" id="name" value="{{ $mhs->name }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                <div class="col-md-8 col-lg-9">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-lg" required>
                        @if($mhs->jenis_kelamin == 'L')
                            <option value="L" selected>Laki-laki</option>
                            <option value="P">Perempuan</option>
                        @elseif($mhs->jenis_kelamin == 'P')
                            <option value="L">Laki-laki</option>
                            <option value="P" selected>Perempuan</option>
                        @else
                            <option value="{{ $mhs->jenis_kelamin }}" selected>{{ $mhs->jenis_kelamin }}</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        @endif
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="semester" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                <div class="col-md-8 col-lg-9">
                    <select id="semester" name="semester" class="form-control form-control-lg" required>
                        @if($mhs->semester == '1(Ganjil)')
                            <option value="1(Ganjil)" selected>1(Ganjil)</option>
                            <option value="2(Genap)">2(Genap)</option>
                            <option value="3(Ganjil)">3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '2(Genap)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" selected>2(Genap)</option>
                            <option value="3(Ganjil)">3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '3(Ganjil)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" selected>3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '4(Genap)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" >3(Ganjil)</option>
                            <option value="4(Genap)" selected>4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '5(Ganjil)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" >3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)"selected>5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '6(Genap)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" >3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)" selected>6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '7(Ganjil)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" >3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)" selected>7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @elseif($mhs->semester == '8(Genap)')
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)" >2(Genap)</option>
                            <option value="3(Ganjil)" >3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)" selected>8(Genap)</option>
                        @else
                            <option value="{{ $mhs->semester }}" selected>{{ $mhs->semester }}</option>
                            <option value="1(Ganjil)">1(Ganjil)</option>
                            <option value="2(Genap)">2(Genap)</option>
                            <option value="3(Ganjil)">3(Ganjil)</option>
                            <option value="4(Genap)">4(Genap)</option>
                            <option value="5(Ganjil)">5(Ganjil)</option>
                            <option value="6(Genap)">6(Genap)</option>
                            <option value="7(Ganjil)">7(Ganjil)</option>
                            <option value="8(Genap)">8(Genap)</option>
                        @endif
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="alamat" class="form-control" id="alamat" style="height: 80px">{{ $mhs->alamat }}</textarea>
                </div>
              </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="text" class="form-control" id="email" value="{{ $mhs->email }}">
                </div>
              </div>
            <div class="row mb-3">
              <label for="telpon" class="col-md-4 col-lg-3 col-form-label">No Telpon</label>
              <div class="col-md-8 col-lg-9">
                <input name="telpon" type="text" class="form-control" id="telpon" value="{{ $mhs->telpon }}">
              </div>
            </div>
            <div class="row mb-3">
                <label for="program_id" class="col-md-4 col-lg-3 col-form-label">Program</label>
                <div class="col-md-8 col-lg-9">
                  <select id="program_id" name="program_id" class="form-control form-control-lg" required>
                      @if($programs->id == $mhs->program_id)
                      <option value="{{ $programs->id }}" selected>{{ $programs->nama }}</option>
                      @else
                          <option value="{{ $programs->id }}">{{ $programs->nama }}</option>
                      @endif

                      @foreach($data as $program)
                          @if($program->id != $programs->id)
                              <option value="{{ $program->id }}">{{ $program->nama }}</option>
                          @endif
                      @endforeach
                  </select>
                  </div>
            <div class="text-center">
                <br/>
                <a href="{{ route('mhs.index') }}" class="btn btn-danger">Kembali</a>
              <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
    </div>
  </div>
</section>
@endsection
