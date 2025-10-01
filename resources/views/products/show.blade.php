@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ID:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $product->id }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $product->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Category:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $product->category }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Price:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Stock Status:</label>
                        <div class="col-sm-9">
                            <span class="badge {{ $product->in_stock ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Created At:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $product->created_at->format('M j, Y g:i A') }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Updated At:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $product->updated_at->format('M j, Y g:i A') }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
