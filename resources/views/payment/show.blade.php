@extends('layout.index')

@section('content')

<!-- Header -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payment Detail</h1>
</div>

<!-- Alert Messages -->
@if(session('success'))
<div class="alert alert-success col-lg-8">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger col-lg-8">
    {{ session('error') }}
</div>
@endif

<div class="container mt-3 mb-5">
    <!-- Salary Details by Subject -->
    @if($data->isNotEmpty())
    <h5 class="mt-4 mb-4">Detail Gaji Berdasarkan Mata Pelajaran Diampu</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenjang</th>
                <th>Mata Pelajaran</th>
                <th>Detail</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ strtoupper($item->level_name) }}</td>
                <td>{{ $item->subject_name }}</td>
                <td>{{ $item->lesson_count }} x Rp{{ number_format($item->rates_per_lesson, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td><strong>Rp{{ number_format($TeacherSalary, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    @endif

    <!-- Salary Deductions -->
    @if($penalties->isNotEmpty())
    <h5 class="mt-4 mb-4">Rincian Pengurangan Gaji</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis Denda</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penalties as $penalty)
            <tr>
                <td>{{ $penalty->created_at->translatedFormat('l, d F Y') }}</td>
                <td>{{ $penalty->fine->fine_name }}</td>
                <td>Rp{{ number_format($penalty->amount, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="2" class="text-end"><strong>Total Denda</strong></td>
                <td><strong>Rp{{ number_format($totalPenalty, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    @endif

    <!-- Total Salary Details -->
    <h5 class="mt-4 mb-4">Rincian Total Gaji</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Posisi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataJobs as $job)
            <tr>
                <td>{{ $job->job_name }}</td>
                <td>Rp{{ number_format($job->job_name == 'Guru' ? $TeacherSalary : $job->salary, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            @if($penalties->isNotEmpty())
            <tr>
                <td class="text-end text-danger fw-bold">Total Denda</td>
                <td class="text-danger fw-bold">Rp{{ number_format($totalPenalty, 0, ',', '.') }}</td>
            </tr>
            @endif
            <tr>
                <td class="text-end"><strong>Total Gaji</strong></td>
                <td><strong>Rp{{ number_format($totalPayment, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Employee Details -->
    <h5 class="mt-4 mb-4">Detail Pegawai</h5>
    <div class="card p-3 mb-4">
        <ul class="list-unstyled mb-0">
            <li><strong>ID:</strong> {{ $employee->id }}</li>
            <li><strong>Nama:</strong> {{ $employee->employee_name }}</li>
            <li><strong>Rekening:</strong> {{ $employee->account_number ?? '-' }}</li>
            <li><strong>Gaji Bulan:</strong> <span class="fw-bold text-primary">{{ $date->translatedFormat('F Y') }}</span></li>
            <li class="text-muted">Bayarkan gaji di awal bulan berikutnya untuk bulan yang tertera</li>
        </ul>
    </div>

    <!-- Upload Payment Proof -->
    <h5 class="mt-4 mb-4">Upload Bukti Transfer Gaji</h5>
    <form action="{{ route('payments.uploadTransfer', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="totalPayment" value="{{ $totalPayment }}">
        <div class="form-group">
            <label for="bukti_transfer" class="form-label">Pilih Bukti Transfer</label>
            <input type="file" name="bukti_transfer" class="form-control" id="bukti_transfer" accept="image/*" required onchange="previewImage(event)">
        </div>
        <div class="mt-3" id="preview-container" style="display: none;">
            <h6>Preview Gambar:</h6>
            <img id="image-preview" src="#" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            imagePreview.src = '#';
        }
    }
</script>

@endsection
