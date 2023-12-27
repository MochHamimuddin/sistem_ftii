<!-- resources/views/kegiatan/show.blade.php -->

@extends('admin.index')

@section('content')
    <h1>Detail Kegiatan</h1>
    <p>Nama: {{ $kegiatan->nama }}</p>
    <p>Status: {{ $kegiatan->status }}</p>
    <!-- Tampilkan detail lainnya sesuai kebutuhan -->
    <!-- ... -->

    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
