@extends('layouts.layout')
@section('title', "$order->title")
@section('content')
	@include('layouts.header')
    @include('layouts.menu')
    <section class="main_order">
    	<div class="container">
	    	<div class="row test11">
				<div class="col-lg-12 ">
	        		<h2>{{ $order->title ?? '' }}</h2>
	        	</div>
	        </div>
	        
	        <div class="row desk">
	        	<p class="col-lg-12">{{ $order->description ?? '' }}</p>
			</div>
			<div class="row">
				@if ($isApply)
					<a style="color:red; padding-right: 15px;" href="{{ route('application.create', $order) }}">Подать заявку</a>
				@endif
			</div>
	        <div class="row fint">
	        	<div class="col-lg-12">
	        		<span>Заказчик:  </span>
	        		<a style="color:red" href="{{ route('profile.show', $employer) }}">{{ $employer->name ?? '' }}</a>
	        	</div>
	        </div>
    	</div>
    </section>
@endsection