@extends('layouts.layout')
@section('title', 'Главная')
@section('content')
	@include('layouts.header')
    @include('layouts.menu')
	<!-- блок с котейкой и описанием биржы -->
	<section class="first">
		<div class="container">
			<div class="row main_text">
				<div class="col-lg-5">
					<h1>Биржа фриланса</h1>
					<span class="first-text">
						Easy Work – более сотни заказов каждый день, 700 фрилансеров<br>
                        Работа по безопасной сделке. <br>

                        Честные отзывы и актуальный рейтинг. <br>

						Широкие возможности для заказчиков и фрилансеров. <br>

						Достойное вознаграждение и ожидаемый результат.
					</span> <br><br><br>
				</div>
			</div>
		</div>
	</section>
	
	<!-- инфа про фрилансеров и заказчиков -->
	<section class="second">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>
						ДЛЯ ФРИЛАНСЕРОВ
					</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-3">
					<h3>{{ $employersCount ?? '' }}</h3>	<br>
					<span>
						РАБОТОДАТЕЛЕЙ
					</span>
				</div>
				<div class="col-lg-3">
					<h3>{{ $ordersCount ?? '' }}</h3> <br>
					<span>
						ЗАКАЗОВ
					</span>
				</div>
				<div class="col-lg-3">
					<h3>12</h3> <br>
					<span>
						ДОСТИЖЕНИЙ
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<a id="get" href="{{ route('order.index') }}">Подать анкету</a>
				</div>
			</div>
		</div>
	</section>

	<!-- блок для работадателей -->
	<section class="third">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>
						ДЛЯ РАБОТОДАТЕЛЕЙ
					</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-3">
					<h3>{{ $freelancersCount ?? '' }}</h3>	<br>
					<span>
						ФРИЛАНСЕРА
					</span>
				</div>
				<div class="col-lg-3">
					<h3>{{ $worksCount ?? '' }}</h3> <br>
					<span>
						ВЫПОЛНЕННЫХ ЗАКАЗОВ
					</span>
				</div>
				<div class="col-lg-3">
					<h3>576</h3> <br>
					<span>
						ЧАСОВ
					</span>
				</div>
			</div>			
			<div class="row">
				<div class="col-lg-12">
					<a id="get" href="{{ route('order.create') }}">Подать заказ</a>
				</div>
			</div>
		</div>
	</section>
	
	@include('layouts.footer')
@endsection