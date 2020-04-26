@extends('adminlte::page')

@section('title', 'Jenitur')

@section('content_header')
    <h1>Editar usuário</h1>
@stop


@section('content')

                
    <!-- general form elements -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>

          
            
            <form action="{{ route('usuario.update', [$user->id] )}}" method="post" role="form">
                    @csrf
              <div class="box-body">
               
                <div class="form-group">
                  
                        <label>Nome</label>
						<input class="form-control" value="{{ $user->name }}" name="nome" required>

                </div>

                <div class="form-group">
    
                         <label>Email</label>
						 <input type="text" value="{{ $user->email }}" class="form-control" name="email" required>

                </div>

                <div class="form-group">
    
                         <label>Permissão</label>
                         <select  class="form-control" name="permissao" id="">
                            <option value="ADM">Administrador</option>
                            <option value="MOD">Moderador</option>
                         </select>
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