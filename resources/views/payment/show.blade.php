@extends('layout.index')

@section('content')
<div class="container mt-3 mb-5">

    <!-- Bagian untuk menampilkan pesan -->
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

    <h4>ID: {{ $employee->id }}</h4>
    <h4>Nama: {{ $employee->employee_name }}</h4>
    <h4>Rekening: {{ $employee->account_number ?? '-' }}</h4>
    <hr>

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

    <!-- Rincian Total Gaji -->
    <h5>Rincian Total Gaji</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Posisi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dataJobs as $job)
                    @if($job->job_id < 6)
                        <!-- Menampilkan Rincian Gaji jika job_id < 6 -->
                        <tr>
                            <td>{{ $job->job_name }}</td>
                            @if($job->job_name == 'Guru')
                                <td>Rp{{ number_format($TeacherSalary, 0, ',', '.') }}</td>
                            @else
                                <td>Rp{{ number_format($job->salary, 0, ',', '.') }}</td>
                            @endif
                        </tr>
                    @elseif($job->job_id >= 6)
                        <!-- Menampilkan hanya Rincian Total Gaji untuk job_id >= 6 -->
                        <tr>
                            <td>{{ $job->job_name }}</td>
                            <td>Rp{{ number_format($job->salary, 0, ',', '.') }}</td>
                        </tr>
                    @endif
                @endforeach
            <tr>
                <td class="text-end"><strong>Total Gaji</strong></td>
                <td><strong>Rp{{ number_format($totalPayment, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Form Upload Bukti Transfer -->
    <h5 class="mt-4">Upload Bukti Transfer Gaji</h5>
    <form action="{{ route('payments.uploadTransfer', $employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="totalPayment" value="{{ $totalPayment }}"> <!-- Menyimpan totalPayment -->
    <div class="form-group">
        <label for="bukti_transfer">Pilih Bukti Transfer</label>
        <input type="file" name="bukti_transfer" class="form-control" id="bukti_transfer" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Upload</button>
</form>

<div class="mt-4">
    <h5>Bukti Transfer</h5>
    @if ($paymentHistory && $paymentHistory->image)
        <img src="{{ Storage::url($paymentHistory->image) }}" 
             alt="Bukti Transfer" 
             class="img-thumbnail" 
             style="max-width: 300px;">
    @else
        <p class="text-muted">Bukti transfer belum tersedia.</p>
    @endif
</div>

    
</div>

@endsection
