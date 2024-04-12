<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM cadastrousuario
        WHERE reset_token_hash = ?";

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}        

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Resetar Senha</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.html"><img src="logo.png"></a>
        </div>
        <div class="op">
            <li class="opi1">
                <div class="dropdown">
                    <div class="dropdown-content">
                    </div>
                </div>
            </li>
        </div>
        <div class="ot">
        </div>
    </div>

    <div class="centi">
        <form class="formLc" action="process-reset-password.php" method="post">
            <p class="title">Redefinir Senha</p>
            <p class="message">Uma solicitação chegará em seu e-mail! </p>
            <br>
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <label>
                <input required="" type="password" id="password" name="password" class="input">
                <span>Nova senha</span>
            </label>
            <label>
                <input required="" type="password" id="password_confirmation"name="password_confirmation" class="input">
                <span>Repita a senha</span>
            </label>
            <br><br>
            <button class="submitL" style=" margin-bottom: 10px;">Enviar</button>
        </form>
    </div>

</body>
</html>