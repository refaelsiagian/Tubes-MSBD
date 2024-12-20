@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employees</h1>
        <div class="btn-group btn-group-sm me-2" role="group" aria-label="Basic outlined example"></div>
    </div>

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

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
    
    <div class="table-responsive small col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id}}</td>
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>{{ $employee->address ?? '-' }}</td>
                    <td>{{ $employee->account_number ?? '-' }}</td>
                    <td>{{ $employee->bank_name ?? '-' }}</td>
                    <td>
                        {{ $employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last() ? $employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last()->job->job_name : '-' }}
                    </td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <form action="{{ route('employees.edit', $employee->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="role" value="admin">
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-job-{{ $employee->id }}">
                            <i class="bi bi-person-workspace"></i>
                        </button>
                        @if(optional($employee->EmployeeJob->first())->job_id != 1)
                        <form action="{{ route('employees.update', $employee->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="inactive">
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to inactive this employee?')">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>

                <!-- Modal Job-->
                <div class="modal fade" id="modal-job-{{ $employee->id }}" tabindex="-1" aria-labelledby="modal-job-{{ $employee->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pekerjaan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('employees.job', $employee->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <input type="hidden" name="employee_job_id" value="{{ $employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last() ? $employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last()->id : '' }}">
                                        <label for="job_id" class="form-label">{{ $employee->employee_name }}</label>
                                        <select name="job_id" class="form-select" id="job_id">
                                            <option value="" @if (is_null($employee->employeeJob)) selected @endif>-- No Job --</option>
                                            @foreach ($jobs as $job)
                                                @if ($employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last() && $job->id == $employee->employeeJob->whereNotIn('job_id', [2, 3, 4])->last()->job->id)
                                                    <option value="{{ $job->id }}" selected>{{ $job->job_name }}</option>
                                                @else
                                                    <option value="{{ $job->id }}">{{ $job->job_name }}</option>
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


                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection