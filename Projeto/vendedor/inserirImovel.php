<?php


$servername = "localhost";
$username = "root";
$password = "Sk8long2077#";
$dbname = "getninjas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];
include_once './conexao.php';
require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);


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

    if (isset($_FILES['imagens1'])) {
        // Obter nome do arquivo
        $nome_arquivo1 = $_FILES["imagens1"]["name"];
        $nome_arquivo2 = $_FILES["imagens2"]["name"];
        $nome_arquivo3 = $_FILES["imagens3"]["name"];
        $nome_arquivo4 = $_FILES["imagens4"]["name"];
        $nome_arquivo5 = $_FILES["imagens5"]["name"];
    
        // Diretório para armazenar as imagens
        $diretorio = "imagensImovel/$id/";
    
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
    
    $gravar = "INSERT INTO imovel (tipo, condominio, tamanho, quartos, banheiros, vagas, trans_publi, mobilia, andar, fkVendor, endereçoImovel, bairroImovel, estadoImovel, cepImovel, cidadeImovel, preco, imagem1, imagem2, imagem3, imagem4, imagem5)
    VALUE 
    ('$tipo','$condominio','$km','$quartos','$banheiro','$vagas','$TPubli','$mobilia','$andar', '$id','$lograd','$bairro','$estado','$cep','$city','$preco', '$nome_arquivo1', '$nome_arquivo2', '$nome_arquivo3', '$nome_arquivo4', '$nome_arquivo5')";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo 
        "<script> window.alert('Problemas ao Inserir.');
        window.location.href='vendeImo.php'
        </script>";
    } else {
        echo 
        "<script> window.alert('Inserido com sucesso.');
        window.location.href='vendeImo.php'
        </script>";
    }
}

?>