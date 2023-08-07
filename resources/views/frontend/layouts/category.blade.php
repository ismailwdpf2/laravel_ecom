@extends('frontend.layouts.template')
@section('main-content')
<h2>
    {{ $category->category_name }} - ({{ $category->product_count }})
</h2>

<div class="container">
    <h1 class="fashion_taital">Products</h1>
    <div class="fashion_section_2">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-sm-4">
                    <div class="box_main">
                        <h4 class="shirt_text">{{ $product->product_name }}</h4>
                        <p class="price_text">{{ $product->price }}-TK
                        <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                        <div class="btn_main">
                            <form action="{{ route('addproductcart', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input class="btn btn-warning" type="submit" value="Buy now">
                            </form>
                            <div class="seemore_bt"><a href="{{ route('singlepage',[$product->id, $product->slug]) }}">See More</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection