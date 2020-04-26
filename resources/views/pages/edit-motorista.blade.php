@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Editar motorista</h1>
@stop

<style>
  .input-radio {
    opacity: 0;
  }

  .board {
    text-align: center;
    width: 30px;
    background: #00ff00;
    color: #fff;
    border-radius: 40%;
    font-size: 20px;

    border-top: 5px solid #e3e3e3;
    border-bottom: 5px solid #00ff;
  }

  .board:hover {
    cursor: pointer;
    background: #7fff7f;
  }

  .bus {
    max-width: 200px;
  }

  .draw-bus {
    width: 200px;
    height: 60px;
    border-radius: 30px;

    border-top: 7px solid #999;
  }

  .vol {
    margin-top: 5px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    position: absolute;
    left: 35%;
    border: 4px solid #999; 
  }

  .red {
    background: #f30e !important;
  }

  .red:hover {
    background: #ff5b5b !important;
    cursor: not-allowed;
  }
</style>


@section('content')

            @php
                $url = $_SERVER["REQUEST_URI"];
                $arr = explode("/", $url);
                $id = $arr[3];

                $driverData = App\Utils::returnDriverData($id);                
                
            @endphp
                
    <!-- general form elements -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              Preencha todos os dados
            </div>

          
            
            <form action="{{ route('motorista.update', [$id] )}}" method="post" role="form">
                    @csrf
              <div class="box-body">
                <div class="form-group">
                  
                    <label>Nome Completo</label>
                    <input type="text" value="{{ $driverData->NOME }}" class="form-control" name="nome" required>

                </div>

                <div class="form-group">
                  
                        <label>Telefone</label>
						            <input class="form-control" value="{{ $driverData->TELEFONE }}" name="telefone" required>

                </div>

                <div class="form-group">
    
                         <label>Whatsapp</label>
						             <input type="text" value="{{ $driverData->WHATSAPP }}" class="form-control" name="whatsapp" required>

                </div>

                <div class="form-group">
    
                         <label>RG</label>
						             <input type="text" value="{{ $driverData->RG }}" class="form-control" name="rg" required>

                </div>

                <div class="form-group">
    
                         <label>CPF</label>
						             <input type="text" value="{{ $driverData->CPF }}" class="form-control" name="cpf" required>

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

<script type="text/javascript">

  function getBoard(value) {
    document.getElementById("poltrona").innerHTML = "Poltrona: " + value;
  }
	function bloqueio() {
        	if (document.getElementById("destinyDateHour").style.display == "block"){
                 document.getElementById("destinyDateHour").style.display = "none";
            } else {
                document.getElementById("destinyDateHour").style.display = "block";	  	  
              }  
              
    }


    
</script>