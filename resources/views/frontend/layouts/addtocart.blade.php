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
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                  
                    <tr>
                        @php
                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                        $image = App\Models\Product::where('id', $item->product_id)->value('product_img');
                        @endphp
                        <td>{{ $product_name }}</td>
                        <td><img style="height:80px" src="{{asset($image)}}" alt="img"></td>

                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td><a href="" class="btn btn-danger">Remove</a></td>
                    </tr>
                        @php
                            $total = $total + $item->price;                      
                        @endphp                       
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td>{{ $total }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection