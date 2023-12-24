@extends('admin.index')

@section('content')

<div class="pagetitle">
  <h1>Data Peserta</h1>
</div><section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <div>
          <a href="/datapeserta_create" class="btn btn-outline-primary">Tambah Data</a>
          </div>
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">PROGRAM</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mhs as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->nim }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->Kegiatan->nama }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('mhs.show', $data->id) }}"><i class="bi bi-search"></i></a>
                    <a class="btn btn-warning" href="{{ route('mhs.edit', $data->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('mhs.delete', $data->id) }}" method="POST" style="display: inline">
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
          </div>
      </div>
    </div>
  </div>
</section>
@endsection
