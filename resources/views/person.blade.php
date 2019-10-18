@extends('layouts.layout')
@include('layouts.header')
@section('content')
	<section class="Me">
		<div class="container">
			<div class="row desk">
				<div class="col-lg-4 foto">
					<img src="@isset($avatar) {{ asset('/storage/' . $avatar) }} @endisset" class="my_foto" alt="">
				</div>
				<div class="col-lg-5 teext">
					<h2>{{ $name }}</h2><br>
					<span>{{ $short_description }}</span>
					@if (Auth::user() == $user)
						<a href="{{ route('profile.edit', $user) }}" style="color:red">Редактировать профиль</a>
					@endif
				</div>
			</div>
			<div class="row desk">
				<div class="co-lg-12 portfolio">
					<h3>Портфолио</h3> <br>
					<span>{{ $description }}</span>
				</div>
			</div>	
			<div class="row desk">
				<div class="comments">
					<h3>Оценки от заказчиков:</h3> <br>
					<div class="one">
						<span></span>
						<span></span>
					</div>
					<div class="one">
						<span></span>
						<span></span>
					</div>
				</div>
			</div>	
		</div>
	</section>
@endsection