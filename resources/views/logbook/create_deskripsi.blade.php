@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Tambah Deskripsi Logbook</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('logbook.store_deskripsi', ['id' => $logbook->id]) }}">
                            @csrf
                            @php
                                $startDate = \Carbon\Carbon::parse($logbook->tanggal_mulai);
                                $endDate = \Carbon\Carbon::parse($logbook->tanggal_akhir);
                                $currentDate = \Carbon\Carbon::parse($logbook->tanggal_mulai)->startOfWeek(); // Start from the beginning of the week of the start date
                                $weeksDifference = $startDate->diffInWeeks($endDate);
                                $descriptions = []; // Replace this with your array of descriptions
                            @endphp

                            @for ($i = 0; $i <= $weeksDifference; $i++)
                                @if ($currentDate->lte($endDate))
                                    @php
                                        $weekStartDate = $currentDate->copy()->startOfWeek();
                                        $weekEndDate = $currentDate->copy()->endOfWeek();
                                        $description = $descriptions[$i] ?? null;
                                    @endphp

                                    <div class="form-group">
                                        <label for="deskripsi{{ $i + 1 }}">Minggu ke-{{ $i + 1 }}</label>
                                        <textarea class="form-control deskripsi" id="deskripsi{{ $i + 1 }}" name="deskripsi[]" rows="3" placeholder="Masukkan deskripsi untuk Minggu ke-{{ $i + 1 }}" @if ($description) style="display: none;" @endif>@if ($description) {{ $description }} @endif</textarea>
                                        @if (!$description)
                                            <button type="button" class="btn btn-primary toggle-btn" data-target="#deskripsi{{ $i + 1 }}">Tampilkan Deskripsi</button>
                                        @endif
                                    </div>
                                @endif
                                @php
                                    $currentDate->addWeek(); // Move to the next week
                                @endphp
                            @endfor

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('logbook.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                var target = $(this).data('target');
                $(target).toggle();
            });
        });
    </script>
@endsection
