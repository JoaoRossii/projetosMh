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