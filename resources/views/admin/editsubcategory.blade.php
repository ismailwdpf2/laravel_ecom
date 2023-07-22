@extends('admin.layouts.tamplate')
@section('page_title')
    edid-Subcategory
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Sub Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updatesubcategory') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$subcategory_info->id}}" name="subcategory_id">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Sub Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                        value="{{$subcategory_info->subcategory_name}}" />
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-success">Add Sub Category</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
