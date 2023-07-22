@extends('admin.layouts.tamplate')
@section('page_title')
    all-category
@endsection
@section('content')
    <div class="container">
        <div class="row card m-3 p-2">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">All Category</h5>
            </div>
            <li class="menu-item mx-3 px-3">
                <a href="{{ route('addcategory') }}" class="menu-link">
                    <div class="btn-success p-1 rounded">Add</div>
                </a>
            </li>
            @if (session()->has('message'))
                <div class="alert alert-seccecc">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->subcategory_count }}</td>
                                <td>{{ $category->product_count }}</td>
                                <td>
                                    <a href="{{ route('editcategory', $category->id) }}" class="btn-primary">Edit</a>
                                    <a href="{{ route('deletecategory', $category->id) }}" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
