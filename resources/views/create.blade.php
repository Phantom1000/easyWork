    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data" class="form-group">
        <section class="Me">
            <div class="container">
                <div class="row">
                    <input type="file" class="col-lg-12 form-control-file" name="avatar" />
                    <div class="row">
                        <div class="col-lg-12 teext">
                            <h2>Краткое описание работы</h2>
                            <div class="row">
                                <textarea name="short_description" id="short_description" cols="30" rows="10" class="col-lg-12  form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="col-lg-12">Описание Техническое задание</h3>
                    <div class="row">
                        <textarea name="description" id="description" cols="30" rows="10" class="col-lg-12 form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 rightt">
                    <button type="submit" class="btn-yes">Разместить заказ</button>
                </div>
            </div>
        </section>
    </form>