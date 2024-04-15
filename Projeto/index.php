<?php 

$servername = "localhost";
$username = "root";
$password = "Sk8long2077#";
$dbname = "getninjas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT nome, tipo, email, especificações, preco, km, carroceria FROM projetos join cadastrovendedor on fkVendor = idVendor where id = 1"; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);
$resulte = $conn->query($sql);

session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// while ($dados = mysqli_fetch_array($resultado)) {
//     $_SESSION['nome'] = $dados['nm_projeto'];
// 	$_SESSION['senha'] = $dados['senha'];
// 	$_SESSION['email'] = $dados['email'];
//     $_SESSION['perfil'] = $dados['perfil'];
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Projeto</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php" style="text-decoration: none; color: #000; font-size: 25px;">Logo</a>
        </div>
        <div class="op">
            <li class="opi1">Comprar
                <div class="dropdown">
                    <div class="dropdown-content">
                        <a href="carros_novos.html">Carros novos</a>
                        <a href="#">Carros usados</a>
                        <a href="CompouAlu_imoveis.html">Comprar Imóveis</a>
                        <a href="#">Alugar Imóveis</a>
                    </div>
                </div>
            </li>
                <li>Vender</li>
                <li>Oficios</li>
                <li>Suporte</li>
        </div>
        <div class="ot">
            <i class='bx bx-moon night' ></i>
            <i class='bx bx-heart'></i>
            <i class='bx bx-user-circle'></i>
        </div>
    </div>
    <section class="primeira">
        <div class="carousel">
            <button class="carousel-btn prev" onclick="prevSlide()">&#10094;</button>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x300" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x300" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x300" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-btn next" onclick="nextSlide()">&#10095;</button>
        </div>
    <div class="filtro1">
        <div class="op2">
            <li>Carros</li>
            <li>Imóveis</li>
        </div>
        <div class="bar">
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Digite um lugar" class="ipt1">
            <button>Buscar</button>
        </div>
    </div>
</section>
<br><br><br><br>
<div class="oq">
    <h1>Principais Serviços</h1>
            <div class="card">
                <h2>Card 1</h2>
                <p>Descrição do Card 1.</p>
            </div>
            <div class="card">
                <h2>Card 2</h2>
                <p>Descrição do Card 2.</p>
            </div>
            <div class="card">
                <h2>Card 3</h2>
                <p>Descrição do Card 3.</p>
            </div>
            <div class="card">
                <h2>Card 4</h2>
                <p>Descrição do Card 4.</p>
            </div>
            <div class="card">
                <h2>Card 5</h2>
                <p>Descrição do Card 5.</p>
            </div>
        </div>
        <section class="s2">
        <div class="oq2">
        </div>
    </section>
</body>
</html>
<script src="main.js"></script>

