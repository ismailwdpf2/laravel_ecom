@extends('admin.layouts.tamplate')
@section('page_title')
    editProductImg
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product Img</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateproductimg') }}" enctype="multipart/form-data" method="POST">
                            {{-- <form action="{{ route('editProductImg', ['id' => $productinfo->id]) }}" enctype="multipart/form-data" method="POST"> --}}
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Previes Image</label>
                                <div class="col-sm-8">
                                    <img style="height: 150px;" src="{{ asset($productinfo->product_img) }}" alt="">
                                </div>
                            </div>

                            <input type="hidden" value="{{ $productinfo->id }}" name="id">

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">New Image</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" id="product_img" name="product_img" />
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-success">Update Image</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
