<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <?php 
    $id = 6; 
   ?>
	<form action="{{ route('passageiro.store', [$id]) }}" method="post">
    @csrf
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" />
    </div>
    <div>
        <label for="cpf">CPF:</label>
        <input type="number" name="cpf" />
    </div>
    <div>
        <label for="rg">R.G.:</label>
        <textarea type="text" name="rg"></textarea>
    </div>
    <div>
        <label for="datanasc">Data de Nascimento:</label>
        <textarea type="date" name="datanasc"></textarea>
    </div>
    <div>
        <label for="ddd1">DDD:</label>
        <textarea type="number" name="ddd1"></textarea>
    </div>
    <div>
        <label for="telefone1">Telefone:</label>
        <textarea type="number" name="telefone1"></textarea>
    </div>
    <div>
        <label for="ddd2">DDD Secundário:</label>
        <input type="number" name="ddd2" />
    </div>
    <div>
        <label for="telefone2">Telefone Secundário:</label>
        <input type="number" name="telefone2" />
    </div>
    <div>
        <label for="nomecrianca">Nome da Criança de Colo:</label>
        <textarea type="text" name="nomecrianca"></textarea>
    </div>
    <div>
        <label for="cpfcrianca">CPF da criança de colo:</label>
        <textarea type="number" name="cpfcrianca"></textarea>
    </div>
    <div>
        <label for="rgcrianca">R.G. da criança de colo:</label>
        <textarea type="text" name="rgcrianca"></textarea>
    </div>
    <button type="submit">Cadastrar</button>
</form>

</body>
</html>