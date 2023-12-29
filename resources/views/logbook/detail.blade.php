@extends('admin.index')

@section('content')
    <div class="pagetitle">
        <h1>Detail Data {{ $logbook->mahasiswa->name }}</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Dosen PA</th>
                                    <th scope="col">Jenis Kegiatan</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Akhir</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $logbook->id }}</td>
                                    <td>{{ $logbook->mahasiswa->name }}</td>
                                    <td>{{ $logbook->dosen->nama }}</td>
                                    <td>{{ $logbook->kegiatan->nama }}</td>
                                    <td>{{ $logbook->tanggal_mulai }}</td>
                                    <td>{{ $logbook->tanggal_akhir }}</td>
                                    <td><a href="{{ route('logbook.create_deskripsi',$logbook->id) }}" class="btn btn-primary">Logbook Mingguan</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
