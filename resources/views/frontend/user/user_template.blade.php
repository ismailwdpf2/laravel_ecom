@extends('frontend.layouts.template')
@section('main-content')
{{-- Welcom user {{Auth::user()->name }} --}}
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="box_main">
                <ul>
                    <li><a href="{{ route('pendingOrder')}}">Pending Order</a></li>
                    <li><a href="{{ route('userHistory')}}">History</a></li>
                    {{-- <li><a href="{{ route('invoice')}}">Invoice</a></li> --}}
                    {{-- <li><a href="{{ route('user-profile')}}">Logout</a></li> --}}
                </ul>
            </div>
        </div>
        <div class="col-lg-6 ml-6">
            <div class="box_main">
                @yield('profile_content')
            </div>
        </div>
    </div>
</div>
@endsection
