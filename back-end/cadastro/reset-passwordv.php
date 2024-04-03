<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

$sql = "SELECT * FROM cadastrovendedor
        WHERE reset_token_hash = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token expirado");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Redefinir Senha</h1>

    <form method="post" action="process-reset-passwordv.php">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">Nova senha</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repita a senha</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">

        <button>Enviar</button>
    </form>

</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Projeto</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.html"><img src="logo.png"></a>
        </div>
        <div class="op">
            <li class="opi1">Comprar
                <div class="dropdown">
                    <div class="dropdown-content">
                        <a href="carros_novos.html">Carros novos</a>
                        <a href="#">Carros usados</a>
                        <a href="#">Comprar Imóveis</a>
                        <a href="#">Alugar Imóveis</a>
                    </div>
                </div>
            </li>
                <li>Vender</li>
                <li>Oficios</li>
                <li>Suporte</li>
        </div>
        <div class="ot">
            <i class='bx bx-moon night' ></i>
            <i class='bx bx-heart'></i>
            <i class='bx bx-user-circle'></i>
        </div>
    </div>
    <div class="centi">
        <form class="formL" action="cadastroVendedor.php" method="post">
            <p class="title">Redefirnir Senha</p>
            <p class="message">Inisira a nova senha! </p>
            <br>
            <label>
                <input required="" placeholder="" type="email" class="input">
                <span>Nova senha</span>
            </label>
                <br>
            <label>
                <input required="" placeholder="" type="password" class="input">
                <span>Confirmar nova senha</span>
            </label>
            <br><br>
            <button class="submitL">Submit</button>
        </div>  


</body>
</html> -->