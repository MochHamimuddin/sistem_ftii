@extends('admin.index')

@section('content')
    <h1>Konfirmasi Kegiatan</h1>
    <form action="{{ route('kegiatan_peserta.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Jenis Kegiatan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="foto">Bukti Lolos Kegiatan</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <div class="form-group">
            <label for="berkas_kegiatan">Silabus Kegiatan</label>
            <input type="file" class="form-control" id="berkas_kegiatan" name="berkas_kegiatan" required>
        </div>
        <input type="hidden" name="status" value="Tidak Lolos">
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
            <button type="submit" class="btn btn-primary ml-4">Simpan</button>
            <a href="{{ route('kegiatan_peserta.showAll') }}" class="btn btn-warning">View Data</a>
        </div>
    </form>
@endsection
