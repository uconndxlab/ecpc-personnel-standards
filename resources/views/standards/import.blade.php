@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Import Standard</h1>
    <form action="{{ route('standards.import') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select name="state" id="state" class="form-select" required>
                @foreach ($states as $state)
                    <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="mb-3">
            <label for="data" class="form-label">Tab-Separated Data</label>
            <textarea name="data" id="data" class="form-control" rows="10" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Import Standards</button>
    </form>
    
</div>
@endsection
