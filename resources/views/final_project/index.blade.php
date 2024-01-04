@extends('admin.index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Proyek Akhir</h1>
            <a href="{{ route('final.create') }}" class="btn btn-primary">Buat Proyek Baru</a>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Mahasiswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project as $proj)
                    <tr>
                        <td>{{ $proj->nama }}</td>
                        <td>{{ $proj->deskripsi }}</td>
                        <td>{{ $proj->status }}</td>
                        <td><img src="{{ asset('foto_final/img/'.$proj->foto) }}" alt="Foto Proyek" style="width: 50px;"></td>
                        <td>{{ $proj->mahasiswa->name }}</td>
                        <td>
                            <a href="{{ route('final.show', $proj->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('final.edit', $proj->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('final.destroy', $proj->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
