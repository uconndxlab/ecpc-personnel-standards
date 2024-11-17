@extends('layouts.app')

@section('content')
<div class="container">
    <h1>States</h1>
    
    @if($states->isEmpty())
        <p>No states available.</p>
    @else
        <div class="list-group">
            @foreach($states as $state)
                <a href="{{ route('state.show', $state->abbreviation) }}" class="list-group-item list-group-item-action">
                    {{ $state->name }} ({{ $state->abbreviation }})
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
