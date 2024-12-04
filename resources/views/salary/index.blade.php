@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Salary</h1>
</div>

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
                    <td><strong>Rp{{ number_format($TeacherSalary + $totalSalary, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection