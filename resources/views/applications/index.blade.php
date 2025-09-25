@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Applications</h2>
    <a href="{{ route('applications.create') }}" class="btn btn-primary">Create Application</a>
</div>

<!-- Filter & Search -->
<form method="GET" class="row g-3 mb-3">
    <div class="col-md-3">
        <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="Submitted" {{ request('status')=='Submitted'?'selected':'' }}>Submitted</option>
            <option value="Accepted" {{ request('status')=='Accepted'?'selected':'' }}>Accepted</option>
            <option value="Rejected" {{ request('status')=='Rejected'?'selected':'' }}>Rejected</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="payment_status" class="form-select">
            <option value="">All Payment</option>
            <option value="unpaid" {{ request('payment_status')=='unpaid'?'selected':'' }}>Unpaid</option>
            <option value="partial" {{ request('payment_status')=='partial'?'selected':'' }}>Partial</option>
            <option value="paid" {{ request('payment_status')=='paid'?'selected':'' }}>Paid</option>
        </select>
    </div>
    <div class="col-md-3">
        <button class="btn btn-secondary" type="submit">Filter</button>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Applicant Name</th>
        <th>Email</th>
        <th>Programme</th>
        <th>Intake</th>
        <th>Status</th>
        <th>Payment Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($applications as $app)
        <tr>
            <td>{{ $app->application_id }}</td>
            <td>{{ $app->applicant_name }}</td>
            <td>
                {{ $app->email ?? '---' }}
                <button class="btn btn-sm btn-link p-0"
                        onclick="document.getElementById('email-form-{{ $app->application_id }}').style.display='block'">
                    Edit
                </button>

                <form id="email-form-{{ $app->application_id }}"
                      action="{{ route('applications.updateEmail', $app->application_id) }}"
                      method="POST" style="display:none; margin-top:5px;">
                    @csrf
                    <input type="email" name="email" value="{{ $app->email }}"
                           placeholder="Enter email" required
                           class="form-control form-control-sm">
                    <button type="submit" class="btn btn-sm btn-success mt-1">Save</button>
                </form>
            </td>
            <td>{{ $app->programme }}</td>
            <td>{{ $app->intake }}</td>
            <td>{{ $app->status }}</td>
            <td>{{ $app->payment_status }}</td>
            <td>
                <!-- Edit -->
                <a href="{{ route('applications.edit', $app->application_id) }}" class="btn btn-sm btn-warning">Edit</a>

                <!-- Delete -->
                <form action="{{ route('applications.destroy', $app->application_id) }}"
                      method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?')">
                        Delete
                    </button>
                </form>

                <!-- Status update -->
                @if($app->status == 'Submitted')
                    <form action="{{ route('applications.status.update', $app->application_id) }}"
                          method="POST" style="display:inline-block; margin-left:5px;">
                        @csrf
                        <input type="hidden" name="changed_by" value="Admissions Officer">
                        <select name="new_status" class="form-select form-select-sm d-inline-block" style="width:auto;">
                            <option value="Accepted">Accepted</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-info">Update Status</button>
                    </form>
                @endif

                <!-- Send Reminder -->
                @if($app->status == 'Accepted')
                    <form action="{{ route('applications.sendReminder', $app->application_id) }}"
                          method="POST" style="display:inline-block; margin-left:5px;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Send Reminder</button>
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">No applications found.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<!-- Pagination -->


@if($applications->hasPages())
<div class="d-flex justify-content-between align-items-center mt-3">
    <div class="text-muted small">
        Showing {{ $applications->firstItem() }} to {{ $applications->lastItem() }}
        of {{ $applications->total() }} results
    </div>
    <div>
        {{ $applications->withQueryString()->links('pagination::bootstrap-4') }}

    </div>
</div>
@endif
<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary">← Back to Welcome</a>
</div>
@endsection

@push('styles')
<style>
    .pagination {
        justify-content: flex-start; 
    }
    .pagination .page-link {
        border-radius: 6px;
        margin: 0 3px;
    }

</style>
@endpush
