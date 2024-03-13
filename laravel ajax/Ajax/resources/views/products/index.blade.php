@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Product List</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ url("/products/{$product->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/products/create') }}" class="btn btn-success">Add Product</a>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                fetch(`{{ url('/products') }}/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                });
            }
        }
    </script>
@endsection
