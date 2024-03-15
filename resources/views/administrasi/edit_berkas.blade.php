@extends('admin.index')

@section('content')
    <div class="container">
        <h1>Edit Berkas</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('administrasi.update', ['kategori_adm_id' => $administrasi->kategori_adm_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Tambahkan method PUT untuk mengindikasikan perubahan -->
            <div class="form-group">
                <label for="berkas">Pilih Berkas PDF:</label>
                <input type="file" name="berkas" class="form-control" id="berkas" required>
            </div>
            <a href="/administrasi" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
