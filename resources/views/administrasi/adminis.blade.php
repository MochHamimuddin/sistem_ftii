@extends('admin.index')

@section('content')
    <div class="pagetitle">
        <h1>Data Administrasi Peserta</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div>
                            <a href="/kategori-adm/create" class="btn btn-outline-primary">Tambah Data</a>
                        </div>
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
                                            <a class="btn btn-primary" href="{{ route('adminis.detail', $administrasi->id) }}"><i class="bi bi-search"></i></a>
                                            <a class="btn btn-warning" href="{{ route('kategori_adm.edit', $administrasi->id) }}"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('kategori_adm.destroy', $administrasi->id) }}" method="POST" style="display: inline">
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
