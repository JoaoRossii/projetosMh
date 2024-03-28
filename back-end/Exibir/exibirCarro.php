<?php

require('conecta.php');

$sql = "SELECT * FROM veiculo";
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
    echo "<h1>" . $row["nome"] . "</h1>";
    echo "<h1>" . $row["marca"] . "</h1>";
    echo "<h1>" . $row["ano"] . "</h1>";
    echo "<h1>" . $row["kmRodados"] . "</h1>";
    echo "<h1>" . $row["status"] . "</h1>";
    echo "<h1>" . $row["preco"] . "</h1>";
    }
} else {
    echo "<span style='font-size: 20px; color: #fff;' position: relative; margin-top:10px; >Nenhum projeto econtrado.</span>";
    }
?>
</body>
</html>