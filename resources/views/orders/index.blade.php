@extends('layouts.layout')
@include('layouts.header')
@section('content')
	@if ($change)
		<a href="{{ route('order.create') }}" class="btn-link"><i class="fa fa-plus">Добавить заказ</i></a>
	@endif
	@forelse ($orders as $order)
		<section class="order">
		<div class="container order1">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ $order->title }}</h2>
				</div>
			</div>
			<div class=" order_text">
				<div class="order_text1">
					<span>{{ $order->description }}</span>
					<a href="{{ route('profile', $order->employer_id) }}">Заказчик</a>
				</div>
				<a href="{{ route('order.show', $order) }}" style="color:blue; margin-right: 10px">Подробнее</a>
				@if ($change)
					<a href="{{ route('order.edit', $order) }}" style="color:blue; margin-right: 10px"><i class="fa fa-edit">Редактировать</i></a>
					<form action="{{ route('order.destroy', $order) }}" onsubmit="if(confirm('Удалить?')){ return true } else { return false}" method="POST">
						{{ csrf_field() }}
						{{ method_field("DELETE") }}
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Удалить</button>
					</form>
				@endif
			</div>
		</div>
		</section>
	@empty
		<h1>Пока нету заказов :(</h1>
	@endforelse
	@include('layouts.footer')
@endsection