@extends('layouts.layout')
@include('layouts.header')
@section('content')
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
				<a href="{{ route('order.show', $order) }}">Подробнее</a>
			</div>
		</div>
		</section>
	@empty
		<h1>Пока нету заказов :(</h1>
	@endforelse
	@include('layouts.footer')
@endsection