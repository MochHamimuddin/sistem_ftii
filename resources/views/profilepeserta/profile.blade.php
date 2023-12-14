@extends('admin.index')
@section('content')


<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item">Peserta</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('foto_peserta/img/'.$rs->foto) }}"class="rounded-circle">
            <h2>{{ auth()->user()->name }}</h2>
            <h3>{{ $programs->nama}}</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <a href="/profile/{id}" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</a>
              </li>

              <li class="nav-item">
                <a href="{{ route('profile.edit', auth()->user()->id) }}" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</a>
                </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Administrasi</button>
              </li>

              <li class="nav-item">
                <a href="{{ route('sandi.form', auth()->user()->id) }}" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</a>
                </li>

            </ul>
            <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
               @include('profilepeserta.overview')
                </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                @if(Session::has('status') && Session::get('status') === 'success')
                    <script>
                        window.addEventListener('DOMContentLoaded', (event) => {
                            alert("{{ Session::get('message') }}");
                        });
                    </script>
                @endif
                @include('profilepeserta.editprofile')

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
                @include('profilepeserta.berkas')
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                @include('profilepeserta.changepassword')
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <script type="text/javascript">
  var readFoto = function(event){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = render.result;
        var output = document.getElementById('output');
        output.src = dataURL
    };
    reader.readAsDataURL(input.file[0]);
  };
  </script>
@endsection
