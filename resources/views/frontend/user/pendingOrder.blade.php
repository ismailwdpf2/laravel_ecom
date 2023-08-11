@extends('frontend.user.user_template')
@section('profile_content')
@if (session()->has('message'))
        <div class="alert alert-seccecc">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
    <table class="table">
        <tr>
            <td>Product ID</td>
            <td>Price</td>
        </tr>
    @foreach ($pending_orders as $order )
   
        <tr>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->total_price }}</td>
        </tr>          
    @endforeach
</table>
</div>
@endsection