@extends('frontend.user.user_template')
@section('profile_content')
		<link rel="stylesheet" href="{{ asset('home/css/invoice.css') }}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		
<div class="">
			<h1 class="bg-info py-3">Invoice</h1>
			<address >
				<span>Isamil</span><br>
				<span>722/3, Bashundhara len<br>kazipara,</span>
				<span>01244754</span>
			</address>
			<table class="meta">
				<tr>
					<th><span >Invoice No</span></th>
					<td><span >02</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >January 1, 2023</span></td>
				</tr>
			
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
					<tr>
						<td><span >Phone</span></td>
						<td><span >1</span></td>
						<td><span >25000</span></td>
						<td><span >25000</span></td>

					</tr>
				</tbody>
				<tbody>
					<tr>
						<td><span >T-shirt</span></td>
						<td><span >2</span></td>
						<td><span >1200</span></td>
						<td><span >2400</span></td>

					</tr>
				</tbody>
			</table>
			
		</article>
		<aside>
			<h1><span >Thank you</span></h1>
		</aside>
	</div>

@endsection