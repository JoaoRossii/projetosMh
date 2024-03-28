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
    $construcao = $_POST['construcaoImovel'];
    $data_atualizar = date("Y-m-d H:i:s");
    require('conecta.php');

    $gravar = "UPDATE imovel set tipo = '$tipoImovel', metrosQuadrados = '$metrosImovel', descricao = '$descImovel', sacada = '$sacadaImovel', 
    andares = '$andaresImovel', quintal = '$quintalImovel', preço = '$preçoImovel', varanda = '$varandaImovel', status = '$statusImovel', 
    numero_quartos = '$quartos', numero_banheiros = '$banheiroImovel', numero_garagem = '$garagemImovel', data_construcao = '$construcao', data_alteracao = '$data_atualizar'
    WHERE
    id = '1'";
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