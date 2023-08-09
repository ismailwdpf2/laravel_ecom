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
                                <td><img style="height:80px" src="{{ asset($image) }}" alt="img"></td>

                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td><a href="{{ route('removecart', $item->id) }}" class="btn btn-danger">Remove</a></td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        {{-- <tr>
                        <td></td>
                        <td></td>                
                        <td> <b>Total</b></td>
                        <td>{{ $total }}</td>
                        @if ($total <= 0)
                        <td><a class="btn btn-success disabled" href="">Checkout</a></td>
                        @else
                        <td><a class="btn btn-success" href="">Checkout</a></td> 
                        @endif                                           
                    </tr> --}}
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <b>Total</b></td>
                                <td>{{ $total }}</td>
                                <td><a class="btn btn-success" href="{{route('shippingaddress')}}">Checkout</a></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
