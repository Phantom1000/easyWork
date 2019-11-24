@extends('layouts.layout')
@section('title', 'Ошибка')
@section('content')
    @include('layouts.header')
    @include('layouts.menu')
    <div class="row">
        <div class="div col-lg-6 m-auto">
            <h1>У вас нет доступа к редактированию данного ресурса</h1>
        </div>
    </div>
@endsection