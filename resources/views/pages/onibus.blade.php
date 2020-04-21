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

			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
				Adicionar onibus
			</button>


			<!-- The Modal -->
			<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Adicionar Onibus</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form action="{{ route('onibus.store')}}" method="post">
					@csrf
					<div class="modal-body">
							<div class="box-body">
								<div class="form-group">
								
									<label>Placa</label>
									<input type="text" class="form-control" name="placa" required>

								</div>

								<div class="form-group">
								
									<label>Modelo</label>
									<input type="text" class="form-control" name="modelo" required>

								</div>

								<div class="form-group">
								
									<label>Apolice</label>
									<input type="text" class="form-control" name="apolice" required>

								</div>

								<div class="form-group">
								
									<label>Número</label>
									<input type="text" class="form-control" name="numero" required>

								</div>

								<div class="form-group">
								
									<label>Poltronas</label>
									<input type="text" class="form-control" name="poltronas" value="46" required>

								</div>

								<div class="form-group">
								
									<label>Observação</label>
									<input type="text" class="form-control" name="observacao">

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
                  <th>Placa</th>
                  <th>Modelo</th>
				  <th>Apolice</th>
                  <th>Número</th>
                  <th>Poltronas</th>
                  <th>Obeservação</th>
                </tr>

		@foreach($bus as $b)

		
			
					<tr>
					<td>{{ $b->PLACA }}</td>
					<td>{{ $b->MODELO }}</td>
                    <td>{{ $b->APOLICE }}</td>
                    <td>{{ $b->NUMERO }}</td>
                    <td>{{ $b->POLTRONAS }}</td>
                    <td>{{ $b->OBSERVACAO }}</td>
					
					</tr>
					
		@endforeach

@stop