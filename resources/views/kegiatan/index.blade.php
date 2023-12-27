@extends('admin.index')

@section('content')
    <div class="pagetitle">
        <h1>Data Kegiatan</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div>
                            <a href="{{ route('kegiatan.create') }}" class="btn btn-outline-primary">Tambah Kegiatan</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Status</th>
                                    <th>Jenis Kegiatan</th> <!-- Menampilkan kolom nama mahasiswa -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kegiatans as $kegiatan)
                                    <tr>
                                        <td>{{ $kegiatan->mahasiswa->name }}</td>
                                        <td>{{ $kegiatan->nama }}</td>
                                        <td>{{ $kegiatan->status }}</td>
                                        <td>
                                            <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-info">Lihat</a>
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">Hapus</button>
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
