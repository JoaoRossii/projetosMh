<?php

require('conecta.php');

$sql = "SELECT * FROM imovel";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo "<h1>" . $row["tipo"] . "</h1>";
    echo "<h1>" . $row["metrosQuadrados"] . "</h1>";
    echo "<h1>" . $row["descricao"] . "</h1>";
    echo "<h1>" . $row["sacada"] . "</h1>";
    echo "<h1>" . $row["andares"] . "</h1>";
    echo "<h1>" . $row["quintal"] . "</h1>";
    echo "<h1>" . $row["preço"] . "</h1>";
    echo "<h1>" . $row["varanda"] . "</h1>";
    echo "<h1>" . $row["status"] . "</h1>";
    echo "<h1>" . $row["numero_quartos"] . "</h1>";
    echo "<h1>" . $row["numero_banheiros"] . "</h1>";
    echo "<h1>" . $row["numero_garagem"] . "</h1>";
    echo "<h1>" . $row["data_construcao"] . "</h1>";
    }
} else {
    echo "<span style='font-size: 20px; color: #fff;' position: relative; margin-top:10px; >Nenhum dado encontrado.</span>";
    }
?>
</body>
</html>