<?php
session_start();

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
            $treinador = $conexao -> real_escape_string($_POST['treinador']);
            $atacante = $conexao -> real_escape_string($_POST['atacante']);
            $goleiro = $conexao -> real_escape_string($_POST['goleiro']);
}
           $verifica = "SELECT `nomeTime`FROM `times`  WHERE `nomeTime`='".$time."';";
           $verifica1 = "SELECT `treinador`FROM `times`  WHERE `treinador`='".$treinador."';";
           $verifica2 = "SELECT `atacante`FROM `times`  WHERE `atacante`='".$atacante."';";
           $verifica3 = "SELECT `goleiro`FROM `times`  WHERE `goleiro`='".$goleiro."';";
           $verificasql = $conexao->query($verifica);
           $verificasq1 = $conexao->query($verifica1);
           $verificasql2 = $conexao->query($verifica2);
           $verificasql3 = $conexao->query($verifica3);
           
           if ($verificasql->num_rows > 0 || $verificasql1->num_rows > 0 || $verificasql2->num_rows > 0 || $verificasql3->num_rows > 0) {
            echo "Esse time já está cadastrado.";
           }else{
           $sql = "INSERT INTO `esportes`.`times`(`nomeTime`, `treinador`, `atacante`, `goleiro`)
                    VALUES 
                        ('".$time."', '".$treinador."', '".$atacante."', '".$goleiro."');";

            $resultado = $conexao->query($sql);

            $conexao -> close();
            header('Location: index.php',  true, 301);
           }
?>
