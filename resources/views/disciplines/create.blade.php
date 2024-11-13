@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Discipline</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('disciplines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Discipline Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
