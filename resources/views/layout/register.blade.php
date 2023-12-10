<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register program FTII</title>
   <link rel="stylesheet" href="{{ asset('landingpage/assets/css/login.css') }}">
   <link href="{{asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
   <link href="{{asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if(Session::has('status'))
                    <script>
                        window.addEventListener('DOMContentLoaded', (event) => {
                            alert("{{ Session::get('message') }}");
                        });
                    </script>
                @endif
              <form id="registerForm" method="POST" action="{{ route('register.create') }}">
                @csrf
                <div class="divider d-flex align-items-center my-4">
                  <h3 class="text-center fw-bold mx-3 mb-0">Register</h3>
                </div>
                <div class="form-outline mb-4">
                    @error('nim')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="nim" id="nim" name="nim" class="form-control form-control-lg"
                    placeholder="Masukan Nim" required />
                  <label class="form-label" for="nim">Nim Mahasiswa</label>
                </div>
                <div class="form-outline mb-4">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="name" id="name" name="name" class="form-control form-control-lg"
                    placeholder="Masukan Nama" required />
                  <label class="form-label" for="name">Nama Lengkap</label>
                </div>
                <div class="form-outline mb-4">
                    @error('jenis_kelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="form-outline mb-4">
                    @error('semester')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                    <label class="form-label" for="semester">Semester</label>
                </div>
                <div class="form-outline mb-4">
                    @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea id="alamat" name="alamat" class="form-control form-control-lg" placeholder="Masukkan Alamat Lengkap" required></textarea>
                    <label class="form-label" for="alamat">Alamat Lengkap</label>
                </div>
                <div class="form-outline mb-4">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Masukan Email" required />
                  <label class="form-label" for="email">Email address</label>
                </div>
                <div class="form-outline mb-4">
                    @error('telpon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="telpon" id="telpon" name="telpon" class="form-control form-control-lg"
                    placeholder="Masukan No Telpon" required />
                  <label class="form-label" for="telpon">Masukan No Telpon</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Masukan password" required />
                  <label class="form-label" for="password">Masukan Password</label>
                </div>
                <div class="form-outline mb-4">
                    @error('program_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select id="program_id" name="program_id" class="form-control form-control-lg" required>
                        <option value="" disabled selected>Pilih Program</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->nama }}</option>
                        @endforeach
                    </select>
                    <label class="form-label" for="program_id">Pilih Program</label>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                    <a href="/login" class="btn btn-primary btn-lg"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <script src="{{ asset('landingpage/assets/js/main.js')}}"></script>
      <script src="https://kit.fontawesome.com/4a4251cc63.js" crossorigin="anonymous"></script>
</body>
</html>
