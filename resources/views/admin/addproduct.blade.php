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
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Category_Name"
                                        placeholder="Product Name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Price</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="Category_Name"
                                        placeholder="000.00" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="Category_Name"
                                        placeholder="100" />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Product Description</label>
                                <div class="col-sm-8">
                                    <textarea name="Product Description" id="" cols="45" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Select Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="exampleFormControlSelect1"
                                        aria-label="Default select example">
                                        <option selected>Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Select Sub Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="exampleFormControlSelect1"
                                        aria-label="Default select example">
                                        <option selected>Sub Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Image</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" id="formFile" />
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
