@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Salary</h1>
</div>

<a href="{{ route('salary.history') }}" class="btn btn-primary">Payment History</a>

<div class="container mt-3 mb-5">
    <div class="row g-3">
        
        @if($dataJobs->pluck('job_id')->contains(function($id) { return $id < 6; }))
            <!-- Tampilkan Tabel Pelajaran jika ada job_id < 6 -->
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

        <!-- Rincian Total Gaji -->
        <h5>Rincian Total Gaji: {{ $date->translatedFormat('F Y') }}</h5>
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
                @if($penalties->isNotEmpty())
                <tr>
                    <td class="text-end text-danger fw-bold">Total Denda</td>
                    <td class="text-danger fw-bold">Rp{{ number_format($totalPenalty, 0, ',', '.') }}</td>
                </tr>
                @endif
                <tr>
                    <td class="text-end"><strong>Total Gaji</strong></td>
                    <td><strong>Rp{{ number_format($TeacherSalary + $totalSalary - $totalPenalty, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection