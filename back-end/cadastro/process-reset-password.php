<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

$sql = "SELECT * FROM cadastrousuario
        WHERE reset_token_hash = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token não encontrado");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token expirado");
}

if (strlen($_POST["password"]) < 8) {
    die("Senha precisa conter 8 caracteres");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Senha precisa conter no minimo uma letra");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("senha precisa conter no minimo um numero");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Senhas não coinsidem");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE cadastrousuario
        SET password_hash = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["id"]);

$stmt->execute();

echo "<script>alert('senha alterada, pode efetuar login')</script>";