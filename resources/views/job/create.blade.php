@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Job</h1>
    </div>

    <div class="col-lg-8">
    <form action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="job_name" class="form-label">Job Name</label>
            <input type="text" class="form-control" id="job_name" name="job_name" required autofocus value="{{ old('job_name') }}">
            @error('job_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" required autofocus value="{{ old('salary') }}">
            @error('salary')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>  
</div>

@endsection