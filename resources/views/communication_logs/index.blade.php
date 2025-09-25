@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Communication Logs</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Application ID</th>
                <th>Action</th>
                <th>Template</th>
                <th>Sent To</th>
                <th>Sent At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td>{{ $log->application_id }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->template }}</td>
                <td>{{ $log->sent_to }}</td>
                <td>{{ $log->sent_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
</div>
<div class="mt-3">
    <a href="{{ url('/') }}" class="btn btn-secondary">← Back to Welcome</a>
</div>
@endsection
