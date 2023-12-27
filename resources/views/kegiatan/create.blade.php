@extends('admin.index')

@section('content')
    <h1>Tambah Kegiatan Baru</h1>
    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="mahasiswa_id">Nama Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Jenis Kegiatan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Lolos">Lolos</option>
                <option value="Tidak Lolos">Tidak Lolos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <div class="form-group">
            <label for="mitra_id">Mitra</label>
            <select name="mitra_id" id="mitra_id" class="form-control" required>
                @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="program_id">Program</label>
            <select name="program_id" id="program_id" class="form-control" required>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <a class="btn btn-danger" href="{{ route('kegiatan.index') }}">Kembali</a>
            <button type="submit" class="btn btn-primary ml-4">Tambah</button>
        </div>
    </form>
@endsection
