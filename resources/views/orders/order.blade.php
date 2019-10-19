@extends('layouts.layout')
@include('layouts.header')
@section('content')
    <div class="container text-center">
        <h2>{{ $order->title }}</h2>
        <h3>Разместил <a href="{{ route('profile', $employer) }}">{{ $employer->name }}</a></h3>
        <p>{{ $order->description }}</p>
    </div>
@endsection