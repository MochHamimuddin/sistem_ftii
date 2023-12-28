@extends('admin.index') <!-- Sesuaikan dengan layout admin yang dimiliki -->

@section('content')
    <h1>Tambah Logbook</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('logbook.store') }}" method="POST">
        @csrf
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi[]" rows="4" cols="50"></textarea><br><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label><br>
        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"><br><br>

        <label for="tanggal_akhir">Tanggal Akhir:</label><br>
        <input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}"><br><br>

        <button type="submit">Submit</button>
    </form>
@endsection
