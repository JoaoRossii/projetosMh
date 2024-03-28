<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="filtro">
        <b>Filtrar Carros por:</b> <br>
        <form action="filtro.php" method="post">
            Carro:
            <input type="radio" name="ano" value="2018">
            <input type="radio" name="marca" value="Chevrolet">
            <input type="text" name="nome" placeholder="insira o nome do carro">
            <button>Filtrar</button>
        </form>
    </div>
</body>
</html>

<?php

include "conecta.php";

$selectCarro = "SELECT * FROM veiculo";

if (!empty($_POST)) {
    $selectCarro .= " WHERE (1=1)";
    if (isset($_POST["ano"])){
        $ano = $_POST["ano"];
        $selectCarro .= "AND ano = '$ano'";
    }

    if (isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $selectCarro .= "AND marca = '$marca'";
    }

    if($_POST["nome"]!=""){
        $nome = $_POST["nome"];
        $selectCarro .= "AND nome like '%$nome%' ";
    }
    
}
$selectCarro .= "ORDER BY nome";

$resultado = mysqli_query($conexao,$selectCarro)
    or die(mysqli_error($conexao));

    while ($row = mysqli_fetch_assoc($resultado)){
        echo "<h1>" . $row["nome"] . "</h1>";
        echo "<h1>" . $row["marca"] . "</h1>";
        echo "<h1>" . $row["ano"] . "</h1>";
        echo "<h1>" . $row["kmRodados"] . "</h1>";
        echo "<h1>" . $row["status"] . "</h1>";
        echo "<h1>" . $row["preco"] . "</h1>";
    }

?>