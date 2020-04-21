@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Onibus</h1>
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

	
			
			<div class="box-body">
              <table id="example1" class="table table-bordered">
                <tr>
				  <th>#</th>
                  <th>Placa</th>
                  <th>Modelo</th>
				  <th>Apolice</th>
                  <th>Obeservação</th>
                  <th>Número</th>
                  <th>Poltronas</th>
                  <th>Ação</th>
                </tr>

		@foreach($bus as $b)

		
			
					<tr>
					<td><a href=""><i class="fas fa-plus"></i></a></td>
					<td>{{ $b->PLACA }}</td>
					<td>{{ $b->MODELO }}</td>
                    <td>{{ $b->APOLICE }}</td>
                    <td>{{ $b->OBSERVACAO }}</td>
                    <td>{{ $b->NUMERO }}</td>
                    <td>{{ $b->POLTRONAS }}</td>
					<td>
						<a href=""><i class="fas fa-trash"></i></a>
						<a href=""><i class="fas fa-edit"></i></a>
					</td>
					
					</tr>
					
		@endforeach

@stop