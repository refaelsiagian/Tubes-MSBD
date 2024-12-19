@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Presences</h1>
</div>

@if(session('success'))
    <div class="alert alert-success col-lg-8">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-3 mb-5">
    <div class="row g-3">
        <div class="col-md-6">
            <h5>Today</h5>
            @if($present)
                <div class="alert alert-success">
                    <p class="mb-0">Anda sudah absen hari ini!</p>
                </div>
            @else
                <div class="custom-card p-4">
                    <p class="mb-0 h6" id="current-day"></p>
                    <p class="mb-2" id="current-date"></p>
                    <form action="{{ route('presences.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ Auth::user()->employee_id }}">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="present" value="hadir">
                            <label class="form-check-label" for="present">
                                Hadir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="absent" value="absen">
                            <label class="form-check-label" for="absent">
                                Tidak Hadir
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <h5 class="mt-5">History</h5>

    <div class="mt-3">
        @if($histories->isEmpty())
            <p class="mb-0">No history found.</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hari, Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->formatted_date }}</td>
                    <td>
                        @if ($history->status == "hadir")
                            <span class="text-success">Hadir</span>
                        @else
                            <span class="text-danger">Absen</span>
                        @endif
                    </td>
                    <td>{{ $history->formatted_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Fungsi untuk mendapatkan hari dalam bahasa Inggris
    function getDayName(dayIndex) {
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        return days[dayIndex];
    }

    // Fungsi untuk mendapatkan tanggal saat ini
    function formatDate(date) {
        const options = { day: '2-digit', month: 'long', year: 'numeric' }; // Format: DD Month YYYY
        return date.toLocaleDateString('id-ID', options); // Atur ke bahasa sesuai kebutuhan
    }

    // Menampilkan hari dan tanggal saat ini
    function displayCurrentDayAndDate() {
        const now = new Date();
        const dayName = getDayName(now.getDay());
        const formattedDate = formatDate(now);

        // Tampilkan ke elemen HTML
        document.getElementById('current-day').innerText = dayName;
        document.getElementById('current-date').innerText = formattedDate;
    }

    // Panggil fungsi saat halaman dimuat
    displayCurrentDayAndDate();
</script>

@endsection
