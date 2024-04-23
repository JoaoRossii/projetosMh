<?php

if (isset($_POST['tipo'])) {

    $nomeCarro = $_POST['nomeCarro'];
    $modeloCarro = $_POST['modeloCarro'];
    $marcaCarro = $_POST['marcaCarro'];
    $anoCarro = $_POST['anoCarro'];
    $kmRodados = $_POST['kmRodados'];
    $status = $_POST['statusCarro'];
    $preço = $_POST['precoCarro'];
    $data_atualizar = date("Y-m-d H:i:s");
    require('conecta.php');
   
    $gravar = "UPDATE veiculo  set nome = '$nomeCarro', modelo = '$modeloCarro', marca = '$marcaCarro', ano = '$anoCarro',
     kmRodados = '$kmRodados', status = '$status', preco = '$preço', data_alteracao = '$data_atualizar' WHERE idVeiculo= '1'";
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