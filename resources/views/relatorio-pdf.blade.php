<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório de viagens</title>

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
    </head>
    <body>
    
	<center>
		<h2>Relatório de viagens</h2>
	</center>
    <div class="box-body">
              <table id="example1" class="table table-bordered">
                <tr>
                  <th>Origem</th>
                  <th>Destino</th>
				  <th>Data</th>
				  <th>Placa</th>
				  <th>Horario</th>
                </tr>

		@foreach($trip as $t)

		
			
					<tr>
					<td>{{ $t->ORIGEM }}</td>
					<td>{{ $t->DESTINO }}</td>
					<td>{{ $t->DATA }}</td>
					<td>{{ $t->PLACAVEICULO }}</td>
					<td>{{ $t->HORARIO }} </td>
					</tr>
					
		@endforeach
 
    </body>
</html>