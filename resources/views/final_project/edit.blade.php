@extends('admin.index')

@section('content')
    <div class="container">
        <h1>Edit Final Project</h1>
        <form action="{{ route('final.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Project:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $project->nama }}">
            </div>
            <div class="form-group">
                <label for="mahasiswa_id">Mahasiswa:</label>
                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                    @foreach($mahasiswas as $mahasiswa)
                        <option value="{{ $mahasiswa->id }}" {{ $mahasiswa->id === $project->mahasiswa_id ? 'selected' : '' }}>
                            {{ $mahasiswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @if($project->foto)
                    <p>Foto Saat Ini:</p>
                    <img src="{{ asset('foto_final/img/' . $project->foto) }}" alt="Foto Proyek" style="max-width: 200px;">
                @else
                    <p>Tidak ada foto yang terkait.</p>
                @endif
            </div>

            <div class="form-group">
                <label for="berkas_final">Berkas Final (PDF):</label>
                <input type="file" name="berkas_final" id="berkas_final" class="form-control">
                @if($project->berkas_final)
                    <p>Berkas Final Saat Ini: <a href="{{ asset('data_berkas/' . $project->berkas_final) }}" target="_blank">Download</a></p>
                @else
                    <p>Tidak ada berkas final yang terkait.</p>
                @endif
            </div>
            <a href="{{ route('final.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
