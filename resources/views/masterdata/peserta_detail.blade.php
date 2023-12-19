@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Detail Peserta</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <table style="width:100%;">
            <tbody>
              <tr>
                <th>NIM</th>
                <td>{{ $mhs->nim }}</td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>{{ $mhs->name }}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $mhs->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>{{ $mhs->semester }}</td>
            </tr>
              <tr>
                <th>Program</th>
                <td>{{ $mhs->Kegiatan->nama }}</td>
              </tr>
              <tr>
                <th>Mitra</th>
                <td>{{ $mitra->nama }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ $mhs->alamat }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $mhs->email }}</td>
              </tr>
              <tr>
                <th>Password</th>
                <td>{{ $mhs->password }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td>{{ $mhs->telpon }}</td>
              </tr>
              <tr>
                <th>Foto</th>
                <td><img src="{{ asset('foto_peserta/img/'.$mhs->foto) }}"></td>
                <br/>
              </tr>
            </tbody>
          </table>
          <br/>
          <br/>
          <a href="{{ route('mhs.index') }}" class="btn btn-danger">Kembali</a>
          <a href="{{ route('mhs.edit',$mhs->id) }}" class="btn btn-primary">Edit Data</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
