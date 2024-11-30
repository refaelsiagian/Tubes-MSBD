@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employees</h1>
        <div class="btn-group btn-group-sm me-2" role="group" aria-label="Basic outlined example">
            <form action="{{ route('employees.index') }}" method="get">
                <button type="submit" name="status" value="active" class="btn btn-outline-primary">Active</button>
                <button type="submit" name="status" value="inactive" class="btn btn-outline-danger">Inactive</button>
            </form>
        </div>
        <form action="{{ route('employees.index') }}" class="d-flex mt-3 mt-lg-0" role="search">
            <input type="hidden" name="status" value="{{ request('status') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection