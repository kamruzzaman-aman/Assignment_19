@extends('products.layout')
   
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Show Product</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product ID:</strong> <br/>
                {{ $product->product_id }}
            </div>
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $product->name }}
            </div>
             <div class="form-group">
                <strong>Description:</strong> <br/>
                {{ $product->description }}
            </div>
              <div class="form-group">
                <strong>Price:</strong> <br/>
                {{ $product->price }}
            </div>
              <div class="form-group">
                <strong>Stock:</strong> <br/>
                {{ $product->stock?? 0}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong><br/>
                <img src="/images/{{ $product->image }}" width="500px">
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection