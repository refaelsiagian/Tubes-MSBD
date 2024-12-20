@extends('layout.index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payment History</h1>
</div>

<div class="container mt-3 mb-5">
    <div class="container mt-3 mb-5">
        <div class="row g-3">
            @if($paymentHistories->isEmpty())
                <div class="col-md-12">
                    <div class="custom-card p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1">No Payment History</h5>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($paymentHistories as $paymentHistory)
                <div class="col-md-6">
                    <div class="custom-card p-4 d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1">{{ \Carbon\Carbon::parse($paymentHistory->date)->translatedFormat('F Y') }}</h5>
                        </div>
        
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-peh">
                            Lihat
                        </button>
                    </div>
        
                    <!-- Modal -->
                    <div class="modal fade" id="modal-peh" tabindex="-1" aria-labelledby="modal-peh" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Class Advisor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                @php
                                    $details = json_decode($paymentHistory->detail, true);
                                    // dd($details);
                                @endphp
                                <div class="modal-body">
                                    <!-- Salary Details by Subject -->
                                    @if(!empty($details['data']))
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
                                            @foreach($details['data'] as $item)
                                            <tr>
                                                <td>{{ strtoupper($item['level_name']) }}</td>
                                                <td>{{ $item['subject_name'] }}</td>
                                                <td>{{ $item['lesson_count'] }} x Rp{{ number_format($item['rates_per_lesson'], 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($item['total'], 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                                <td><strong>Rp{{ number_format($details['TeacherSalary'], 0, ',', '.') }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endif

                                    <!-- Salary Deductions -->
                                    @if(!empty($details['penalties']))
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
                                            @foreach($details['penalties'] as $penalty)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($penalty['created_at'])->translatedFormat('l, d F Y') }}</td>
                                                <td>{{ $penalty['fine_id'] == 2 ? 'Tidak Masuk' : 'Absen' }}</td>
                                                <td>Rp{{ number_format($penalty['amount'], 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-end"><strong>Total Denda</strong></td>
                                                <td><strong>Rp{{ number_format($details['totalPenalty'], 0, ',', '.') }}</strong></td>
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
                                            @foreach($details['dataJobs'] as $job)
                                            <tr>
                                                <td>{{ $job['job_name'] }}</td>
                                                <td>Rp{{ number_format($job['job_name'] == 'Guru' ? $details['TeacherSalary'] : $job['salary'], 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                            @if(!empty($details['penalties']))
                                            <tr>
                                                <td class="text-end text-danger fw-bold">Total Denda</td>
                                                <td class="text-danger fw-bold">Rp{{ number_format($details['totalPenalty'], 0, ',', '.') }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="text-end"><strong>Total Gaji</strong></td>
                                                <td><strong>Rp{{ number_format($details['totalPayment'], 0, ',', '.') }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h5>Bukti Pembayaran</h5>
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{ Storage::url($paymentHistory->image) }}" class="img-fluid" alt="payment image">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection