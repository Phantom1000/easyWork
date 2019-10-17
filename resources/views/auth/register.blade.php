<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя пользователя') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group-row">
                            <div class="col-md-4 m-auto">
                                <input class="form-check-input" type="radio" name="role" value="employer">
                                <label class="form-check-label" for="role">
                                    {{ __('Работодатель') }}
                                </label>
                            </div>
                            <div class="col-md-4 m-auto">
                                <input class="form-check-input" type="radio" name="role" value="freelancer">
                                <label class="form-check-label" for="role">
                                    {{ __('Фрилансер') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5 m-auto">
                                <button type="submit" class="btn btn-primary" style="width:120%">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>

                         <a class="btn btn-link test77" href="{{ url()->previous() }}">
                            {{ __('Закрыть окно') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
