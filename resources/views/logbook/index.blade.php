@extends('admin.index') <!-- Sesuaikan dengan layout admin yang dimiliki -->

@section('content')
    <h1>Daftar Logbook</h1>
    <a href="{{ route('logbook.create') }}">Tambah Logbook Baru</a> <!-- Tombol untuk tambah data baru -->
    <table>
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Nama Dosen</th>
                <th>Kegiatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logbooks as $logbook)
                <tr>
                    <td>{{ $logbook->mahasiswa->name }}</td>
                    <td>{{ $logbook->dosen->nama }}</td>
                    <td>{{ $logbook->kegiatan->nama }}</td>
                    <td>
                        <!-- Tombol untuk menuju halaman detail -->
                        <a href="{{ route('logbook.show', $logbook->id) }}">Detail</a>
                        <!-- Tombol untuk menuju halaman edit -->
                        <a href="{{ route('logbook.edit', $logbook->id) }}">Edit</a>
                        <!-- Form untuk menghapus -->
                        <form action="{{ route('logbook.destroy', $logbook->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
