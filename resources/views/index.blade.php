@extends('layouts.layout')
@include('layouts.header')
@section('content')
	
	<!-- блок с котейкой и описанием биржы -->
	<section class="first">
		<div class="container">
			<div class="row main_text">
				<div class="col-lg-5">
					<h1>Биржа фриланса</h1>
					<span class="first-text">
						Work Assasin – более сотни заказов каждый день, 700 фрилансеров<br>
                        Работа по безопасной сделке. <br>

                        Честные отзывы и актуальный рейтинг. <br>

						Широкие возможности для заказчиков и фрилансеров. <br>

						Достойное вознаграждение и ожидаемый результат.
					</span> <br><br><br>
				</div>
				<!-- hyu -->
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
					<h3>80</h3>	<br>
					<span>
						РАБОТОДАТЕЛЕЙ
					</span>
				</div>
				<div class="col-lg-3">
					<h3>330</h3> <br>
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
					<button id="get">Подать анкету</button>
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
					<h3>282</h3>	<br>
					<span>
						ФРИЛАНСЕРА
					</span>
				</div>
				<div class="col-lg-3">
					<h3>789</h3> <br>
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
					<button id="get">Подать заказ</button>
				</div>
			</div>
		</div>
	</section>
	
	@include('layouts.footer')
@endsection