@extends('layouts.layout')
@section('title', "$name")
@section('content')
	@include('layouts.header')
    @include('layouts.menu')
	<section class="Me">
		<div class="container">
			<div class="row desk">
				<div class="col-lg-4 foto">
					<img src="@isset($avatar) {{ asset('/storage/' . $avatar) }} @endisset" class="my_foto" alt="">
				</div>
				<div class="col-lg-8 teext">
					<h2>{{ $name ?? '' }}</h2><br>
					<h3>Среднняя оценка от работодателей: {{ $avg ?? '' }}</h3>
					<span>{{ $short_description ?? '' }}</span>
					<br>
					@can('update', $user)
						<a href="{{ route('profile.edit', $user) }}" style="color:red; padding-left: 480px;">Редактировать профиль</a>
					@endcan
				</div>
			</div>
			<div class="row desk">
				<div class="co-lg-12 portfolio">
					<h3>Портфолио</h3> <br>
					<span>{{ $description ?? '' }}</span>
				</div>
			</div>
			@if (!$isEmployer)	
				<div class="row desk">
					<div class="comments">
						<h3>Оценки от заказчиков:</h3> <br>
						@foreach ($comments as $comment)
							<div class="one">
								<span>Заказчик <a href="{{ route('profile.show', $comment->order->employer) }}" style="color:red">{{ $comment->order->employer->name ?? '' }}</a></span>
								<span>Оценка {{ $comment->rating ?? '' }}</span>
								<span>Комментарий {{ $comment->description ?? '' }}</span>
							</div>			
						@endforeach
						{{ $comments->links() }}
					</div>
				</div>
			@endif
		</div>
	</section>
@endsection