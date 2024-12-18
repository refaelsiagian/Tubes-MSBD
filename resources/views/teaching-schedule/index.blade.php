@extends('layout.index')

@section('content')

<div class="d-flex flex-column justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3">Teaching Schedule</h1>
    <p class="text-muted d-none d-md-block">{{ auth()->user()->employee->employee_name }}</p>
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
            @foreach ($schedules as $schedule)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="text-center">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                <td class="text-center">{{ $schedule->subjectLevel->subject->subject_name }}</td>
                <td class="text-center">{{ $schedule->room->class_name }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection