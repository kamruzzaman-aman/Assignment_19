<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>
                <a href="#" class="sort-link" data-sort="name" data-direction="{{ $sortDirection === 'asc' ? 'desc' : 'asc' }}">
                    Name
                    @if ($sortField === 'name')
                        <i class="bi {{ $sortDirection === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill' }}"></i>
                    @endif
                </a>
            </th>
            <th>Description</th>
            <th>
                <a href="#" class="sort-link" data-sort="price" data-direction="{{ $sortDirection === 'asc' ? 'desc' : 'asc' }}">
                    Price
                    @if ($sortField === 'price')
                        <i class="bi {{ $sortDirection === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill' }}"></i>
                    @endif
                </a>
            </th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ \Illuminate\Support\Str::words($product->description, 5, '...') }}</td>
                <td>৳{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock ?? '0' }}</td>
                <td>
                    <img src="{{ asset('images/'. $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 100px;">
                </td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

