@extends('layouts.layout')
@section('title', 'Создание заказа')
@section('content')
    @include('layouts.header')
    @include('layouts.menu')
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        @include('orders.form')
        <div class="row">
            <div class="col-lg-12 rightt">
                <button type="submit" class="btn-yes">Разместить заказ</button>
            </div>
        </div>
    </form>
@endsection