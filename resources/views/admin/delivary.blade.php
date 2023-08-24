@extends('admin.layouts.tamplate')
@section('page_title')
    order_details
@endsection
@section('content')
<div class="container p-3">
    <h2>This Order deliverred Successfull !</h2>
    <div class="card-body bg-light">
    <table class="table">
        <thead>
         <td>Product ID</td>
         <td>Product name</td>
         <td>Quantity</td>
         <td>Price</td>
        </thead>
        <tr>
            <td>12</td>
            <td>Chair</td>
            <td>1</td>
            <td>1400</td>
        </tr>
        {{-- @foreach ($order_details as $order_detail)
        <tr>
            <td>{{$order_detail->product_id}}</td>
            <td>{{$order_detail->product_name}}</td>
            <td>{{$order_detail->quantity}}</td>
            <td>{{$order_detail->price}}</td>         
        </tr>
        @endforeach --}}
    </table>
    </div>
    <button class="btn btn-success"><a href="{{ route('admindashboard') }}">Back to home</a></button>
</div>
@endsection
