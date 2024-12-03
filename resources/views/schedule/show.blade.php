@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3">Roster {{ $page }}</h1>
</div>

<div class="container mt-3">
    <div class="d-flex flex-wrap gap-2">
        <form action="{{ url()->current() }}" method="get">
            <button type="submit" name="day" value="senin" class="btn btn-outline-warning">Senin</button>
            <button type="submit" name="day" value="selasa" class="btn btn-outline-danger">Selasa</button>
            <button type="submit" name="day" value="rabu" class="btn btn-outline-secondary">Rabu</button>
            <button type="submit" name="day" value="kamis" class="btn btn-outline-success">Kamis</button>
            <button type="submit" name="day" value="jumat" class="btn btn-outline-primary">Jumat</button>
            <button type="submit" name="day" value="sabtu" class="btn btn-outline-info">Sabtu</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success col-lg-8 mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover mt-3">
        <thead>
          <tr>
            <th scope="col" colspan="5" class="text-center">{{ request()->day ? strtoupper(request()->day) : 'SENIN' }}</th>
          </tr>
        </thead>
        <tbody>
            @foreach($schedules as $key => $schedule)
            <tr>
                @if($schedule[0]->lesson->lessonType->id === 4 && $schedule[0]->subject_level_id === null) @else
                <th scope="row">{{ $loop->iteration }}</th>

                @php
                    $teacherNames = $schedule->pluck('teacher.employee.employee_name')->filter()->implode(' / ') ?? '-';
                @endphp

                @if($schedule[0]->lesson->lessonType->id !== 4)
                    <td class="fw-bold bg-info">{{ $schedule[0]->scheduleTimes[0]->start_time ?? $schedule[0]->lesson->dayTime->start_time }} - {{ $schedule[0]->scheduleTimes[0]->end_time}}</td>
                @else
                    <td>{{ $schedule[0]->scheduleTimes[0]->start_time ?? $schedule[0]->lesson->dayTime->start_time }} - {{ $schedule[0]->scheduleTimes[0]->end_time}}</td>
                @endif

                @if($schedule[0]->lesson->lessonType->id !== 4)
                    <td colspan="3" class="fw-bold text-center bg-info">{{ $schedule[0]->lesson->lessonType->desc }}</td>
                @else
                    <td class="text-center">{{ $schedule[0]->subjectLevel->subject->subject_name ?? '-'}}</td>
                    <td class="text-center">{{ $teacherNames }}</td>
                    <td><a href="{{ route('schedules.edit', $schedule[0]->id) }}" class="btn btn-sm btn-outline-success">Edit</a></td>
                @endif

            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>


@endsection