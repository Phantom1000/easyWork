@extends('layouts.layout')
@include('layouts.header')
@section('content')
	<section class="Me">
		<div class="container">
			<div class="toop">
				<div class=" foto">
					<img src="{{ $avatar }}" class="my_foto" alt="">
				</div>
				<div class="teext">
					<h2>{{ $name }}</h2><br>
					<span>{{ $short_description }}</span>
					@if (Auth::user() == $user)
						<a href="{{ route('profile.edit', $user) }}" style="color:red">Редактировать профиль</a>
					@endif
				</div>
			
				
				<div id="rectangle1"></div>
				<div id="rectangle2"></div>
			</div>
			<div>
				<div class="portfolio">
					<h3>Портфолио</h3> <br>
					<span>{{ $description }}</span>
				</div>
				<div id="rectangle3"></div>
			</div>	
			<div>
				<div class="comments">
					<h3>Оценки от заказчиков:</h3> <br>
					<div class="one">
						<span>Пупа и Лупа "sex shop"</span>
						<span>- Всё было охуенно!!!</span>
					</div>
					<div class="one">
						<span>Саня "оргтехника "</span>
						<span>- Ебать профи!!</span>
					</div>
				</div>
				<div id="rectangle4"></div>
			</div>	
		</div>
	</section>
@endsection