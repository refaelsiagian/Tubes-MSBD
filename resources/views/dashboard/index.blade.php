@extends('layout.index')

@section('content')

<div class="pt-3 pb-2 mb-3 border-bottom text-start">
    <h1 class="h2 pb-0">{{ $loggedInEmployee->employee_name ?? 'No Name' }}</h1>
    <span class="badge rounded-pill bg-primary">{{ auth()->user()->role->role }}</span>
</div>

<!-- Profile Section -->
<div class="row">
    <!-- Profile Sidebar -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6.webp"
                     alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{ $loggedInEmployee->employee_name ?? 'No Name' }}</h5>
                @foreach($loggedInEmployee->jobs->unique('job_name') as $job)
                     <p>{{ $job->job_name }}</p>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
            <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">ID</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $loggedInEmployee->id?? 'No Name'  }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $loggedInEmployee->employee_name ?? 'No Name' }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $decryptedPhone ?? 'No Phone' }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $loggedInEmployee->address ?? 'No Address' }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Status
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ ucwords($loggedInEmployee->status ?? 'No Status') }} </p>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection