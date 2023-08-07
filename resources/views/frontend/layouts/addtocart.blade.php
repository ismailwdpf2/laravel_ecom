@extends('frontend.layouts.template')
@section('main-content')
@if (session()->has('message'))
<div class="alert alert-seccecc">
    {{ session()->get('message') }}
</div>
@endif
@endsection