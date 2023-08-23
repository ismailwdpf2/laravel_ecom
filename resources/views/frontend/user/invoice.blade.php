@extends('frontend.user.user_template')
@section('profile_content')
		<link rel="stylesheet" href="{{ asset('home/css/invoice.css') }}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		
<div class="">
			<h1 class="bg-info py-3">Invoice</h1>
		
			<address >
								
				{{-- <p>Invoice Id: {{ $order->id}}</p> --}}
				<p>Name : {{$order->user->name}}</p>
				<p>Address : {{ $order->shipping_address}} , {{ $order->shipping_city}}</p>
				<p>Phone Number : {{ $order->shipping_phoneNo }}</p>
				<p>Date & time : {{ $order->updated_at}}</p>
										
			</address>
			
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Item</span></th>
						<th><span >Quantity</span></th>
						<th><span >Price</span></th>
						<th><span >Total Price</span></th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($orderDetails as $order)
					<tr>
						<td><span >{{ $order->Product->product_name }}</span></td>
						<td><span >{{ $order->quantity }}</span></td>
						<td><span >{{ $order->price }}</span></td>
						<td><span >{{ $order->total_price }}</span></td>

					</tr>
					@endforeach
				</tbody>
			
			
			</table>
			
		</article>
		<aside>
			<h1><span >Thank you</span></h1>
		</aside>
	</div>

@endsection