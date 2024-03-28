<?php

if (isset($_POST['nomeV'])) {

    $nome = $_POST['nomeV'];  
    $email = $_POST['emailV'];
    $cpf = $_POST['cpfV'];
    $cnpj = $_POST['cnpj'];
    $endereço = $_POST['addressV'];
    $bairro = $_POST['bairroV'];
    $estado = $_POST['estadoV'];
    require('conecta.php');
   
    $gravar = "UPDATE cadastrovendedor set nome = '$nome', email = '$email',
     cpf = '$cpf', cnpj = '$cnpj', endereco = '$endereço', 
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