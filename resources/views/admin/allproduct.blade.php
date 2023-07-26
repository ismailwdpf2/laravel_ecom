@extends('admin.layouts.tamplate')
@section('page_title')
all-product
@endsection
@section('content')
<div class="container">
    @if (session()->has('message'))
    <div class="alert alert-seccecc">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="row card m-3 p-2">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">All Product</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Image</th></th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)                     
                    <tr>
                        <td>{{$product->id }}</td>
                        <td>{{$product->product_name }}</td>
                        <td>
                            <img style="height: 100px;" src="{{asset($product->product_img)}}" alt="img">
                            <br>
                            <a href="" class="btn-primary">Edit</a>
                        </td>
                        <td>{{$product->price }}</td>
                        <td>
                            <a href="" class="btn-primary">Edit</a>
                            <a href="" class="btn-danger">Delete</a>
                        </td>
                    </tr>  
                    @endforeach                 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection