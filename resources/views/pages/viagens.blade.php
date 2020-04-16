<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale-1">
		<title>Viagens - Jenitur Turismo</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
		<link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.4.2/css/all.css') }}">
		<link href="{{ asset('https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,900&display=swap') }}" rel="stylesheet">

	</head>
	<body>
		<nav class="menu">
			<div class="logo">
				<div class="logo1">
					<h1 align="center">JENITUR</h1>
				</div>
				<div class="logo2">
					<h3 align="center">Turismo</h3>
				</div>
			</div>
			<a class="btn-close"><i class="fa fa-times"></i></a>
			<ul>
				<a href="/viagem/cadastrar"><li> Cadastrar Viagem </li></a>
				<a href="/viagens"><li> Cadastrar Passageiro </li></a>
				<a href="/relatorio"><li> Relatórios </li></a>
				<a href="/login"><li style="margin-top: 50%"> Sair </li></a>
			</ul>
		</nav>

		<button class="btn-menu"><i class="fa fa-bars fa-lg"></i></button>

		<!--Secao com todas as viagens cadastradas-->
		<content class="viagens">
			<div class="top">
				<h1>Escolha a Viagem</h1>
			</div>
			<!--A estrutura de repeticao deve comecar aqui-->
			@foreach($trip as $t)
			
			<a href="{{ route('passageiro.create', [$t->id]) }}">
				<div class="viagem">
					<!--Cidade origem     Estado origem-->
					<p> {{ $t->ORIGEM }} </p>
					
					<i class="fas fa-chevron-right"></i>
					<i class="fas fa-chevron-right"></i>
					<i class="fas fa-chevron-right"></i>
					
					<!--Cidade destino     Estado destino-->
					<p> {{ $t->DESTINO }} </p><br>
									     <!--Data da viagem-->
					<p>Data: &nbsp <span>  {{ $t->DATA }} </span></p>
									        <!--Veiculo-->
					<p>Placa: &nbsp <span> {{ $t->PLACAVEICULO }}  </span></p><br>
										  <!--Horario-->
					<p>Horário: &nbsp <span> {{ $t->HORARIO }}  </span></p><br>

						<p>Status: &nbsp <span class="status">{{ $t->STATUS }}</span></p>
				</div>
			</a>
			@endforeach
		</content>
		

		<!--JQUERY-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(".btn-menu").click(function(){
				$(".menu").show();
			})
			$(".btn-close").click(function(){
				$(".menu").hide();
			})
		</script>
	</body>
</html>
