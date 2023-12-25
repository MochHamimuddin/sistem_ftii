@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Detail Dospem</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <table style="width:100%;">
            <tbody>
              <tr>
                <th>NIDN</th>
                <td>{{ $dosen->kode_dosen }}</td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>{{ $dosen->nama}}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $dosen->jenis_kelamin }}</td>
            </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ $dosen->alamat }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $dosen->email }}</td>
              </tr>
              <tr>
                <th>Password</th>
                <td>{{ $dosen->password }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td>{{ $dosen->telpon }}</td>
              </tr>
              <tr>
                <th>Foto</th>
                <td><img src="{{ asset('foto_peserta/img/'.$dosen->foto) }}"></td>
                <br/>
              </tr>
            </tbody>
          </table>
          <br/>
          <br/>
          <a href="{{ route('dosen.index') }}" class="btn btn-danger">Kembali</a>
          <a href="{{ route('dosen.edit',$dosen->id) }}" class="btn btn-primary">Edit Data</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
