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

$sql = $sql = "SELECT * FROM anuncios join cadastrousuario on fkUsuario = id where id = $id"; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);
$resulte = $conn->query($sql);

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// Conexão com o banco de dados usando MySQLi
require_once('conecta.php');
include_once './conexao.php';

// Verifica se os dados do formulário foram enviados
if (isset($_POST['titulo'])) {

    // Recupera os dados do formulário
    $titulo = $_POST['titulo'];
    $txt = $_POST['textoAnuncio'];

    // Agora que as imagens foram enviadas, você pode inserir os dados do carro no banco de dados
    $gravar = "INSERT INTO anuncios (tituloAnuncio, descricaoAnuncio, fkUsuario) VALUES ('$titulo', '$txt', '$id')";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo "<script> window.alert('Problemas ao Inserir.'); window.location.href='form-prosp.php'; </script>";
    } else {
        echo "<script> window.alert('Inserido com sucesso.'); window.location.href='form-prosp.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Inserir Proposta</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.html" style="text-decoration: none; color: var(--font-color); font-size: 25px;">Logo</a>
        </div>
        <div class="op">
                <li class="opi1">Anuncios
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="prosp-tela.php">Meus anuncios</a>
                            <a href="form-prosp.php">Postar Anuncio</a>
                        </div>
                    </div>
                </li>
                <li class="opi1">Imoveis 
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="CompouAlu_imoveis.php">Ver Vitrine</a>
                        </div>
                    </div>
                </li>
                <li class="opi1">Veiculos 
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="carros_novos.php">Ver Vitrine</a>
                        </div>
                    </div>
                </li>
            </div>
        <div class="ot">
            <i class='bx bx-moon night'></i>
            <i class='bx bx-heart'></i>
            <li class="opi1" style="list-style: none;">
                <div class="dropdown"><i class='bx bx-user-circle'></i>
                    <div class="dropdown-content2">
                        <a href="perfil.html"><i class='bx bx-user'></i>Minha conta</a>
                        <a href="#"><i class='bx bx-log-out'></i>Sair</a>
                    </div>
                </div>
            </li>
        </div>
        <div class="ot2">
            <i class='bx bx-menu'></i>
        </div>
    </div>
    <div class="card-insert">
        <form action="form-prosp.php" method="post">
            <div class="cardinho-new">
                <h2>Insira sua Proposta</h2>
                <br>
                <br>
                <br>
                <label>Titulo da Proposta:</label>
                <input type="text" name="titulo" placeholder="Titulo do Anuncio" class="ipt_norm">
                <br>
                <br>
                <br>
                <label>Proposta:</label>
                <input type="text" name="textoAnuncio" placeholder="Descrição da Proposta" class="ipt_norm">
                <button type="submit">Adicionar</button>
        </div>
    </div>
</form>