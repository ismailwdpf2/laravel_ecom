@extends('frontend.layouts.template')
@section('main-content')
@if (session()->has('message'))
<div class="alert alert-seccecc">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($cart_items as $item)
                  
                    <tr>
                        @php
                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                    @endphp
                        <td>{{ $product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td><a href="" class="btn btn-danger">Remove</a></td>
                    </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection