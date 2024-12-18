@extends('layout.index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Employee Payment</h1>
</div>

<div class="container mt-3 mb-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->employee_name }}</td>
                <td>
                    <a href="{{ route('payments.show', $employee->id) }}" class="btn btn-primary btn-sm">Payment</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection