@extends('admin.index')

@section('content')
    <div class="container">
        <h2>Edit Logbook Entry</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('logbook.update', ['id' => $logbook->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tanggal_mulai">Start Date:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $logbook->tanggal_mulai }}">
            </div>
            <div class="form-group">
                <label for="tanggal_akhir">End Date:</label>
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $logbook->tanggal_akhir }}">
            </div>
            <div class="form-group">
                <label for="kegiatan_id">Activity:</label>
                <select class="form-control" id="kegiatan_id" name="kegiatan_id">
                    @foreach($kegiatans as $kegiatan)
                        <option value="{{ $kegiatan->id }}" @if($kegiatan->id == $logbook->kegiatan_id) selected @endif>{{ $kegiatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dosen_id">Dosen PA:</label>
                <select class="form-control" id="dosen_id" name="dosen_id">
                    @foreach($dosens as $dosen)
                        <option value="{{ $dosen->id }}" @if($dosen->id == $logbook->dosen_id) selected @endif>{{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
