@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Employee</h1>
    </div>
    <div class="col-lg-8">
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <!-- Employee ID Field -->
            <div class="mb-3">
                <label for="id" class="form-label">Employee ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
                @error('id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employee Name Field -->
            <div class="mb-3">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name" required value="{{ old('employee_name') }}">
                @error('employee_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employee Phone Number Field -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                @error('phone_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employee Address Field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required value="{{ old('address') }}">
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employee Account Number Field -->
            <div class="mb-3">
                <label for="account_number" class="form-label">Account Number</label>
                <input type="text" class="form-control" id="account_number" name="account_number" required value="{{ old('account_number') }}">
                @error('account_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Employee Bank Name Field -->
            <div class="mb-3">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" required value="{{ old('bank_name') }}">
                @error('bank_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create</button>
        </form>  
    </div>
@endsection