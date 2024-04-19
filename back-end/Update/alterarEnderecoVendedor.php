<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];
$telefone = $_SESSION['telefone'];
$cidade = $_SESSION['cidade'];


if (isset($_POST['cep'])) {
 
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];
    require('conecta.php');
   
    $gravar = " UPDATE cadastrovendedor set endereco = '$rua', estado = '$estado', telefone = '$telefone', cidade = '$cidade', cep = '$cep'
       
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