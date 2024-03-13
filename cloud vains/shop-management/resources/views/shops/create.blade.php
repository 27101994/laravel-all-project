<!-- resources/views/shops/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Shop</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="shop_name">Shop Name:</label>
        <input type="text" name="shop_name" required>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" required>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea>

        <label for="images">Upload Images:</label>
        <input type="file" name="images[]" accept="image/*" multiple>

        <button type="submit">Create Shop</button>
    </form>
@endsection
