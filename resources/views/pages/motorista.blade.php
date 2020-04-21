@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Motoristas</h1>
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
                  <th>Nome</th>
                  <th>Telefone</th>
				  <th>Whatsapp</th>
                  <th>Ação</th>
                </tr>

		@foreach($driver as $d)

		
			
					<tr>
					<td><a href=""><i class="fas fa-plus"></i></a></td>
					<td>{{ $d->NOME }}</td>
					<td>{{ $d->TELEFONE }}</td>
					<td><a href="https://web.whatsapp.com/send?phone=55{{ $d->WHATSAPP }}&text=Oi">{{ $d->WHATSAPP }}</a></td>
					<td>
						<a href=""><i class="fas fa-trash"></i></a>
						<a href=""><i class="fas fa-edit"></i></a>
					</td>
					
					</tr>
					
		@endforeach

@stop