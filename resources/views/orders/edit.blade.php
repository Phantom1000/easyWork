@extends('layouts.layout')
@section('title', 'Редактирование заказа')
@section('content')
    @include('layouts.header')
    @include('layouts.menu')
    <form action="{{ route('order.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        @include('orders.form')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 rightt">
                    <button type="submit" class="btn-yes">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </form>
@endsection