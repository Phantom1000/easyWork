@extends('layouts.layout')
@include('layouts.header')
@section('content')
    <form action="{{ route('order.store') }}" method="POST" class="form-group">
        {{ csrf_field() }}
        @include('orders.form')
        <div class="row">
            <div class="col-lg-12 rightt">
                <button type="submit" class="btn-yes">Разместить заказ</button>
            </div>
        </div>
    </form>
@endsection