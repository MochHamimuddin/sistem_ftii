@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori Konversi Baru</h1>
    <form action="{{ route('kategoriKonversi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_mk">Kode MK:</label>
            <input type="text" id="kode_mk" name="kode_mk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jumlah_sks">Jumlah SKS:</label>
            <input type="text" id="jumlah_sks" name="jumlah_sks" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategoriKonversi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
