<?php

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

if (isset($_POST['tipo'])) {

    $tipo = $_POST['tipo'];
    $condominio = $_POST['cond'];
    $km = $_POST['tam'];
    $quartos = $_POST['quart'];
    $banheiro = $_POST['ban'];
    $vagas = $_POST['vagas'];
    $TPubli = $_POST['tpubli'];
    $mobilia = $_POST['mob'];
    $andar = $_POST['and'];
    $lograd = $_POST['lograd'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $city = $_POST['cidade'];
    $preco = $_POST['preco'];
    require('conecta.php');
    
    $gravar = "UPDATE imovel set tipo = '$tipo', condominio = '$condominio', tamanho = '$km', quartos = '$quartos', 
    banheiro = '$banheiro', vagas = '$vagas', trans_publi = '$TPubli', mobilia = '$mobilia', andar = '$andar', 
    endereçoImovel = '$lograd', bairroImovel = '$bairro', estadoImovel = '$estado', cepImovel = '$cep', cidadeImovel = '$city',
    preco = '$preco'
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

    $diretorio = "images/$usuario_id/";

    // Criar o diretório
    mkdir($diretorio, 0755);

    // Receber os arquivos do formulário
    $arquivo = $_FILES['imagens'];
    //var_dump($arquivo);

    // Ler o array de arquivos
    for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

        // Receber nome da imagem
        $nome_arquivo = $arquivo['name'][$cont];

        // Criar o endereço de destino das imagens
        $destino = $diretorio . $arquivo['name'][$cont];

        // Acessa o IF quando realizar o upload corretamente
        if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
            $query_imagem = "UPDATE INTO carro (nome_imagem VALUES (:nome_imagem) WHERE fk_vendedor LIKE = 1";
            $cad_imagem = $conn->prepare($query_imagem);
            $cad_imagem->bindParam(':nome_imagem', $nome_arquivo);

            if ($cad_imagem->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Imagem cadastrado com sucesso!</p>";
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
        }
    }
}

?>