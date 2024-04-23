<?php 
session_start();

// Conexão com o banco de dados usando MySQLi
require_once('conecta.php');

// Verifica se os dados do formulário foram enviados
if (isset($_POST['nomeCarro'])) {

    // Recupera os dados do formulário
    $marca = $_POST['marca'];
    $nome = $_POST['nomeCarro'];
    $tipo = $_POST['tipo'];
    $cor = $_POST['cor'];
    $carroc = $_POST['carroc'];
    $comb = $_POST['combu'];
    $finpla = $_POST['finpla'];
    $troca = $_POST['troc'];
    $km = $_POST['km'];
    $preco = $_POST['preco'];
    $espec = $_POST['espec'];
    $desc = $_POST['descr'];

    // Diretório para salvar as imagens
    $diretorio = "images/$id/";

    // Criar o diretório se ele não existir
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0755, true);
    }

    // Receber os arquivos do formulário
    $arquivos = $_FILES['imagens'];

    // Iterar sobre os arquivos e movê-los para o diretório
    foreach ($arquivos['tmp_name'] as $key => $tmp_name) {
        $nome_arquivo = $arquivos['name'][$key];
        $destino = $diretorio . $nome_arquivo;
        if (move_uploaded_file($tmp_name, $destino)) {
            // Inserir o nome do arquivo na tabela 'imagemcarro'
            $query_imagem = "INSERT INTO imagemcarro (nome_imagem, fkVendor) VALUES ('$nome_arquivo', $id)";
            $resultado_imagem = mysqli_query($conexao, $query_imagem);
            if ($resultado_imagem) {
                $_SESSION['msg'] = "<p style='color: green;'>Imagem cadastrada com sucesso!</p>";
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
        }
    }

    // Agora que as imagens foram enviadas, você pode inserir os dados do carro no banco de dados
    $gravar = "INSERT INTO carro (nome, tipo, especificações, carroceria, combustivel, finalplaca, cor, troca, descricao, km, fkVendor, preco, marca) 
        VALUE ('$nome', '$tipo', '$espec', '$carroc', '$comb', '$finpla', '$cor', '$troca', '$desc', '$km', $id, '$preco', '$marca' ) ";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo "<script> window.alert('Problemas ao Inserir.'); window.location.href=''; </script>";
    } else {
        echo "<script> window.alert('Inserido com sucesso.'); window.location.href=''; </script>";
    }
}
?>
