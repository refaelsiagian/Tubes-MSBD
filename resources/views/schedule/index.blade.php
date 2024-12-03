@extends('layout.index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Schedules</h1>
</div>

<div class="container mt-3 mb-5">
    <div class="row g-3">
        @foreach ($rooms as $room)
        <div class="col-md-6">
            <a href="{{ route('schedules.show', $room->id) }}" class="custom-card p-4 d-block text-decoration-none text-dark">
                <h5 class="mb-1">Roster {{ $room->class_name }}</h5>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection