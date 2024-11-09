<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Create Product Form</title>
</head>
<body>
    <h1>Show the form to create a new product</h1>

    <form method="POST" action={{route('store')}} enctype="multipart/form-data">
        @csrf

        <label for="product_id">Product Id</label>
        <input id="product_id" name="product_id" type="text" value="{{ old('product_id') }}" class="@error('product_id') is-invalid @enderror" />
        @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" />
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <label for="description">Description</label>
        <input id="description" name="description" type="text" value="{{ old('description') }}" class="@error('description') is-invalid @enderror" />
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="price">Price</label>
        <input id="price" name="price" type="decimal" value="{{ old('price') }}" class="@error('price') is-invalid @enderror" />
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="stock">Stock</label>
        <input id="stock" name="stock" type="number" value="{{ old('stock') }}" class="@error('stock') is-invalid @enderror" />
        @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="image">Image</label>
        <input id="image" name="image" type="file" value="{{ old('image') }}" class="@error('image') is-invalid @enderror" />
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <input type="submit">
    </form>
</body>
</html>