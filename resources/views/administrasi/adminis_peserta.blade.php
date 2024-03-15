@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Data Administrasi</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        @if(isset($kategoriAdm) && count($kategoriAdm) > 0)
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoriAdm as $kat)
                                @if($kat->status == 1)
                                    <tr>
                                        <td>{{ $kat->id }}</td>
                                        <td>{{ $kat->nama }}</td>
                                        <td>{{ $kat->tanggal_mulai }}</td>
                                        <td>{{ $kat->tanggal_akhir }}</td>
                                        <td>
                                            @if($kat->administrasi && $kat->administrasi->keterangan == 1)
                                                Sudah Diunggah (Pending)
                                            @else
                                                Belum Diunggah
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('administrasi.edit', ['kategori_adm_id' => $kat->id]) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal{{ $kat->id }}">
                                                <i class="bi bi-upload"></i>
                                            </button>
                                            <!-- Modal untuk setiap entri -->
                                            <div class="modal fade" id="uploadModal{{ $kat->id }}" tabindex="-1" aria-labelledby="uploadModalLabel{{ $kat->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('administrasi.upload', ['kategori_adm_id' => $kat->id]) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="uploadModalLabel{{ $kat->id }}">Unggah Berkas {{ $kat->nama }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="berkas" class="form-label">Pilih Berkas PDF:</label>
                                                                    <input type="file" name="berkas" class="form-control" id="berkas" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Unggah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>Tidak ada Kategori Administrasi yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
