@extends('layouts.layout')
@section('title', 'Биржа')
@section('content')
	@include('layouts.header')
    @include('layouts.menu')
	@if ($change)
		@if ($isEmployer)
			<a class="dvig" href="{{ route('order.create') }}" class="btn-link"><i class="fa fa-plus">Добавить заказ</i></a>
		@endif
	@endif
	@forelse ($orders as $order)
		<section class="order">
		<div class="container order1">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ $order->title }}</h2>
				</div>
			</div>
			<div class="row order_text">
				<div class="col-lg-12">
					<div class="order_text1">
						<span>{{ $order->description }}</span>
						<div class="ri">
							<a style="padding-right: 15px;" href="{{ route('profile.show', $order->employer) }}">Заказчик</a>
							@if (!$change && !$isEmployer) <a style="padding-right: 15px;" href="{{ route('application.create', $order) }}">Подать заявку</a> @endif
							<a href="{{ route('order.show', $order) }}" style="color:black">Подробнее</a>
						</div>
					</div>
				
				@if ($change && $isEmployer)
					<a href="{{ route('order.edit', $order) }}" style="color:black; padding-right: 20px; ">Редактировать</a>
					<form action="{{ route('order.destroy', $order) }}" onsubmit="if(confirm('Удалить?')){ return true } else { return false}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit"> Удалить</button>
					</form>
				@endif
				</div>
			</div>
		</div>
		</section>
	@empty
		<h1 class="nul">Пока нету заказов</h1>
	@endforelse
@endsection