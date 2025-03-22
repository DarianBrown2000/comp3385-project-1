@extends('layouts.app')

@section('content')
    <h1>{{ $property->title }}</h1>

    <div class="card mb-4">
        <img src="{{ asset('storage/' . $property->photo) }}" class="card-img-top" alt="{{ $property->title }}">
        <div class="card-body">
            <p class="card-text">{{ $property->description }}</p>
            <p class="card-text">Bedrooms: {{ $property->bedrooms }}</p>
            <p class="card-text">Bathrooms: {{ $property->bathrooms }}</p>
            <p class="card-text">Location: {{ $property->location }}</p>
            <p class="card-text">Price: ${{ number_format($property->price, 2) }}</p>
            <p class="card-text">Type: {{ $property->type }}</p>
            <button class="btn btn-outline-info">Email Realtor</button>
        </div>
    </div>
@endsection