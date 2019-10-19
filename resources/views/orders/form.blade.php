<section class="Me">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12 teext">
                    <h2>Краткое описание работы</h2>
                    <div class="row">
                        <textarea name="title" id="short_description" cols="30" rows="10" class="col-lg-12 form-control">@isset($order) {{ $order->title }} @endisset</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h3 class="col-lg-12">Описание Техническое задание</h3>
            <div class="row">
                <textarea name="description" id="description" cols="30" rows="10" class="col-lg-12 form-control">@isset($order) {{ $order->description }} @endisset</textarea>
            </div>
        </div>
    </div>
</section>