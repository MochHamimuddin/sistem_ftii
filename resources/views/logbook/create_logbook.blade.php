@extends('admin.index')

@section('content')
    <h1>Create Logbook</h1>

    <form action="{{ route('logbook.store') }}" method="POST">
        @csrf
        <label for="tanggal_mulai">Tanggal Mulai:</label>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai">

        <label for="tanggal_akhir">Tanggal Akhir:</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir">

        <div id="logbookContainer" style="display: none;">
            <!-- Ini adalah bagian yang akan diisi oleh deskripsi mingguan -->
        </div>

        <input type="hidden" name="mahasiswa_id" value="{{ Auth::id() }}">
        <input type="hidden" name="kegiatan_id" value="{{ $kegiatanLolos }}">
        <input type="hidden" name="dosen_id" value="{{ $dosenId }}">

        <button id="submitButton" type="submit" style="display: none;">Submit</button>
    </form>

    <script>
        document.getElementById('tanggal_akhir').addEventListener('change', function () {
            generateLogbook();
            hideDateInputs();
        });

        function generateLogbook() {
            const startDate = new Date(document.getElementById('tanggal_mulai').value);
            const endDate = new Date(document.getElementById('tanggal_akhir').value);

            const logbookContainer = document.getElementById('logbookContainer');
            logbookContainer.innerHTML = '';

            let currentWeek = 1;
            let currentDate = new Date(startDate);

            while (currentDate <= endDate) {
                const weekHeader = document.createElement('h3');
                weekHeader.textContent = `Minggu ${currentWeek}`;
                logbookContainer.appendChild(weekHeader);

                const descriptionLabel = document.createElement('label');
                descriptionLabel.setAttribute('for', `deskripsi${currentDate.toISOString().split('T')[0]}`);
                descriptionLabel.textContent = 'Deskripsi:';
                logbookContainer.appendChild(descriptionLabel);

                const descriptionTextarea = document.createElement('textarea');
                descriptionTextarea.setAttribute('id', `deskripsi${currentDate.toISOString().split('T')[0]}`);
                descriptionTextarea.setAttribute('name', 'deskripsi[]');
                logbookContainer.appendChild(descriptionTextarea);

                currentDate.setDate(currentDate.getDate() + 7); // Pindah ke minggu berikutnya
                currentWeek++;
            }

            // Tampilkan logbookContainer setelah selesai menghasilkan deskripsi mingguan
            logbookContainer.style.display = 'block';
        }

        function hideDateInputs() {
            document.getElementById('tanggal_mulai').style.display = 'none';
            document.getElementById('tanggal_akhir').style.display = 'none';
            document.getElementById('submitButton').style.display = 'block'; // Tampilkan tombol submit setelah memilih tanggal akhir
        }
    </script>
@endsection
