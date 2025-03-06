@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    {{ $errors->first() }}
</div>
@endif
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 25rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection