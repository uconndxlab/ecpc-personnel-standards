@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Standard</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('standards.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Standard Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        

        <div class="mb-3">
            <label for="discipline_id" class="form-label">Discipline</label>
            <select class="form-select" id="discipline_id" name="discipline_id" required>
                <option value="">Select Discipline</option>
                @foreach($disciplines as $discipline)
                    <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="license_certificate" class="form-label">License/Certificate</label>
            <input type="text" class="form-control" id="license_certificate" name="license_certificate" required>
        </div>

        <div class="mb-3">
            <label for="state_department" class="form-label">State Department</label>
            <input type="text" class="form-control" id="state_department" name="state_department" required>
        </div>

        <div class="mb-3">
            <label for="type_of_license_certificate" class="form-label">Type of License/Certificate</label>
            <input type="text" class="form-control" id="type_of_license_certificate" name="type_of_license_certificate" required>
        </div>

        <div class="mb-3">
            <label for="degree_level_requirement" class="form-label">Degree Level Requirement</label>
            <input type="text" class="form-control" id="degree_level_requirement" name="degree_level_requirement" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
