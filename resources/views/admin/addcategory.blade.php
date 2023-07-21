@extends('admin.layouts.tamplate')
@section('page_title')
    add-category
@endsection
@section('content')
    <div class="container">
        <div class="row m-5 p-2">

            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Add Category</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Category_Name"
                                        placeholder="Category Name" />
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
