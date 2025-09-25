@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 w-75">
        <h2 class="mb-4 text-primary">Create Application</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('applications.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Applicant Name</label>
                <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Programme</label>
                <input type="text" name="programme" class="form-control" value="{{ old('programme') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Intake</label>
                <input type="text" name="intake" class="form-control" value="{{ old('intake') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Payment Status</label>
                <select name="payment_status" class="form-select">
                    <option value="unpaid" {{ old('payment_status')=='unpaid'?'selected':'' }}>Unpaid</option>
                    <option value="partial" {{ old('payment_status')=='partial'?'selected':'' }}>Partial</option>
                    <option value="paid" {{ old('payment_status')=='paid'?'selected':'' }}>Paid</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('applications.index') }}" class="btn btn-secondary">← Back</a>
                <button class="btn btn-success" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
