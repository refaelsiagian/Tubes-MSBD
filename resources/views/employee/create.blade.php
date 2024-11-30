@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Employee</h1>
    </div>

    <div class="col-lg-8">
    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Employee ID</label>
            <input type="text" class="form-control" id="id" name="id" required autofocus value="{{ old('id') }}">
            @error('id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name" required autofocus value="{{ old('employee_name') }}">
            @error('employee_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="employee_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" required autofocus value="{{ old('employee_number') }}">
            @error('employee_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="employee_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="employee_address" name="employee_address" required autofocus value="{{ old('employee_number') }}">
            @error('employee_address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="employee_acnumb" class="form-label">Account Number</label>
            <input type="text" class="form-control" id="employee_acnumb" name="employee_acnumb" required autofocus value="{{ old('employee_number') }}">
            @error('employee_acnumb')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="employee_bankname" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="employee_bankname" name="employee_bankname" required autofocus value="{{ old('employee_number') }}">
            @error('employee_bankname')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>  
</div>

@endsection