@extends('admin.index')
    
@section('content')
    <div class="pagetitle">
        <h1>Detail Data {{ $kategori_adm->nama }}</h1>
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
                                    <th scope="col">Tanggal Pengumpulan</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($mahasiswas)
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $mahasiswa->name }}</td>
                                            <td>
                                                @isset($mahasiswa->administrasis)
                                                    @foreach ($mahasiswa->administrasis as $administrasi)
                                                        {{ $administrasi->tanggal_pengumpulan }}
                                                    @endforeach
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($administrasi->berkas)
                                                    <a href="{{ route('view_file', $administrasi->id) }}" class="btn btn-primary">Lihat File</a>
                                                @endisset
                                            </td>
                                            <td>
                                                @if($administrasi->keterangan == 1)
                                                    <a href="{{ route('kategori_adm.keterangan', ['id' => $administrasi->id]) }}" class="btn btn-warning">Pending</a>
                                                @else
                                                    <a href="{{ route('kategori_adm.keterangan', ['id' => $administrasi->id]) }}" class="btn btn-success">Approved</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
