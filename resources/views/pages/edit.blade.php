@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Editar viagem</h1>
@stop


@section('content')

            <?php
                $url = $_SERVER["REQUEST_URI"];
                $arr = explode("/", $url);
                $id = $arr[3];
            ?>

<!-- general form elements -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
               <p>Preencha todos os dados</p>
            </div>
            
            <form action="{{ route('viagem.update', [$id] )}}" method="post">
                    @csrf
              <div class="box-body">
                <div class="form-group">
                  
                    <label>Origem</label>
                    <input type="text" class="form-control" name="origem" required>

                </div>

                <div class="form-group">
                  
                        <label>Destino</label>
						<input class="form-control" name="destino" required>

                </div>

                <div class="form-group">
    
                         <label>Horário</label>
						<input type="text" class="form-control" name="horario" required>

                </div>

                <div class="form-group">
                <label>Data</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="date" class="form-control pull-right" id="datepicker" name="data" required>
                </div>
                
                </div>

                <div class="form-group">
    
                    <label>Placa</label>
                    <input type="text" class="form-control" name="placa" required>

                </div>

                <div class="form-group">
    
                    <label>Status</label>
                    <input type="text" class="form-control" name="status" required>

                </div>
        
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </form>
    </div>
          <!-- /.box -->
@stop