@extends('admin.index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Buat Proyek Baru</h1>
            <form method="POST" action="{{ route('final.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Proyek:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="berkas_final">Berkas Final (PDF):</label>
                    <input type="file" class="form-control-file" id="berkas_final" name="berkas_final" required accept=".pdf">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" required accept="image/jpeg, image/png, image/jpg">
                </div>
                <div class="form-group">
                    <label for="mahasiswa_id">Pilih Mahasiswa:</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                        @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('final.index') }}" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
