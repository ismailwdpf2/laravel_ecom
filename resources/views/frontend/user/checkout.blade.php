@extends('frontend.layouts.template')
@section('main-content')
    <h2>Order details Overviwe</h2>
    <div class="row">
        <div class="col-5">
            <div class="box_main">
                <h3>Product will send at </h3>
                <p>City: {{ $shipping_address->city }}</p>
                <p>Phone Number: {{ $shipping_address->phone_number }}</p>
                <p>Address/Aria: {{ $shipping_address->address }}</p>
            </div>
        </div>

        <div class="col-7">
            <div class="box_main">
                <h3>Your Sellected products</h3>
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
                                {{-- @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    $image = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                @endphp --}}
                                {{-- <td>{{ $product_name }}</td> --}}
                                {{-- <td><img style="height:50px" src="{{ asset($image) }}" alt="img"></td> --}}

                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach                     
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <b>Total</b></td>
                                <td>{{ $total }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Cancel Order" class="btn btn-danger mx-3">
        </form> <br>
        <form action="{{ route('placeorder') }}" method="POST">
            {{-- @if(isset($order)) --}}
            {{-- <p>Order ID: {{ $order->id }}</p>
        <form action=" {{ route('update_order', ['id' => $order->id]) }}" method="POST"> --}}
            @csrf
            <label for="payment">Payment method:</label>

            <select name="payment" id="payment">
                <option value="Bkash">Bkash</option>
                <option value="Rocket">Rocket</option>
                <option value="Nagad">Nagad</option>
            </select> <br>
            Discount:
            <input name="discount" type="number"> 
            Transection Id:
             <input name="trx_id" type="text"> <br>
            Comment:
            <input type="text" name="comment">

            <input type="submit" value="Place Order" class="btn btn-success">
        </form>
        {{-- @else --}}
        {{-- <p>No order found.</p> --}}
    {{-- @endif --}}

    </div>
@endsection
