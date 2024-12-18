@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Class Advisors</h1>
</div>

@if(session('success'))
    <div class="alert alert-success col-lg-8">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-3 mb-5">
    <div class="row g-3">
        @foreach ($classAdvisors as $advisor)
        <div class="col-md-6">
            <div class="custom-card p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-1">{{ $advisor->room->class_name }}</h5>
                    @if ($advisor->employeeJob)
                    <p class="mb-0">Wali kelas: {{ $advisor->employeeJob->employee->employee_name }}</p>
                    @else
                    <p class="mb-0">Wali kelas: -</p>
                    @endif
                </div>

                @if(auth()->user()->role->role == 'admin')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $advisor->room->id }}">
                    Edit
                </button>
                @endif
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-{{ $advisor->room->id }}" tabindex="-1" aria-labelledby="modal-{{ $advisor->room->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Class Advisor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('class-advisors.update', $advisor->room->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="employee_id" class="form-label">Teacher</label>
                                    <select name="employee_id" class="form-select" id="employee_id">
                                        <option value="" {{ is_null($advisor->employeeJob) ? 'selected' : '' }}>-- No Advisor --</option>
                                        @foreach ($teachers as $teacher)
                                            @if ($advisor->employeeJob && $teacher->employee->id == $advisor->employeeJob->employee->id)
                                                <option value="{{ $teacher->employee->id }}" selected>{{ $teacher->employee->employee_name }}</option>
                                            @else
                                                <option value="{{ $teacher->employee->id }}">{{ $teacher->employee->employee_name }}</option>
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
        </div>
        @endforeach
    </div>
</div>


@endsection