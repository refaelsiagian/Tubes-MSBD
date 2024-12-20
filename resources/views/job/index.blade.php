@extends('layout.index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Job</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success col-lg-8">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Add New Job</a>

    <div class="table-responsive small col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->job_name }}</td>
                        <td>{{ $job->salary ? 'Rp' . number_format($job->salary, 0, ',', '.') : $job->salary }}</td>
                        <td>
                        <form action="{{ route('jobs.edit', $job->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="role" value="admin">
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        </form>

                        @if($job->id >= 6)
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="post" class="delete-form" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this job?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
