<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale-1">
		<title>Cadastrar Passageiro - Jenitur Turismo</title>

		<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
		<link href="{{asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,900&display=swap')}}" rel="stylesheet">

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
				<a href="/viagens"><li> Cadastrar Viagem </li></a>
				<a href="/viagens"><li> Cadastrar Passageiro </li></a>
				<a href="/relatorio"><li> Relatórios </li></a>
				<a href="/login"><li style="margin-top: 50%"> Sair </li></a>
			</ul>
		</nav>

		<button class="btn-menu"><i class="fa fa-bars fa-lg"></i></button>

		<!--Secao com todas as viagens cadastradas-->
		<content class="viagens">
			<div class="top">
				<h1>Passageiro</h1>
			</div>
		
			<div class="form-grid">
			<?php
			 $url = $_SERVER["REQUEST_URI"];
			 $arr = explode("/", $url);

			 $id = $arr[3];

			?>
			<form action="{{ route('passageiro.store', [$id] )}}" method="post">
    			@csrf
					<div class="item1">
						<label>Nome</label><br>
						<input type="text" name="nome">
					</div>

					<div class="item2">
						<label>CPF</label><br>
						<input type="number" name="cpf">
					</div>

					<div class="item3">
						<label>RG</label><br>
						<input type="text" name="rg">
					</div><br>

					<div class="item4">
						<label>Data de Nascimento</label><br>
						<input type="date" name="datanasc">
					</div><br>

					<div class="item6">
						<label>Telefone 1</label><br>
						<input type="number" name="telefone1">
					</div>

					<div class="item7">
						<label>Telefone 2</label><br>
						<input type="number" name="telefone2">
					</div><br>

					<div class="crianca">
						<label>Possui criança de colo?</label><br>
						<input type="radio" name="action" style="display: inline;">
						<label for="sim"  style="display: inline;">Sim</label>
						<input type="radio" name="action" style="display: inline;">
						<label for="nao"  style="display: inline;">Não</label><br>
					</div>
					
					<label>Escolha uma poltrona:</label>

					<table>
						<tr>
							<td><input type="button" value="03"></td>
							<td><input type="button" value="07"></td>
							<td><input type="button" value="11"></td>
							<td><input type="button" value="15"></td>
							<td><input type="button" value="19"></td>
							<td><input type="button" value="23"></td>
							<td><input type="button" value="27"></td>
							<td><input type="button" value="31"></td>
							<td><input type="button" value="35"></td>
							<td><input type="button" value="39"></td>
							<td><input type="button" value="43"></td>
							<td><input type="button" value="47"></td>
						</tr>

						<tr>
							<td><input type="button" value="04"></td>
							<td><input type="button" value="08"></td>
							<td><input type="button" value="12"></td>
							<td><input type="button" value="16"></td>
							<td><input type="button" value="20"></td>
							<td><input type="button" value="24"></td>
							<td><input type="button" value="28"></td>
							<td><input type="button" value="32"></td>
							<td><input type="button" value="36"></td>
							<td><input type="button" value="40"></td>
							<td><input type="button" value="44"></td>
							<td><input type="button" value="48"></td>
						</tr>
						<tr>
							<td style="border: none">&nbsp</td>
						</tr>
						<tr>
							<td><input type="button" value="02"></td>
							<td><input type="button" value="06"></td>
							<td><input type="button" value="10"></td>
							<td><input type="button" value="14"></td>
							<td><input type="button" value="18"></td>
							<td><input type="button" value="24"></td>
							<td><input type="button" value="26"></td>
							<td><input type="button" value="30"></td>
							<td><input type="button" value="34"></td>
							<td><input type="button" value="38"></td>
							<td><input type="button" value="42"></td>
							<td><input type="button" value="46"></td>
						</tr>

						<tr>
							<td><input type="button" value="01"></td>
							<td><input type="button" value="05"></td>
							<td><input type="button" value="09"></td>
							<td><input type="button" value="13"></td>
							<td><input type="button" value="17"></td>
							<td><input type="button" value="23"></td>
							<td><input type="button" value="25"></td>
							<td><input type="button" value="29"></td>
							<td><input type="button" value="33"></td>
							<td><input type="button" value="37"></td>
							<td><input type="button" value="41"></td>
							<td><input type="button" value="45"></td>
						</tr>
					</table>

					<button type="submit">Cadastrar</button>
				</form>
			</div>
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
