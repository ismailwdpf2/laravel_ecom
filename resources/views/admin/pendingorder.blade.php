@extends('admin.layouts.tamplate')
@section('page_title')
    pending-order
@endsection
@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-title p-2">
                <h4 class="text-center">Pending Orders
                </h4>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>User ID</td>
                            <td>Shipping Information</td>
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

                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td><a href="{{route('view_order')}}" class="btn btn-info">View Order</a></td>
                                <td><a href="" class="btn btn-success">Confirm Order</a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
