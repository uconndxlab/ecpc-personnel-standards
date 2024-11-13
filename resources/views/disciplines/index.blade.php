@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Disciplines</h2>

    <a href="{{ route('disciplines.create') }}" class="btn btn-primary mb-3">Add New Discipline</a>

    @if ($disciplines->isEmpty())
        <p>No disciplines found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disciplines as $discipline)
                    <tr>
                        <td>{{ $discipline->id }}</td>
                        <td>{{ $discipline->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
