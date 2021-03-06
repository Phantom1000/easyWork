@extends('layouts.layout')
@section('title', 'Заявки')
@section('content')
    @include('layouts.header')
    @include('layouts.menu')
    <section class="order">
        @forelse ($applications as $application)
            @if ($flag)
                @include('applications.freelancer')
            @else
                @if (!$application->reject)
                    @include('applications.employer')             
                @endif
            @endif
        @empty
            <h2 class="nul">У вас пока нет заявок</h2>
        @endforelse
    </section>
@endsection