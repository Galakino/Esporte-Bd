<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Verificar Time</title>
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
    <h1>Verifique seu Time</h1>
    <form action="index.php" method="POST">
        <p>
            <label for="time">Time</label>
            <input type="text" name="time" size="20">
        </p>
        <p>
            <button type="submit">Verificar</button>
        </p>
    Time não está cadastrado? <a href="cadastro.php">Cadastrar</a>
    </form>
    </div>
</center>

<?php
    if(isset($_POST['time'])){
    $host = "127.0.0.1";
    $bd = "esportes";
    $usuario = "root";
    $senha = "root";

    $conexao = new mysqli($host, $usuario, $senha, $bd);

    if ($conexao -> connect_errno) {
        echo "Falha ao conectar: (" . $conexao -> connect_errno . ") " . $conexao -> connect_error;
        exit();
    } else {
        // Evita caracteres especiais (SQL Inject)
        $time = $conexao -> real_escape_string($_POST['time']);

        $sql = "SELECT * FROM `esportes`.`times`
                WHERE `nomeTime`='".$time."';";

        $resultado = $conexao->query($sql);

        while($row = mysqli_fetch_array($resultado)){

            echo "<br>";
            echo "<center>";
            echo "ID: ".$row[0];
            echo "<br>";
            echo "Time: ".$row[1];
            echo "<br>";
            echo "Treinador: ".$row[2];
            echo "<br>"; 
            echo "Atacante: ".$row[3];
            echo "<br>";
            echo "Goleiro: ".$row[4];
            echo "</center>";
        }
        
        $conexao -> close();
        }
    }
?>
</body>
</html>

