<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro</title>
</head>
<body>
<?php

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

if (isset($_POST['nome'])){
   if (empty($_POST["nome"])) {
        die("Nome é requerido");
    }
    
    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Insira um Email Valido");
    }
    if (strlen($_POST["senha"]) < 8) {
        die("Senha precisa ter 8 caracteres");
    }
    if ( ! preg_match("/[a-z]/i", $_POST["senha"])) {
        die("Senha precisa conter uma letra");
    }
    if ( ! preg_match("/[0-9]/", $_POST["senha"])) {
        die("Senha precisa conter no minimo um numero");
    }
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $endereço = $_POST['address'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $senha = $_POST['senha'];
    $cSenha = $_POST['cSenha'];
    require ('conecta.php');

    $password_hash = password_hash($_POST["senha"], PASSWORD_DEFAULT);
// consultar se login  ja existe 
$buscar = "select nome from cadastrousuario where nome = '" .$nome . "'";
$resultado = mysqli_query($conexao,$buscar);
while ($registro = mysqli_fetch_array($resultado))
{
    if ($nome==$registro['nome'])
    {
        echo "
        <script> window.alert('Login já Cadastrado!');
        window.location.href='cadastro.html';
        </script>";
        exit;
    }
}

    if ($senha == $cSenha) {
        $sql= "INSERT INTO cadastrousuario (nome, email, cpf, endereco, bairro, estado, password_hash)
        values('$nome','$email', '$cpf', '$endereço', '$bairro', '$estado', '$password_hash')";
        $gravar = mysqli_query($conexao,$sql);
        echo "<script> window.alert('Cadastrado com Sucesso !');
            window.location.href='login.html';
            </script>";
    }  else {
            echo "
            <script> window.alert('Senhas não coincidem, tente novamente');
            window.location.href='cadastro.html';
            </script>";
        }
} 

?>
    
    
</body>
</html>