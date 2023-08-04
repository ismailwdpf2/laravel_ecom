@extends('frontend.layouts.template')
@section('main-content')
{{-- Welcom user {{Auth::user()->name }} --}}

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">Pending Order</a></li>
                    <li><a href="">History</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                
            </div>
        </div>
    </div>
</div>
@endsection