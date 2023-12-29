@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Data Logbook</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div>
                            <a href="{{ route('logbook.create') }}" class="btn btn-outline-primary">Tambah Logbook</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Dosen PA</th>
                                    <th>Jenis Kegiatan</th> <!-- Menampilkan kolom nama mahasiswa -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logbook as $logbooks)
                                    <tr>
                                        <td>{{ $logbooks->mahasiswa->name }}</td>
                                        <td>{{ $logbooks->dosen->nama }}</td>
                                        <td>{{ $logbooks->kegiatan->nama }}</td>
                                        <td>
                                            <a href="{{ route('logboook.show', $logbooks->id) }}" class="btn btn-info">Lihat</a>
                                            <a href="#" class="btn btn-warning">Edit</a>
                                            <form action="#" method="POST" style="display: inline-block;">
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
