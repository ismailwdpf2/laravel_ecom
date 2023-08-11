@extends('admin.layouts.tamplate')
@section('page_title')
pending-order
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-title">
            <div class="card-body">              
                    <table class="table">
                        <tr>
                            <td>User ID</td>
                            <td>Shipping Information</td>
                            <td>Product ID</td>
                            <td>Quantity</td>
                            <td>Total Pay</td>
                         
                            <td>Action</td>
                        </tr>
                        @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->userid }}</td>
                            <td>
                                <ul>
                                    <li>Phone Number: {{ $order->shipping_phoneNo }}</li>
                                    <li>City :{{ $order->shipping_city }}</li>
                                    <li>Address: {{ $order->shipping_address }}</li>
                                </ul>
                            </td>

                            <td>{{ $order->product_id }}</td>                        
                            <td>{{ $order->quantity }}</td>                        
                            <td>{{ $order->total_price }}</td>                        
                            <td><a href="" class="btn btn-success">Approve</a></td>                        
                        </tr>
                        @endforeach
                    </table>
                
            </div>
        </div>
    </div>
</div>
@endsection