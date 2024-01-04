@extends('admin.index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Detail Proyek</h1>
            <div>
                <h4>Nama Proyek:</h4>
                <p>{{ $project->nama }}</p>
            </div>
            <div>
                <h4>Deskripsi:</h4>
                <p>{{ $project->deskripsi }}</p>
            </div>
            <div>
                <h4>Status:</h4>
                <p>{{ $project->status }}</p>
            </div>
            <div>
                <h4>Foto:</h4>
                <img src="{{ asset('foto_final/img/' . $project->foto) }}" alt="Foto Proyek" style="max-width: 300px;">
            </div>
            <div>
                <h4>Berkas Final (PDF):</h4>
                <p><a href="{{ asset('data_berkas/' . $project->berkas_final) }}" target="_blank">Unduh Berkas</a></p>
            </div>
            <div>
                <h4>Mahasiswa Terkait:</h4>
                <p>{{ $project->mahasiswa->name }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
