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

if (isset($_POST['nomeV'])){
    if (empty($_POST["nomeV"])) {
        die("Nome é requerido");
    }
    
    if ( ! filter_var($_POST["emailV"], FILTER_VALIDATE_EMAIL)) {
        die("Insira um Email Valido");
    }
    if (strlen($_POST["senhaV"]) < 8) {
        die("Senha precisa ter 8 caracteres");
    }
    if ( ! preg_match("/[a-z]/i", $_POST["senhaV"])) {
        die("Senha precisa conter uma letra");
    }
    if ( ! preg_match("/[0-9]/", $_POST["senhaV"])) {
        die("Senha precisa conter no minimo um numero");
    }
    $nome = $_POST['nomeV'];  
    $email = $_POST['emailV'];
    $cpf = $_POST['cpfV'];
    $cnpj = $_POST['cnpj'];
    $endereço = $_POST['addressV'];
    $bairro = $_POST['bairroV'];
    $estado = $_POST['estadoV'];
    $senha = $_POST['senhaV'];
    $cSenha = $_POST['cSenhaV'];
    $termo = $_POST['termoV'];
    require ('conecta.php');

    $password_hash = password_hash($_POST["senhaV"], PASSWORD_DEFAULT);
// consultar se login  ja existe 
$buscar = "select nome from cadastrovendedor where nome = '" .$nome . "'";
$resultado = mysqli_query($conexao,$buscar);
while ($registro = mysqli_fetch_array($resultado))
{
    if ($nome==$registro['nome'])
    {
        echo "
        <script> window.alert('Login já Cadastrado!');
        window.location.href='cadastroVend.html';
        </script>";
        exit;
    }
}
    if ($termo = true) {
        if ($senha == $cSenha) {
            $sql= "INSERT INTO cadastrovendedor (nome, email, cpf, cnpj, endereco, bairro, estado, password_hash)
            values('$nome', '$email', '$cpf', '$cnpj', '$endereço', '$bairro', '$estado', '$password_hash')";
            $gravar = mysqli_query($conexao,$sql);
            echo "<script> window.alert('Cadastrado com Sucesso !');
                window.location.href='login.html';
                </script>";
        }  else {
                echo "
                <script> window.alert('Senhas não coincidem, tente novamente');
                window.location.href='cadastroVend.html';
                </script>";
            }
    } else {
        echo "
        <script> window.alert('Confirme os termos de uso.');
        window.location.href='cadastroVend.html';
        </script>";
    }
} 

?>
    
    
</body>
</html>