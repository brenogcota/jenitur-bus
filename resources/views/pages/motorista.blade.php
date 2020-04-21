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

	
			<!-- Button to Open the Modal -->
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
				Adicionar motorista
			</button>


			<!-- The Modal -->
			<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Adicionar Motorista</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form action="{{ route('motorista.store')}}" method="post">
					@csrf
					<div class="modal-body">
							<div class="box-body">
								<div class="form-group">
								
									<label>Nome Completo</label>
									<input type="text" class="form-control" name="nome" required>

								</div>

								<div class="form-group">
								
									<label>Telefone</label>
									<input type="text" class="form-control" name="telefone" required>

								</div>

								<div class="form-group">
								
									<label>Whatsapp</label>
									<input type="text" class="form-control" name="whatsapp" required>

								</div>
							</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</form>

				</div>
			</div>
			</div>




			<div class="box-body" style="overflow: auto;">
              <table id="example1" class="table table-bordered">
                <tr>
                  <th>Nome</th>
                  <th>Telefone</th>
				  <th>Whatsapp</th>
                  <th>Ação</th>
                </tr>

		@foreach($driver as $d)

		
			
					<tr>
					<td>{{ $d->NOME }}</td>
					<td>{{ $d->TELEFONE }}</td>
					<td><a href="https://web.whatsapp.com/send?phone=55{{ $d->WHATSAPP }}&text=Oi" target="_blank">{{ $d->WHATSAPP }}</a></td>
					<td>
						<a href="{{ route('motorista.delete', [$d->id])}}"><i class="fas fa-trash"></i></a>
						<a href="{{ route('motorista.edit', [$d->id])}}"><i class="fas fa-edit"></i></a>
					</td>
					
					</tr>
					
		@endforeach

@stop