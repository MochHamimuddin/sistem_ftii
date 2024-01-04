@extends('admin.index')

@section('content')
    <h1>Detail Kegiatan</h1>
    <p>Nama: {{ $kegiatan->nama }}</p>
    <p>Status: {{ $kegiatan->status }}</p>

    @if($kegiatan->foto)
        <div class="form-group">
            <label for="foto">Foto Bukti:</label>
            <br>
            <img src="{{ asset('storage/foto_peserta/img/' . $kegiatan->foto) }}" alt="Foto Kegiatan" style="max-width: 300px;">
        </div>
    @else
        <p>Tidak ada foto yang terkait dengan kegiatan ini.</p>
    @endif

    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
