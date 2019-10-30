@extends('layouts.layout')
@section('title', $order->title)
@section('content')
	@include('layouts.header')
    @include('layouts.menu')
    <section class="main_order">
    	<div class="container">
	    	<div class="row test11">
				<div class="col-lg-12 ">
	        		<h2>{{ $order->title }}</h2>
	        	</div>
	        	<div class="row">
	        		<a href="{{ route('profile.show', $employer) }}">{{ $employer->name }}</a>
	        </div>
	        </div>
	        <div class="row desk">
	        	<p class="col-lg-12">{{ $order->description }}</p>
	        </div>
    	</div>
    </section>
@endsection