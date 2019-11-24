<section class="Me">
    <div class="container">
        <div class="row">
            <h2 class="col-lg-12">Название</h2>
            <div class="row">
                <textarea name="title" id="short_description" cols="30" rows="1" class="col-lg-12 form-control @error('title') is-invalid @enderror">{{ $order->title ?? '' }}</textarea>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <h3 class="col-lg-12">Описание | Техническое задание</h3>
            <div class="row">
                <textarea name="description" id="description" cols="300" rows="10" class="col-lg-12 form-control @error('description') is-invalid @enderror">{{ $order->description ?? '' }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</section>