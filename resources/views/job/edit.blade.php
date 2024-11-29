@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Job</h1>
    </div>

    <div class="col-lg-8">
    <form action="{{ route('jobs.update', $job->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="jobs_id" class="form-label">Jobs ID</label>
            <input type="text" class="form-control" id="jobs_id" name="jobs_id" value="{{ old('jobs_id', $job->id) }}" readonly>
            @error('jobs_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="job_name" class="form-label">Jobs Name</label>
            <input type="text" class="form-control" id="job_name" name="job_name" value="{{ old('job_name', $job->job_name) }}" required>
            @error('job_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary', $job->salary) }}" required>
            @error('salary')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>  
</div>

@endsection