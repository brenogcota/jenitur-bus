@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Editar passageiro</h1>
@stop

<style>
  .input-radio {
    opacity: 0;
    display: none;
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
                $narr = explode("?", $id);
                $id = $narr[0];
                $di = $narr[1];

                $boards = App\Utils::returnBoards($id);
                $locate = App\Utils::returnVacancies($di);
                
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

          
            
            <form action="{{ route('passageiro.update', [$di] )}}" method="post" role="form">
                    @csrf
              <div class="box-body">
                <div class="form-group">
                  
                    <label>Nome Completo</label>
                    <input type="text" class="form-control" name="nome" required>

                </div>

                <div class="form-group">
                  
                        <label>CPF</label>
						<input class="form-control" name="cpf" required>

                </div>

                <div class="form-group">
    
                         <label>RG</label>
						<input type="text" class="form-control" name="rg" required>

                </div>

                <div class="form-group">
                <label>Data de Nascimento</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                  <input type="date" class="form-control pull-right" id="datepicker" name="datanasc" required>
                </div>
                
                </div>


                <div class="form-group">
                <label>Telefone</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                        <input type="text" class="form-control"  name="telefone1" required>
                    </div>
                </div>

                <div class="form-group">
                <label>Telefone reserva</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                        <input type="text" class="form-control"  name="telefone2" value="" required>
                    </div>
                </div>
 

                <div class="form-group">
                    <label class="container-check">Possui criança de colo?
                      <input id="roundtrip" name="roundtrip" type="checkbox" onclick="bloqueio()">
                      <span class="checkmark"></span>
                    </label> 
                </div>

				<div id="destinyDateHour" style="display: none">
					<label class="destiny">Informe os dados da criança</label>
					<div class="form-group">
                  
							<label>Nome Completo</label>
							<input type="text" class="form-control" name="nome_crianca">

					</div>

					<div class="form-group">
					
							<label>Documento</label>
							<input type="text" class="form-control" name="documento_crianca">

					</div>
					
					
				</div>

				
                <div class="form-group">
                <label id="poltrona">Poltrona atual: {{ $locate }}</label> 
                  <center>
                  <div class="draw-bus">
                    <span class="vol"></span>
                  </div>
                  <div class="input-group bus">
                        @for($i = 1; $i <= 46; $i++)
                                @if (in_array($i, $boards))
                                  <label class="board" for="{{ $i }}">{{ $i }}</label>
                                  <input onclick="getBoard({{ $i }})" name="poltrona" id="{{ $i}}" class="input-radio" type="radio" value="{{ $i }}"></input>
                          
                                @else 
                                  <label class="board red" disabled for="{{ $i }}">{{ $i }}</label>
                                  <input onclick="getBoard({{ $i }})" disabled name="poltrona" id="{{ $i }}" class="input-radio" type="radio" value="{{ $i }}"></input>
                                @endif
                        @endfor
                  </div>
                  </center>
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