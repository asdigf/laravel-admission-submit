@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Registrations</h2>
    <a href="{{ route('register.form') }}" class="btn btn-primary">Create Registration</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Email</th>
        <th>Student Name</th>
        <th>Programme</th>
        <th>Intake</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @forelse($registrations as $reg)
        <tr>
            <td>{{ $reg->email }}</td>
            <td>{{ $reg->student_name }}</td>
            <td>{{ $reg->programme }}</td>
            <td>{{ $reg->intake }}</td>
            <td>{{ $reg->phone }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No registrations found.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<!-- Pagination -->
@if($registrations->hasPages())
<div class="d-flex justify-content-between align-items-center mt-3">
    <div class="text-muted small">
        Showing {{ $registrations->firstItem() }} to {{ $registrations->lastItem() }}
        of {{ $registrations->total() }} results
    </div>
    <div>
        {{ $registrations->withQueryString()->links('pagination::bootstrap-4') }}
    </div>
</div>
@endif

<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary">← Back to Welcome</a>
</div>
@endsection
