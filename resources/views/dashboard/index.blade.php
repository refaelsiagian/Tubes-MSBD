@extends('layout.index')

@section('content')

    {{-- @php
        dd(auth()->user()->employee->employeeJob); //auth()->user()->employee->employeeJob->job_id
    @endphp --}}

    <div class="pt-3 pb-2 mb-3 border-bottom text-start">
        <h1 class="h2 pb-0">{{ auth()->user()->employee->employee_name }}</h1>
        <span class="badge rounded-pill bg-primary">{{ auth()->user()->role->role }}</span>
    </div>
    
@endsection