@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects</h1>

        <form action="{{ route('subjects.index') }}" class="d-flex mt-3 mt-lg-0" role="search">
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

    <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add New Subject</a>
    
    <div class="table-responsive small col-lg-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Singkatan</th>
                <th scope="col">Levels</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->id}}</td>
                <td>{{ $subject->subject_name }}</td>
                <td>{{ $subject->subject_abb }}</td>
                <td>
                @if ($subject->subjectLevel->isNotEmpty())
    @php
        $levels = $subject->subjectLevel->map(function ($subjectLevel) {
            // Ambil nama level
            $levelName = strtoupper($subjectLevel->level->level_name ?? '');
            
            // Jika level SMK, tambahkan major
            if ($levelName === 'SMK' && $subjectLevel->major) {
                return $levelName . ' ' . strtoupper($subjectLevel->major->major_abb ?? '');
            }

            // Jika bukan SMK, kembalikan nama level
            return $levelName;
        });
    @endphp
    {{ implode(' / ', $levels->unique()->toArray()) }}
@else
    -
@endif
                </td>
                <td>
                    <form action="{{ route('subjects.edit', $subject->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="role" value="admin">
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </form>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="delete-form" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subject?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection