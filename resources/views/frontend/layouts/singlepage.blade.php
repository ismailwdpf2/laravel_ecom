@extends('frontend.layouts.template')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>

                </div>
            </div>
            <div class="col-8">
                <div class="product_info box_main">
                    <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                    <p class="price_text text-left">{{ $product->price }}-TK</p>
                    <div class="my-3 product-detail text-left">
                        <p class="lead">{{ $product->product_description }}</p>
                        <ul>
                            <li>{{ $product->product_category_name }}</li>
                            <li>{{ $product->product_subcategory_name }}</li>
                            <li> {{ $product->quantity }}</li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{ route('addproductcart', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <label for="quantity">How many pices?</label>
                            <input class="form-control" type="number" min="1" placeholder="0" name="quantity"> <br>
                            <input class="btn btn-warning" type="submit" value="Add to cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <h5 class="fashion_taital">Related Products</h5>
        <div class="fashion_section_2">
            <div class="row">

                @foreach ($related_product as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                            <p class="price_text">{{ $product->price }}-TK </p>
                            <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                            <div class="btn_main">
                                <form action="{{ route('addproductcart', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input class="btn btn-warning" type="submit" value="Buy now">
                                </form>
                                <div class="seemore_bt"><a
                                        href="{{ route('singlepage', [$product->id, $product->slug]) }}">See More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
