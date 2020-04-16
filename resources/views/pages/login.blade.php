<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale-1">
		<title>Login - Jenitur Turismo</title>

		<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
		<link href="{{asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,900&display=swap')}}" rel="stylesheet">

	</head>
	<body>
		<div class="img"><img src="bus.jpg">

		</div>
		<div class="login">
			<div class="logo">
				<div class="logo1">
					<h1 align="center">JENITUR</h1>
				</div>
				<div class="logo2">
					<h3 align="center">Turismo</h3>
				</div>
			</div>

			<div class="form">
				<form>
					@csrf
					<div class="btn-holder">
						<input type="name" name="" placeholder="Usuário"><br>
						<input type="password" name="" placeholder="Senha"><br>
						<a href="#">Esqueceu sua senha?</a>
					
						<input type="submit" name="">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>