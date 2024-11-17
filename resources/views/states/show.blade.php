@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Standards for {{ $state->name }} ({{ $state->abbreviation }})</h1>

    <a href="{{ route('standards.create') }}" class="btn btn-primary mb-3">Create Standard</a>

    @if($standards->isEmpty())
        <p>No standards available for this state.</p>
    @else
        <div class="accordion" id="standardsAccordion">
            @foreach($standards as $index => $standard)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{ $index }}" 
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                aria-controls="collapse{{ $index }}">
                            {{ $standard->name }} - {{ $standard->discipline->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                         aria-labelledby="heading{{ $index }}" data-bs-parent="#standardsAccordion">
                        <div class="accordion-body">
                            <p><strong>Discipline:</strong> {{ $standard->discipline->name }}</p>
                            <p><strong>State:</strong> {{ $state->name }} ({{ $state->abbreviation }})</p>
                            <p><strong>Additional Metadata:</strong></p>
                            <ul>
                                <li>Example Field 1: {{ $standard->example_field_1 ?? 'N/A' }}</li>
                                <li>Example Field 2: {{ $standard->example_field_2 ?? 'N/A' }}</li>
                                <!-- Add other fields as necessary -->
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
