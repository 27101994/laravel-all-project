@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shop List</h1>
        <ul class="list-unstyled">
            @forelse ($shops as $shop)
                <li class="border p-3 mb-3">
                    <strong>{{ $shop->shop_name }}</strong> - {{ $shop->status }}
                    <p>Contact Number: {{ $shop->contact_number }}</p>
                    <p>Address: {{ $shop->address }}</p>
                    
                    @if(count($shop->images) > 0)
                        <p class="font-weight-bold">Images:</p>
                        <div class="row">
                            @foreach($shop->images as $image)
                                <div class="col-md-3 mb-2">
                                    <img src="{{ asset('images/' . $image) }}" alt="Shop Image" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ route('shops.edit', $shop) }}" class="btn btn-primary mr-2">Edit</a>
                    
                    <form action="{{ route('shops.destroy', $shop) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shop?')">Delete</button>
                    </form>

                    <button class="btn btn-secondary change-status" data-url="{{ route('shops.changeStatus', $shop) }}">Change Status</button>
                </li>
            @empty
                <li>No shops available.</li>
            @endforelse
        </ul>
        <a href="{{ route('shops.create') }}" class="btn btn-success">Add Shop</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.change-status').on('click', function () {
                var url = $(this).data('url');
                var status = prompt('Enter new status (live or block):');
                if (status !== null && (status === 'live' || status === 'block')) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: { _token: "{{ csrf_token() }}", status: status },
                        success: function (data) {
                            alert(data.message);
                            location.reload();
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
