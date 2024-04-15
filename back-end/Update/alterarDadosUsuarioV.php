<?php

if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $endereço = $_POST['address'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    require ('conecta.php');
   
    $gravar = "UPDATE cadastrousuario set nome = '$nome', email = '$email',
     cpf = '$cpf', endereco = '$endereço', 
     bairro = '$bairro', estado = '$estado'

     -- será subtituido pelo id da session
     WHERE idVeiculo= '1'"; 
    $resultado = mysqli_query($conexao, $gravar);
       if ($resultado == false) {
           echo 
           "<script> window.alert('Problemas ao Alterar.');
           window.location.href='alterarImovel.html'
           </script>";
       } else {
           echo 
           "<script> window.alert('Alterado com sucesso.');
           window.location.href='alterarImovel.html'
           </script>";
       }
   
   }

?>