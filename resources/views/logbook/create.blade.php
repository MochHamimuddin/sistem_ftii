@extends('admin.index')

@section('content')
        <h1>Tambah Logbook Baru</h1>
        <form action="{{ route('logbook.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="mahasiswa_id">Mahasiswa:</label>
                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                    @foreach($kegiatans->where('status', 'Lolos')  as $kegiatan)
                        <option value="{{ $kegiatan->mahasiswa_id }}">{{ $kegiatan->mahasiswa->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kegiatan_id">Kegiatan:</label>
                <select name="kegiatan_id" id="kegiatan_id" class="form-control">
                    @foreach($kegiatans->where('status', 'Lolos') as $kegiatan)
                        <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dosen_id">Dosen:</label>
                <select name="dosen_id" id="dosen_id" class="form-control">
                    @foreach($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_akhir">Tanggal Akhir:</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
            </div>
            <div class="text-right">
            <a href="{{ route('logbook.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
@endsection
