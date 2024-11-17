@extends('layouts.app')

{{-- 
$table->string('license_certificate');
$table->string('state_department');
$table->string('state_department_hyperlink')->nullable();
$table->string('type_of_license_certificate');
$table->string('age_range')->nullable();
$table->string('degree_level_requirement');
$table->boolean('licensure_specific_coursework')->default(false);
$table->boolean('licensure_require_fieldwork')->default(false);
$table->boolean('licensure_dependent_on_exam')->default(false);
$table->boolean('additional_req_part_c')->default(false);
$table->boolean('additional_req_schools')->default(false);
$table->string('additional_route_provisional_temp')->nullable();
--}}

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

        <div class="row mb-3">
            <div class="col">
                <label for="discipline_id" class="form-label">Discipline</label>
                <select class="form-select" id="discipline_id" name="discipline_id" required>
                    @foreach($disciplines as $discipline)
                        <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="state_id" class="form-label">State</label>
                <select class="form-select" id="state_id" name="state_id" required>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="license_certificate" class="form-label">License/Certificate</label>
                <input type="text" class="form-control" id="license_certificate" name="license_certificate" required>
            </div>
            <div class="col">
                <label for="state_department" class="form-label">State Department</label>
                <input type="text" class="form-control" id="state_department" name="state_department" required>
            </div>
            <div class="col">
                <label for="state_department_hyperlink" class="form-label">State Department Hyperlink</label>
                <input type="text" class="form-control" id="state_department_hyperlink" name="state_department_hyperlink">
            </div>
        </div>

        <div class="row mb-3">

            <div class="col">
                <label for="type_of_license_certificate" class="form-label">Type of License/Certificate</label>
                <input type="text" class="form-control" id="type_of_license_certificate" name="type_of_license_certificate" required>
            </div>
            <div class="col">
                <label for="age_range" class="form-label">Age Range</label>
                <input type="text" class="form-control" id="age_range" name="age_range">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col">
                <label for="degree_level_requirement" class="form-label">Degree Level Requirement</label>
                <input type="text" class="form-control" id="degree_level_requirement" name="degree_level_requirement" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="licensure_specific_coursework" class="form-label">Licensure Specific Coursework/Fieldwork</label>
                <input type="text" class="form-control" id="licensure_specific_coursework" name="licensure_specific_coursework">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="licensure_dependent_on_exam" class="form-label">Licensure Dependent on Exam</label>
                <input type="text" class="form-control" id="licensure_dependent_on_exam" name="licensure_dependent_on_exam">
            </div>
            <div class="col">
                <label for="additional_req_part_c" class="form-label">Additional Req Part C</label>
                <input type="text" class="form-control" id="additional_req_part_c" name="additional_req_part_c">
            </div>
        </div>

        <div class="mb-3">
            <label for="additional_req_schools" class="form-label">Additional Req Schools</label>
            <input type="text" class="form-control" id="additional_req_schools" name="additional_req_schools">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
