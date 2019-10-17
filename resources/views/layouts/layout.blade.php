<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<title>Work Assasin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/iconfinder_Dollar_132599.png" type="image/png">

</head>
<body>

	<!-- меню -->
	<section class="menu">
		<div class="container">
			<nav class="row justify-content-center">
				<div class="navbar">
					<ul>
						<li>
							<a href="{{ route('index') }}">Главная</a>
						</li>
						<li>
							<a href="exchange.html">Биржа</a>
						</li>
						<li>
							<a href="faq.html">FAQ</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
    </section>

	@yield('content')

	<!-- 	форма регистрации 	 -->
	<div id="gray">
		<div id="form-wrap">
			@include('auth.register')
		</div>
	</div>

	<!-- 	форма входа		 -->
	<div id="gray1">
		<div id="form-wrap1">
			@include('auth.login')
		</div>
	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>