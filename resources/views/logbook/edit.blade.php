<!-- resources/views/logbook/edit.blade.php -->

@extends('admin.index') <!-- Ubah dengan layout yang Anda miliki -->

@section('content')
    <h1>Edit Logbook</h1>
    <form action="{{ route('logbook.update', $logbookToEdit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" name="deskripsi" id="deskripsi" value="{{ $logbookToEdit->deskripsi }}">
        </div>
        <!-- Tambahkan input untuk bidang lain yang ingin diubah -->
        <button type="submit">Perbarui</button>
    </form>
@endsection
