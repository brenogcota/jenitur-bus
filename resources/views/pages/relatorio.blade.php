@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Relatório de viagens</h1>
@stop

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

@section('content')

	
			<a href="{{ route('relatorio-viagem.pdf') }}">Gerar Relatorio</i></a>
			<div class="box-body" style="overflow: auto;">
              <table id="example1" class="table table-bordered">
                <tr>
				  <th>#</th>
                  <th>Origem</th>
                  <th>Destino</th>
				  <th>Data</th>
				  <th>Placa</th>
				  <th>Horario</th>
				  <th>Motorista</th>
				  <th>Status</th>
                </tr>

		@foreach($trip as $t)

		
			
					<tr>
					<td><a href="{{ route('passageiro.show', [$t->id]) }}"><i class="fas fa-eye"></i></a></td>
					<td>{{ $t->ORIGEM }}</td>
					<td>{{ $t->DESTINO }}</td>
					<td>{{ $t->DATA }}</td>
					<td>{{ $t->PLACAVEICULO }}</td>
					<td>{{ $t->HORARIO }} </td>
					<td>{{ $t->MOTORISTA }}</td>
					@if ( $t->STATUS == 'Aberto')
						<td><span class="label label-success">{{ $t->STATUS }}</span></td>
					@else
						<td><span class="label label-danger">{{ $t->STATUS }}</span></td>
					@endif
					</tr>
					
		@endforeach

@stop