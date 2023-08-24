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
            <td>User ID</td>
            <td>Payment</td>
            <td>Price</td>
        </tr>
    @foreach ($pending_orders as $order )

        <tr>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->payment }}</td>
            <td>{{ $order->total_price }}</td>

        </tr>          
    @endforeach
</table>
</div>
<button class="btn btn-primary"><a href="{{ route('invoice',$order->id)}}">Invoice</a></button>
@endsection