@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Schedule</h1>
    </div>

    <div class="col-lg-8">
        <form action="{{ route('schedules.update', $schedule->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <!-- Baris untuk input berdampingan -->
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" value="{{ $schedule->room->class_name }}" readonly>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="day" class="form-label">Day</label>
                    <input type="text" class="form-control" id="day" name="day" value="{{ old('day', $schedule->lesson->day) }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="text" class="form-control" id="start_time" value="{{ old('start_time', $schedule->scheduleTimes[0]->start_time) }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="text" class="form-control" id="end_time" value="{{ old('end_time', $schedule->scheduleTimes[0]->end_time) }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="text" class="form-control" id="order" value="{{ old('order', $schedule->lesson->order) }}" readonly>
                </div>
            </div>
    
            <!-- Input normal memanjang -->
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <select class="form-select" name="subject_level_id" id="subject">
                    @foreach ($subjects as $subject)
                        @if ($subject->id == $schedule->subject_level_id)
                            <option value="{{ $subject->id }}" selected>{{ $subject->subject->subject_name }}</option>
                        @else
                            <option value="{{ $subject->id }}">{{ $subject->subject->subject_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="teacher" class="form-label">Teacher</label>
                <select class="form-select" name="teacher_id" id="teacher">
                    @foreach ($teachers as $teacher)
                        @if ($teacher->id == $schedule->teacher_id)
                            <option value="{{ $teacher->id }}" selected>{{ $teacher->employee->employee_name }}</option>
                        @else
                            <option value="{{ $teacher->id }}">{{ $teacher->employee->employee_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
    
            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    
</div>

@endsection