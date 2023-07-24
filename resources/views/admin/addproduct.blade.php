@extends('admin.layouts.tamplate')
@section('page_title')
    add-product
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('storeproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Product Name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Price</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="price" name="price" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="quantity" name="quantity" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Description</label>
                                <div class="col-sm-8">
                                    <textarea name="product_description" id="product_description" cols="45" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Select Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="product_category_id" name="product_category_id"
                                        aria-label="Default select example">
                                        <option>Select Product Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Select Sub Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="product_subcategory_id" name="product_subcategory_id"
                                        aria-label="Default select example">
                                        <option>Select Product Sub Category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Image</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" id="product_img" name="product_img" />
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-success">Add Product</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
