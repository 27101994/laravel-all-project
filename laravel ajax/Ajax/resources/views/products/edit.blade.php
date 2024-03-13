<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Product</h2>

        <form id="updateProductForm" action="{{ url("/products/{$product->id}") }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
            </div>

            <button type="button" class="btn btn-success" onclick="updateProduct()">Update Product</button>
        </form>

        <a href="{{ url('/products') }}" class="btn btn-secondary mt-2">Back to Product List</a>
    </div>

    <script>
        function updateProduct() {
            var form = document.getElementById('updateProductForm');
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    // Optional: Redirect to the product list or perform any other action.
                    window.location.href = '{{ url('/products') }}';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
@endsection
