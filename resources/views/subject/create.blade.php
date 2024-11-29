@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Subject</h1>
    </div>

    <div class="col-lg-8">
    <form action="{{ route('subjects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" required autofocus value="{{ old('subject_name') }}">
            @error('subject_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subject_abb" class="form-label">Singkatan</label>
            <input type="text" class="form-control" id="subject_abb" name="subject_abb" required autofocus value="{{ old('subject_abb') }}">
            @error('subject_abb')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>  
</div>

@endsection