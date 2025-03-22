@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2 class="text-center mb-4">Add New Property</h2>

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="bedrooms" class="form-label">No. of Bedrooms:</label>
                <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}" required>
            </div>
            <div class="col-md-6">
                <label for="bathrooms" class="form-label">No. of Bathrooms:</label>
                <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}" step="0.5" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
            </div>
            <div class="col-md-6">
                <label for="type" class="form-label">Type:</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House</option>
                    <option value="Apartment" {{ old('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" id="photo" name="photo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Property</button>
    </form>
</div>
@endsection