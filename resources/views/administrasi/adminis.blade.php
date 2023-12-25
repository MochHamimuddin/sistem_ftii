@extends('admin.index')
@section('content')

<div class="pagetitle">
    <h1>Data Administrasi</h1>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Jenis Administrasi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tanggal Mulai</th>
                  <th scope="col">Deadline</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategori_adm as $administrasi)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $administrasi->nama }}</td>
                  <td>
                    @if($administrasi->status == 1)
                        <a href="{{ route('kategori_adm.status', ['id' => $administrasi->id]) }}" class="btn btn-success">Aktif</a>
                            @else
                        <a href="{{ route('kategori_adm.status', ['id' => $administrasi->id]) }}" class="btn btn-danger">Non Aktif</a>
                        @endif
                  </td>
                  <td>{{ $administrasi->tanggal_mulai }}</td>
                  <td>{{ $administrasi->tanggal_akhir }}</td>
                  <td>
                    <a class="btn btn-primary" href="#"><i class="bi bi-search"></i></a>
                    <a class="btn btn-warning" href="#"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" href="#"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
