<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório de passageiros</title>

    <style>
	#example1 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
	}

	#example1 td, #example1 th {
	border: 1px solid #ddd;
	padding: 8px;
	color: #777;
	}

	#example1 tr:nth-child(even){background-color: #f2f2f2;}

	#example1 tr:hover {background-color: #ddd;}

	#example1 th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #fff;
	color: #666;
	}
    </style>
    </head>
    <body>

	@php        
		$dia = date("d")-1;
		$mes = date("m");
		$data = $dia . '/' . $mes;

		$url = $_SERVER["REQUEST_URI"];
		$arr = explode("/", $url);
		$id = $arr[3];

		$tripData = App\Utils::returnTripData($id);     
	@endphp


    
	<center>
		<h2>Relatório de passageiros</h2>
	</center>
	<h3>Jenitur Turismo</h3>
	<strong>Data: </strong>{{ $data }}<br>
	<strong>n° viagem:</strong> {{ $tripData->id }}<br>
	<strong>Origem:</strong> {{ $tripData->ORIGEM }}<br>
	<strong>Destino:</strong> {{ $tripData->DESTINO }}
	<br> <br> <br>
    
	<div class="box-body">
                <table id="example1" class="table table-bordered">
                    <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Poltrona</th>
                    <th>Telefone</th>
                    <th>2° Telefone</th>
					<th>Criança</th>
                    <th>Nome</th>
                    <th>Documento</th>
					<th>Poltrona criança</th>
					<th>Funcionário</th>
                    </tr>

        @foreach($passenger as $p)

		
					<tr>
					<td>{{ $p->NOME }}</td>
					<td>{{ $p->CPF }}</td>
					<td>{{ $p->RG }}</td>
                    <td>{{ $p->POLTRONA }} </td>
					<td>{{ $p->TELEFONE1 }}</td>
                    <td>{{ $p->TELEFONE2 }}</td>
					<td>{{ $p->POSSCRIANCA }}</td>
					<td>{{ $p->NOMECRIANCA }} </td>
                    <td>{{ $p->DOCCRIANCA }} </td>
					<td>{{ $p->POLTRONA_ACOMPANHANTE }}</td>
					<td>{{ $p->USUARIO }}</td>
					</tr>
					
		@endforeach 
 
    </body>
</html>