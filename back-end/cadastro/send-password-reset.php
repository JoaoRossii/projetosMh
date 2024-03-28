<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

$sql = "UPDATE cadastrousuario
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($conexao->affected_rows) {

    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Redefinir de Senha";
    $mail->Body = <<<END

    Clique <a href="http://localhost/projetomh/cadastro/reset-password.php?token=$token">aqui</a> 
    para redefinir sua senha.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Mensagem não pode ser enviada. Erro do Mailer: {$mail->ErrorInfo}";

    }

}

echo "<script> window.alert('Mensagem enviada, verifique sua caixa de entrada.');
    window.close;
    </script>";
