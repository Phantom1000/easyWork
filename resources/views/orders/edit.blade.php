@extends('layouts.layout')
@include('layouts.header')
@section('content')
    <form action="{{ route('order.update', $order) }}" method="POST"  >
        {{ csrf_field() }}
        {{ method_field('PUT')}}
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