<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro dos Times</title>
</head>
<style>
    .box{
        margin-left: auto;
        margin-right: auto;
        border: 4px solid black;
        width: 30%;
        border-radius: 1em;
        padding-bottom: 12px;
    }
</style>
<body>
    <center>
    <div class="box">
    <h1>Cadastre seu Time</h1>
    <form action="cadastro-conexao.php" method="POST">
        <p>
            <label for="time">Time: </label>
            <input type="text" name="time" size="20">
        </p>
        <p>
            <label for="treinador">Treinador: </label>
            <input type="text" name="treinador" size="20">
        </p>
        <p>
            <label for="atacante">Atacante: </label>
            <input type="text" name="atacante" size="20">
        </p>
        <p>
            <label for="goleiro">Goleiro: </label>
            <input type="text" name="goleiro" size="20">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
    Time já cadastrado? <a href="index.php">Voltar</a>
    </div>
</center>
</body>
</html>