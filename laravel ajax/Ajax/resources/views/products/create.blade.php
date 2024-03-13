<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Create Product</h2>

        <form id="createProductForm" action="{{ url('/products') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" required>
            </div>

            <button type="button" class="btn btn-primary" onclick="createProduct()">Create Product</button>
        </form>

        <a href="{{ url('/products') }}" class="btn btn-secondary mt-3">Back to Product List</a>
    </div>

    <script>
        function createProduct() {
            var form = document.getElementById('createProductForm');
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
