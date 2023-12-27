@extends('admin.index')
@section('content')
    <div class="container">
        <h1>Detail Kegiatan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Mitra</th>
                    <th>Program</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $ket)
                <tr>
                    <td>{{ $ket->nama }}</td>
                    <td>{{ $ket->status }}</td>
                    <td>{{ $ket->mitra->nama }}</td>
                    <td>{{ $ket->program->nama }}</td>
                    <td>
                        @if($ket->foto)
                            <img src="{{ asset('storage/foto_peserta/img/' . $ket->foto) }}" alt="Foto Kegiatan" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('kegiatan_peserta.create') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
