@extends('layouts.layout')
@section('title', 'Заявки')
@section('content')
    @include('layouts.header')
    @include('layouts.menu')
	@for ($i = 0, $n = count($orders); $i < $n; $i++)
		<section class="order">
		<div class="container order1">
			<div class="row">
				<div class="col-lg-12">
                    <h2>Заявка на <a href="{{ route('order.show', $orders[$i]) }}">{{ $orders[$i]->title }}</a> от 
                        <a style="padding-right: 15px;" href="{{ route('profile', $orders[$i]->freelancer_id) }}">{{ $names[$i]->name }}</a></h2>
					<form action="{{ route('application.accept', $orders[$i]) }}" method="POST">
						@csrf
						@method('PUT')
						<button type="submit">Принять</button>
                    </form>
					<form action="{{ route('application.cancel', $orders[$i]) }}" method="POST">
						@csrf
						@method('PUT')
						<button type="submit">Отклонить</button>
					</form>
				</div>
			</div>
		</div>
		</section>
	@endfor
	@include('layouts.footer')
@endsection