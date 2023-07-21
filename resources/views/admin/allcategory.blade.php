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
            
            @if(session()->has('message'))
                <div class="alert alert-seccecc">
                    {{session()->get('message')}}
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
                        <tr>
                            <td>1</td>
                            <td>Electronics</td>
                            <td>10</td>
                            <td>100</td>
                            <td>
                                <a href="" class="btn-primary">Edit</a>
                                <a href="" class="btn-danger">Delete</a>
                            </td>
                        </tr>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
