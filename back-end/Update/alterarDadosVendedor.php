<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];

if (isset($_POST['nome'])) {

    $email = $_POST['email'];
    $nome = $_POST['nome'];  
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $data = $_POST['data_nascimento'];
    
    require('conecta.php');
   
    $gravar = " UPDATE cadastrovendedor set nomeVend = '$nome', email = '$email',
     cpf = '$cpf', cnpj = '$cnpj', dtNasc = '$data'
     WHERE idVendor = '$id'";  
                                     
    $resultado = mysqli_query($conexao, $gravar);
       if ($resultado == false) {
           echo 
           "<script> window.alert('Problemas ao Alterar.');
           window.location.href='/projetosMh/Projeto/perfil.php'
           </script>";
       } else {
           echo 
           "<script> window.alert('Alterado com sucesso.');
           window.location.href='/projetosMh/Projeto/perfil.php'
           </script>";
       }
   
   }

?>