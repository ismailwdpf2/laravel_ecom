@extends('frontend.layouts.template')
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone number</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address/aria</label>
                        <input type="text" class="form-control">
                    </div>
                    <input type="submit" value="Next" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection
