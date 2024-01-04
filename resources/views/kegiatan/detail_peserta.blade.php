@extends('admin.index')
@section('content')
    <div class="container">
        <h1>Detail Kegiatan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Status</th>
                    <th>Mitra</th>
                    <th>Program</th>
                    <th>Foto</th>
                    <th>Silabus</th>
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
                            <img src="{{ asset('foto_peserta/img/' . $ket->foto) }}" alt="Foto Kegiatan" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if($ket->berkas_kegiatan)
                            <a href="{{ asset('silabus/' . $ket->berkas_kegiatan) }}" target="_blank">Lihat PDF</a>
                        @else
                            Tidak Ada PDF
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('kegiatan_peserta.create') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
