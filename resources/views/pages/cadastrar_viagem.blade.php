@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Cadastrar viagem</h1>
@stop


@section('content')

    @php
      $drivers = App\Utils::returnDrivers();
      $bus = App\Utils::returnBus();
    @endphp
    
    <!-- general form elements -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
               
            </div>
            
            <form action="" method="post" role="form">
                    @csrf
              <div class="box-body">
                <div class="form-group">
                  
                    <label>Origem</label>
                    <input type="text" placeholder="ex: Berilo/ MG" class="form-control" name="origem" required>

                </div>

                <div class="form-group">
                  
                        <label>Destino</label>
					            	<input class="form-control" name="destino" required>

                </div>


                <div class="form-group">
    
                         <label>Horário</label>
						            <input type="time" class="form-control" placeholder="06:00" name="horario" required>

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
                    <select name="placa" class="form-control" id="">
                      @foreach ($bus as $b)
                          <option required value="{{ $b->PLACA }}">{{ $b->PLACA }}</option>
                      @endforeach
                    </select>

                </div>

                <div class="form-group">
    
                    <label>Motorista</label>
                    <select name="motorista" class="form-control" id="">
                      @foreach ($drivers as $driver)
                          <option required value="{{ $driver->NOME }}">{{ $driver->NOME }}</option>
                      @endforeach
                    </select>


                </div>

                <div class="form-group">
                    
                    <label>2° Motorista</label>
                    <select name="motorista2" class="form-control" id="">
                      @foreach ($drivers as $driver)
                          <option required value="{{ $driver->NOME }}">{{ $driver->NOME }}</option>
                      @endforeach
                    </select>


                </div>



                <div class="form-group">
    
                    <label>Observação</label>
                    <input type="text-area" name="observacao" placeholder="Opcional" class="form-control">
                </div>
               
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->





          
       

@stop