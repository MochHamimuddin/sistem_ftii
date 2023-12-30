<!-- weekly_description.blade.php -->
@extends('admin.index')

@section('content')
    <h1>Deskripsi Mingguan</h1>
    <table>
        <thead>
            <tr>
                <th>Minggu</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formattedDescriptions as $week => $description)
                <tr>
                    <td>{{ $week }}</td>
                    <td>{{ $description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
