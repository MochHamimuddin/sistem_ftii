@extends('admin.index')
@section('content')

<div class="pagetitle">
    <h1>Data Dosen Pembimbing</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <div>
                <a href="/dospem_create" class="btn btn-outline-primary">Tambah Data</a>
            </div>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIDN</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dosen as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->kode_dosen }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('dosen.show', $data->id) }}"><i class="bi bi-search"></i></a>
                    <a class="btn btn-warning" href="{{ route('dosen.edit', $data->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('dosen.delete', $data->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
