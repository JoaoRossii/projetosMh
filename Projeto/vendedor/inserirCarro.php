<?php 
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];

// Conexão com o banco de dados usando MySQLi
require_once('conecta.php');
include_once './conexao.php';

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
    
    if (isset($_FILES['imagens1'])) {
        // Obter nome do arquivo
        $nome_arquivo1 = $_FILES["imagens1"]["name"];
        $nome_arquivo2 = $_FILES["imagens2"]["name"];
        $nome_arquivo3 = $_FILES["imagens3"]["name"];
        $nome_arquivo4 = $_FILES["imagens4"]["name"];
        $nome_arquivo5 = $_FILES["imagens5"]["name"];
    
        // Diretório para armazenar as imagens
        $diretorio = "imagensCarro/$id/";
    
        // Criar o diretório se não existir
        if (!file_exists($diretorio)) {
            mkdir($diretorio, 0755, true);
        }
    
        // Mover os arquivos para o diretório
        move_uploaded_file($_FILES["imagens1"]["tmp_name"], $diretorio . $nome_arquivo1);
        move_uploaded_file($_FILES["imagens2"]["tmp_name"], $diretorio . $nome_arquivo2);
        move_uploaded_file($_FILES["imagens3"]["tmp_name"], $diretorio . $nome_arquivo3);
        move_uploaded_file($_FILES["imagens4"]["tmp_name"], $diretorio . $nome_arquivo4);
        move_uploaded_file($_FILES["imagens5"]["tmp_name"], $diretorio . $nome_arquivo5);
    
        // Exemplo de uso do nome do arquivo (você pode fazer o que quiser com ele)
    } else {
        echo "Erro: Não foram enviados todos os arquivos de imagem necessários.";
    }

    // Diretório para salvar as imagens

    // Agora que as imagens foram enviadas, você pode inserir os dados do carro no banco de dados
    $gravar = "INSERT INTO carro (nome, tipo, especificações, carroceria, combustivel, finalplaca, cor, troca, descricao, km, fkVendor, preco, marca, imagem1, imagem2, imagem3, imagem4, imagem5) 
        VALUE ('$nome', '$tipo', '$espec', '$carroc', '$comb', '$finpla', '$cor', '$troca', '$desc', '$km', $id, '$preco', '$marca', '$nome_arquivo1', '$nome_arquivo2', '$nome_arquivo3', '$nome_arquivo4', '$nome_arquivo5') ";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo "<script> window.alert('Problemas ao Inserir.'); window.location.href=''; </script>";
    } else {
        echo "<script> window.alert('Inserido com sucesso.'); window.location.href='vender.php'; </script>";
    }
}
?>
