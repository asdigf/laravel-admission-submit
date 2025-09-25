@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Student Registration Form</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST" class="mx-auto" style="max-width: 500px;">
        @csrf

        @foreach(['student_name' => 'Student Name', 'programme' => 'Programme', 'intake' => 'Intake', 'email' => 'Email', 'phone' => 'Phone'] as $field => $label)
            <div class="mb-3">
                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                <input type="{{ $field === 'email' ? 'email' : 'text' }}" name="{{ $field }}" id="{{ $field }}" class="form-control" value="{{ old($field) }}">
                @error($field)
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>
@endsection
