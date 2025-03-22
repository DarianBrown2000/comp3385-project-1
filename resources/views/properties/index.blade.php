@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $property->photo) }}" class="card-img-top" alt="{{ $property->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->location }}</p>
                        <p class="card-text">Price: ${{ number_format($property->price, 2) }}</p>
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary">View Property</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection