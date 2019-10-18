@extends('layouts.layout')
@include('layouts.header')
@section('content')
    <section class="Me">
        <div class="container">
            <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data" class="form-group">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <input type="file" class="col-lg-12 form-control-file" name="avatar" />
                    <div class="row">
                        <div class="col-lg-12 teext">
                            <h2>{{ $name }} о себе</h2>
                            <div class="row">
                                <textarea name="short_description" id="short_description" cols="30" rows="10" class="col-lg-12  form-control">{{ $short_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="col-lg-12">Портфолио</h3>
                        <textarea name="description" id="description" cols="300" rows="10" class="col-lg-12 form-control">{{ $description }}</textarea>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-12 rightt">
                    <button type="submit" class="btn-yes">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </section>
@endsection