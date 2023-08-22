@extends('admin.layouts.tamplate')
@section('page_title')
    order_details
@endsection
@section('content')
<div class="container p-3">
    <h2>Order details:</h2>

    <table class="table">
        <thead>
         <td>Product ID</td>
         <td>Product name</td>
         <td>Quantity</td>
         <td>Price</td>
        </thead>
        @foreach ($order_details as $order_detail)
        <tr>
            <td>{{$order_detail->product_id}}</td>
            <td>{{$order_detail->product_name}}</td>
            <td>{{$order_detail->quantity}}</td>
            <td>{{$order_detail->price}}</td>         
        </tr>
        @endforeach
    </table>
</div>
@endsection
