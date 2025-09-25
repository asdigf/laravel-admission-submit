@extends('layouts.app') {{-- nếu bạn có layout --}}
@section('content')
<div class="container">
    <h2>Application Status Logs</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Application ID</th>
                <th>From Status</th>
                <th>To Status</th>
                <th>Changed By</th>
                <th>Changed At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->application_id }}</td>
                    <td>{{ $log->from_status }}</td>
                    <td>{{ $log->to_status }}</td>
                    <td>{{ $log->changed_by }}</td>
                    <td>{{ $log->changed_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No logs found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-secondary">← Quay về trang Welcome</a>
</div>
@endsection
