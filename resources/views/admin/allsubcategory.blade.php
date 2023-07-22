@extends('admin.layouts.tamplate')
@section('page_title')
all-Subcategory
@endsection
@section('content')
<div class="container">
    <div class="row card m-3 p-2">
        @if (session()->has('message'))
        <div class="alert alert-seccecc">
            {{ session()->get('message') }}
        </div>
    @endif
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">All Sub Category</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Sub Category Name</th>
                        <th>Category Name</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>{{ $subcategory->product_count }}</td>
                                <td>
                                    <a href="{{ route('editsubcategory', $subcategory->id)}}" class="btn-primary">Edit</a>
                                    <a href="{{ route('deletesubcategory', $subcategory->id,$subcategory->category_id)}}" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach            
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection