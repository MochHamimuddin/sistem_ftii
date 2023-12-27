@extends('admin.index')

@section('content')
    <h1>Edit Kegiatan</h1>
    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="form-group">
            <label for="mahasiswa_id">Mahasiswa</label>
            <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}" {{ $kegiatan->mahasiswa_id === $mahasiswa->id ? 'selected' : '' }}>
                        {{ $mahasiswa->name }}
                    </option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="row">
                <div class="form-group">
                    <label for="nama">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kegiatan->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Lolos" {{ $kegiatan->status === 'Lolos' ? 'selected' : '' }}>Lolos</option>
                        <option value="Tidak Lolos" {{ $kegiatan->status === 'Tidak Lolos' ? 'selected' : '' }}>Tidak Lolos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mitra_id">Mitra</label>
                    <select class="form-control" id="mitra_id" name="mitra_id" required>
                        @foreach($mitras as $mitra)
                            <option value="{{ $mitra->id }}" {{ $kegiatan->mitra_id === $mitra->id ? 'selected' : '' }}>
                                {{ $mitra->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="program_id">Program</label>
                    <select class="form-control" id="program_id" name="program_id" required>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ $kegiatan->program_id === $program->id ? 'selected' : '' }}>
                                {{ $program->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="foto" class="form-label">Tambahkan Foto</label>
                        <input name="foto" class="form-control" type="file" id="foto">
                </div>
            <div class=" mt-3">
                <a class="btn btn-danger" href="{{ route('kegiatan.index') }}" >Kembali</a>
                <button type="submit" class="btn btn-primary ml-4">Simpan Perubahan</button>
            </div>
    </form>
@endsection
