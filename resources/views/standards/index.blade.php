@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Standards</h2>
    <a href="{{ route('standards.create') }}" class="btn btn-primary">Add New Standard</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($standards->isEmpty())
    <p>No standards available.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Discipline</th>
                <th>License/Certificate</th>
                <th>State Department</th>
                <th>Type of License/Certificate</th>
                <th>Degree Level Requirement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($standards as $standard)
            <tr>
                <td>{{ $standard->discipline }}</td>
                <td>{{ $standard->license_certificate }}</td>
                <td>{{ $standard->state_department }}</td>
                <td>{{ $standard->type_of_license_certificate }}</td>
                <td>{{ $standard->degree_level_requirement }}</td>
                <td>
                    <!-- Add Edit/Delete links here in future if needed -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
