@extends('layouts.layout')
@section('title', 'Комментарий')
@section('content')
    @include('layouts.header')
	@include('layouts.menu')
    <div class="container">
        <div class="form-wrap">
            <h1>Оставить оценку за <a href="{{ route('order.show', $order) }}" style="color:red">{{ $order->title ?? '' }}</a></h1>
            <form action="{{ route('comment.store', $order) }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-sm-9 text-center mt-3">
                        <h3><label for="description">Текст комментария</label></h3>
                    </div>
                    <div class="col-sm-3 text-center mt-3">
                        <h3><label>Оценка работы</label></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <textarea name="description" id="description" cols="30" rows="10" class="col-lg-12  form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        <div class="rating-area @error('rating') is-invalid @enderror">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"></label>	
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"></label>    
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>  
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"></label>    
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"></label>
                        </div>
                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit">Отправить</button> 
            </form>
        </div>
    </div>
@endsection