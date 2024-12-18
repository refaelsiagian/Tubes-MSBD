@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Others</h1>
</div>

@if(session('success'))
    <div class="alert alert-success col-lg-8">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-3 mb-5">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5>Admin</h5>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="text-muted">Admin dipilih berdasarkan pekerja yang ditetapkan sebagai guru</p>
                    <h6>{{ $admin->employee->employee_name }}</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-admin">
                        Edit
                    </button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5>Kepala Sekolah</h5>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="text-muted">Kepala sekolah dipilih berdasarkan pekerja yang ditetapkan sebagai guru</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($principals as $principal)
                            <tr>
                                <td>{{ $principal->employee->employee_name }}</td>
                                <td>{{ $principal->job->job_name }}</td>
                                <td>{{ strtoupper($principal->level->level_name) }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $principal->id }}">
                                        Edit
                                    </button>

                                    <!-- Modal Admin-->
                                    <div class="modal fade" id="modal-{{ $principal->id }}" tabindex="-1" aria-labelledby="modal-{{ $principal->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{ $principal->job->job_name }} {{ strtoupper($principal->level->level_name) }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('others.principal') }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="position_id" value="{{ $principal->id }}">
                                                        <input type="hidden" name="principal_id" value="{{ $principal->employee->id }}">
                                                        <div class="mb-3">
                                                            <label for="employee_id" class="form-label">Admin</label>
                                                            <select name="employee_id" class="form-select" id="employee_id">
                                                                @foreach ($teachers as $teacher)
                                                                    @if ($teacher->employee->user->role_id == 3)
                                                                    @else
                                                                        <option value="{{ $teacher->employee->id }}">{{ $teacher->employee->employee_name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h5>Gaji Guru</h5>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h5>Denda Guru</h5>
        </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Denda</th>
                        <th>Harga Denda</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $fine)
                        <tr>
                            <td>{{ $fine->fine_name }}</td>
                            <td>{{ number_format($fine->fine_price, 0, ',', '.') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-fine-{{ $fine->id }}">
                                    Edit
                                </button>
                                <!-- Modal untuk Edit Denda -->
                                <div class="modal fade" id="modal-fine-{{ $fine->id }}" tabindex="-1" aria-labelledby="modal-fine-{{ $fine->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Denda "{{ $fine->fine_name }}"</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('others.fines') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="fine_id" value="{{ $fine->id }}">
                                                <div class="mb-3">
                                                    <label for="fine_name-{{ $fine->id }}" class="form-label">Nama Denda</label>
                                                    <input type="text" class="form-control" id="fine_name-{{ $fine->id }}" name="fine_name" value="{{ $fine->fine_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fine_price-{{ $fine->id }}" class="form-label">Harga Denda</label>
                                                    <input type="number" class="form-control" id="fine_price-{{ $fine->id }}" name="fine_price" value="{{ $fine->fine_price }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('other.modal')

@endsection