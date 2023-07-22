@extends('admin.layouts.tamplate')
@section('page_title')
    edit-category
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Category</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('updatecategory') }}" method="GET">
                            @csrf
                            <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category_info->category_name }}" />
                                </div>
                            </div>
                            <div class="justify-content-end p-3">
                                <button type="submit" class="btn btn-success">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
