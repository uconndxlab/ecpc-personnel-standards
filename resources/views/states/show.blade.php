@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Standards for {{ $state->name }} ({{ $state->abbreviation }})</h1>

    @if($standards->isEmpty())
        <p>No standards available for this state.</p>
    @else
        <div class="accordion" id="standardsAccordion">
            @foreach($standards as $standard)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ $standard->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $standard->id }}" aria-expanded="false" aria-controls="collapse-{{ $standard->id }}">
                            {{ $standard->name }} ({{ $standard->discipline->name }})
                        </button>
                    </h2>
                    <div id="collapse-{{ $standard->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $standard->id }}" data-bs-parent="#standardsAccordion">
                        <div class="accordion-body">
                            <dl class="row">
                                <dt class="col-sm-4">Discipline</dt>
                                <dd class="col-sm-8">{{ $standard->discipline->name }}</dd>

                                <dt class="col-sm-4">License/Certificate</dt>
                                <dd class="col-sm-8">{{ $standard->license_certificate }}</dd>

                                <dt class="col-sm-4">State Department</dt>
                                <dd class="col-sm-8">{{ $standard->state_department }}</dd>

                                <dt class="col-sm-4">State Department Hyperlink</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ $standard->state_department_hyperlink }}" target="_blank" rel="noopener">
                                        {{ $standard->state_department_hyperlink }}
                                    </a>
                                </dd>

                                <dt class="col-sm-4">Type of License/Certificate</dt>
                                <dd class="col-sm-8">{{ $standard->type_of_license_certificate }}</dd>

                                <dt class="col-sm-4">Age Range</dt>
                                <dd class="col-sm-8">{{ $standard->age_range }}</dd>

                                <dt class="col-sm-4">Degree Level Requirement</dt>
                                <dd class="col-sm-8">{{ $standard->degree_level_requirement }}</dd>

                                <dt class="col-sm-4">Licensure Specific Curriculum/Coursework</dt>
                                <dd class="col-sm-8">{{ $standard->licensure_specific_coursework }}</dd>

                                <dt class="col-sm-4">Licensure Require Specific Field or Clinical Work?</dt>
                                <dd class="col-sm-8">{{ $standard->licensure_require_specific_field_or_clinical_work }}</dd>

                                <dt class="col-sm-4">Licensure Dependent on an Exam?</dt>
                                <dd class="col-sm-8">{{ $standard->licensure_dependent_on_exam }}</dd>
                            </dl>
                            <a href="{{ route('standards.edit', $standard->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('standards.destroy', $standard->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
