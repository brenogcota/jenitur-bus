@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Passageiros</h1>
@stop

<style>
	#example1 {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
	overflow: scroll;
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

@section('content')

			@php
                $url = $_SERVER["REQUEST_URI"];
                $arr = explode("/", $url);
                $di = $arr[2];
                
            @endphp
				<a href="{{ route('relatorio-passageiros.pdf', [$di]) }}">Gerar Relatorio</i></a>
                <div class="box-body" style="overflow: auto;">
                <table id="example1" class="table table-bordered">
                    <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Poltrona</th>
                    <th>Telefone</th>
                    <th>Tel. Reserva</th>
					<th>Pos. criança</th>
                    <th>Nome Criança</th>
                    <th>Doc. Criança</th>
					<th>Usuar. Cad</th>
					<th>Ação</th>
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
					<td>{{ $p->USUARIO }}</td>
					<td>
						<a href="{{ route('passageiro.delete', [$p->id]) }}"><i class="fas fa-trash"></i></a>
						<a href="{{ route('passageiro.edit', [$di, $p->id]) }}"><i class="fas fa-edit"></i></a>
					</td>
					</tr>
					
		@endforeach 
@stop