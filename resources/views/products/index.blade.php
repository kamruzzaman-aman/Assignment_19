@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Product Management System</h2>
  <div class="card-body">
        
         @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
            <input type="text" id="search" name="search" placeholder="Search by Product ID, Name, Price, or Description" class="form-control">
        </div>
        

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> Create New Product</a>
        </div>

        <div class="table-responsive">
            <div id="product-list">
                @include('products.table', ['products' => $products])
            </div>
            <div id="pagination-links">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function fetchProducts(url, searchValue = '', sortField = 'name', sortDirection = 'asc') {
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    search: searchValue,
                    sort: sortField,
                    direction: sortDirection
                },
                success: function (response) {
                    $('#product-list').html(response.html);
                    $('#pagination-links').html(response.pagination);
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }

        $('#search').on('input', function () {
            let searchValue = $(this).val();
            let sortField = $('#sortField').val() || 'name'; 
            let sortDirection = $('#sortDirection').val() || 'asc'; 
            fetchProducts("{{ route('products.index') }}", searchValue, sortField, sortDirection);
        });


        $(document).on('click', '.sort-link', function (e) {
            e.preventDefault();

            let sortField = $(this).data('sort');
            let sortDirection = $(this).data('direction');
            let searchValue = $('#search').val();

            fetchProducts("{{ route('products.index') }}", searchValue, sortField, sortDirection);
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();

            let url = $(this).attr('href');
            let searchValue = $('#search').val();
            let sortField = $('#sortField').val() || 'name';
            let sortDirection = $('#sortDirection').val() || 'asc';

            fetchProducts(url, searchValue, sortField, sortDirection);
        });
    });
</script>
@endsection
