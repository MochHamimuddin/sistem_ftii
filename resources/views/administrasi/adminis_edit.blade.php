@extends('admin.index')

@section('content')
    <div class="pagetitle">
        <h1>Edit Kategori Administrasi</h1>
    </div>
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori_adm.update', $kategori_adm->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori_adm->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $kategori_adm->tanggal_mulai }}">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $kategori_adm->tanggal_akhir }}">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $kategori_adm->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $kategori_adm->status == 0 ? 'selected' : '' }}>Non Aktif</option>
                                </select>
                            </div>
                            <div class=" text-center">
                                <button type="submit" class="btn btn-primary me-md-2">Simpan</button>
                                <a href="{{ route('kategori_adm.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
