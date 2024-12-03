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

        <div class="mb-3">
            <label for="levels" class="form-label">Levels</label>
            <div>
                @foreach($levels as $level)
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input level-checkbox" 
                            type="checkbox" 
                            name="levels[]" 
                            value="{{ $level->id }}" 
                            id="level-{{ $level->id }}" 
                            data-level="{{ strtoupper($level->level_name) }}">
                        <label class="form-check-label" for="level-{{ $level->id }}">{{ strtoupper($level->level_name) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- SMK Majors Section -->
        <div id="smk-majors" style="display: none; margin-top: 15px;">
            <label for="majors" class="form-label">SMK Majors</label>
            <div>
                @foreach($majors as $major)
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="majors[]" 
                            value="{{ $major->id }}" 
                            id="major-{{ $major->id }}">
                        <label class="form-check-label" for="major-{{ $major->id }}">{{ strtoupper($major->major_abb) }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>  
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const levelCheckboxes = document.querySelectorAll('.level-checkbox'); // Ambil semua checkbox level
        const smkMajorsSection = document.getElementById('smk-majors'); // Ambil bagian untuk jurusan SMK

        levelCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                // Cek apakah SMK dipilih
                const isSMKSelected = Array.from(levelCheckboxes).some(cb => cb.checked && cb.dataset.level === 'SMK');

                // Tampilkan atau sembunyikan bagian jurusan SMK
                smkMajorsSection.style.display = isSMKSelected ? 'block' : 'none';
            });
        });
    });
</script>
@endsection