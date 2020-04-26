@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Usuários</h1>
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
				Adicionar Usuario
			</button>


			<!-- The Modal -->
			<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Adicionar Usuário</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<form action="{{ route('usuario.store')}}" method="post">
					@csrf
					<div class="modal-body">
							<div class="box-body">
								<div class="form-group">
								
									<label>Nome Completo</label>
									<input type="text" class="form-control" name="name" required>

								</div>

								<div class="form-group">
								
									<label>Email</label>
									<input type="email" class="form-control" name="email" required>

								</div>

								<div class="form-group">
								
									<label>Permissão</label>
                                    <select name="permission" class="form-control">
                                        <option value="ADM">Administrador</option>
                                        <option value="MOD">Moderador</option>
                                    </select>

								</div>

								<div class="form-group">
								
									<label>Senha</label>
									<input type="password" class="form-control" name="password" required>

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
                  <th>Email</th>
				  <th>Permissão</th>
				  <th>Ação</th>
                </tr>

		@foreach($users as $user)

					<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->permission }}</td>
					<td>
						<a href="{{ route('usuario.delete', [$user->id])}}"><i class="fas fa-trash"></i></a>
						<a href="{{ route('usuario.edit', [$user->id])}}"><i class="fas fa-edit"></i></a>
					</td>
					
					
		@endforeach

@stop