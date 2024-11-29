@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Subject</h1>
    </div>

    <div class="col-lg-8">
    <form action="{{ route('subjects.update', $subject->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject ID</label>
            <input type="text" class="form-control" id="subject_id" name="subject_id" value="{{ old('subject_id', $subject->id) }}" readonly>
            @error('subject_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name', $subject->subject_name) }}" required>
            @error('subject_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subject_abb" class="form-label">Singkatan</label>
            <input type="text" class="form-control" id="subject_abb" name="subject_abb" value="{{ old('subject_abb', $subject->subject_abb) }}" required>
            @error('subject_abb')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>  
</div>

@endsection