@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Salary</h1>
</div>

<div class="container mt-3 mb-5">
    <div class="row g-3">
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
                <tr>
                    <td>SMA</td>
                    <td>Agama</td>
                    <td>4 x Rp40.000</td>
                    <td>Rp160.000</td>
                </tr>
                <tr>
                    <td>SMA</td>
                    <td>PKN</td>
                    <td>6 x Rp40.000</td>
                    <td>Rp240.000</td>
                </tr>
                <tr>
                    <td>SMP</td>
                    <td>Agama</td>
                    <td>6 x Rp30.000</td>
                    <td>Rp180.000</td>
                </tr>
                <tr>
                    <td>SMP</td>
                    <td>Seni Budaya</td>
                    <td>3 x Rp30.000</td>
                    <td>Rp90.000</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp670.000</strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Total Gaji -->
        <h5>Rincian Total Gaji</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Guru</td>
                    <td>Rp670.000</td>
                </tr>
                <tr>
                    <td>Wali Kelas</td>
                    <td>Rp100.000</td>
                </tr>
                <tr>
                    <td>Kepala Sekolah</td>
                    <td>Rp3.000.000</td>
                </tr>
                <tr>
                    <td class="text-end"><strong>Total Gaji</strong></td>
                    <td><strong>Rp3.770.000</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection