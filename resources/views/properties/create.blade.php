<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
</head>
<body>

    <h1>Add New Property</h1>

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

    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required>{{ old('description') }}</textarea><br><br>

    <label for="bedrooms">No. of Bedrooms:</label><br>
    <input type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}" required><br><br>

    <label for="bathrooms">No. of Bathrooms:</label><br>
    <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}" step="0.5" required><br><br>

    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required><br><br>

    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" value="{{ old('location') }}" required><br><br>

    <label for="type">Type:</label><br>
    <select id="type" name="type" required>
        <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House</option>
        <option value="Apartment" {{ old('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
    </select><br><br>

    <label for="photo">Photo:</label><br>
    <input type="file" id="photo" name="photo" required><br><br>

    <button type="submit">Add Property</button>
</form>

    </body>
</html>