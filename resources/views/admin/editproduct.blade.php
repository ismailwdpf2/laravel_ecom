@extends('admin.layouts.tamplate')
@section('page_title')
    Edit-product
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateproduct') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $productinfo->id }}" name="id">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        value="{{ $productinfo->product_name }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Price</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="price" name="price" value="{{ $productinfo->price }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $productinfo->quantity }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Description</label>
                                <div class="col-sm-8">
                                    <textarea name="product_description" id="product_description" cols="45" rows="5">{{ $productinfo->product_description }}</textarea>
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-success">Save Product</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
