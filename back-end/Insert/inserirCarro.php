<?php

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

if (isset($_POST['nomeCarro'])) {

 $nomeCarro = $_POST['nomeCarro'];
 $modeloCarro = $_POST['modeloCarro'];
 $marcaCarro = $_POST['marcaCarro'];
 $anoCarro = $_POST['anoCarro'];
 $kmRodados = $_POST['kmRodados'];
 $status = $_POST['statusCarro'];
 $preço = $_POST['precoCarro'];
 require('conecta.php');

 $gravar = "INSERT INTO veiculo (nome, modelo, marca, ano, kmRodados, status, preco) VALUE ('$nomeCarro','$modeloCarro','$marcaCarro','$anoCarro','$kmRodados','$status','$preço') ";
 $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo 
        "<script> window.alert('Problemas ao Inserir.');
        window.location.href='inserirImovel.html'
        </script>";
    } else {
        echo 
        "<script> window.alert('Inserido com sucesso.');
        window.location.href='inserirImovel.html'
        </script>";
    }

}

?>