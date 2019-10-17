@extends('layouts.layout')
@include('layouts.header')
@section('content')
    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data" class="form-group">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <section class="Me">
            <div class="container">
                <div class="toop">
                    <input type="file" class="form-control-file" name="avatar" />
                    <div class="teext">
                        <h2>{{ $name }}</h2><br>
                        <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control">{{ $short_description }}</textarea>
                    </div>
                    <div id="rectangle1"></div>
                    <div id="rectangle2"></div>
                </div>
                <div>
                    <div class="portfolio">
                        <h3>Портфолио</h3> <br>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $description }}</textarea>
                    </div>
                    <div id="rectangle3"></div>
                </div>
            </div>
            <button type="submit" class="btn-success">Сохранить изменения</button>
        </form>
	</section>
@endsection