<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="{{ route('viagem.store') }}" method="post">
    @csrf
    <div>
        <label for="origem">Origem:</label>
        <input type="text" name="origem" />
    </div>
    <div>
        <label for="destino">Destino:</label>
        <input type="text" name="destino" />
    </div>
    <div>
        <label for="Data">Data:</label>
        <textarea type="date" name="data"></textarea>
    </div>
    <div>
        <label for="placa">Placa:</label>
        <textarea type="text" name="placa"></textarea>
    </div>
    <div>
        <label for="horario">Horario:</label>
        <textarea type="time" name="horario"></textarea>
    </div>
    <button type="submit">Enviar</button>
</form>

</body>
</html>