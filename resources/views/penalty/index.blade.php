@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penalties</h1>
</div>

@if(session('success'))
    <div class="alert alert-success col-lg-8">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-3 mb-5">

    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-inspector">
        Tambahkan Denda
    </button>

    <div class="mt-3">
        @if($penalties->isEmpty())
            <p class="mb-0">No history found.</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penalties as $penalty)
                <tr>
                    <td>{{ $penalty->employee_id }}</td>
                    <td>{{ $penalty->employee->employee_name }}</td>
                    <td>{{ $penalty->fine->fine_name }}</td>
                    <td>Rp{{ number_format($penalty->amount, 0, ',', '.') }}</td>
                    <td>{{ $penalty->created_at->translatedFormat('l, d F Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Inspector-->
<div class="modal fade" id="modal-inspector" tabindex="-1" aria-labelledby="modal-inspector" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Denda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penalty.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <!-- Guru Selection -->
                        <label for="employee_id" class="form-label">Guru</label>
                        <select name="employee_id" class="form-select" id="employee_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
            
                        <!-- Denda Selection -->
                        <label for="fine_id" class="form-label">Denda</label>
                        <select name="fine_id" class="form-select" id="fine_id">
                            @foreach ($fines as $fine)
                                <option value="{{ $fine->id }}">{{ $fine->fine_name }}</option>
                            @endforeach
                        </select>
            
                        <!-- Jumlah Les Input -->
                        <div id="lessons_wrapper" style="display: none;">
                            <label for="lessons" class="form-label">Jumlah Les</label>
                            <input type="number" name="lessons" id="lessons" class="form-control">
                        </div>
                    </div>
            
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>                                  
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fineSelect = document.getElementById('fine_id');
        const lessonsWrapper = document.getElementById('lessons_wrapper');

        function toggleLessonsInput() {
            if (fineSelect.value === '2') {
                lessonsWrapper.style.display = 'block'; // Show lessons wrapper (label + input)
            } else {
                lessonsWrapper.style.display = 'none'; // Hide lessons wrapper (label + input)
            }
        }

        // Trigger on page load to ensure proper state
        toggleLessonsInput();

        // Trigger on change event
        fineSelect.addEventListener('change', toggleLessonsInput);
    });



</script>
@endsection
