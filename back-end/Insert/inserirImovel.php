<?php

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

if (isset($_POST['tipoImovel'])) {

    $tipoImovel = $_POST['tipoImovel'];
    $metrosImovel = $_POST['metrosImovel'];
    $quartos = $_POST['quantQuartos'];
    $garagemImovel = $_POST['garagemImovel'];
    $banheiroImovel = $_POST['banheiroImovel'];
    $descImovel = $_POST['descImovel'];
    $sacadaImovel = $_POST['sacadaImovel'];
    $andaresImovel = $_POST['andaresImovel'];
    $quintalImovel = $_POST['quintalImovel'];
    $statusImovel = $_POST['statusImovel'];
    $preçoImovel = $_POST['preçoImovel'];
    $varandaImovel = $_POST['varandaImovel'];
    $construcao = $_POST['construcaiImovel'];
    require('conecta.php');

    $gravar = "INSERT INTO imovel (tipo, metrosQuadrados, descricao, sacada, andares, quintal, preço, varanda, status, numero_quartos, numero_banheiros, numero_garagem, data_construcao)
    VALUE 
    ('$tipoImovel','$metrosImovel','$descImovel','$sacadaImovel','$andaresImovel','$quintalImovel','$preçoImovel','$varandaImovel','$statusImovel','$quartos','$banheiroImovel','$garagemImovel', '$contrucao' ) ";
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