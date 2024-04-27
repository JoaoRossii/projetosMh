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

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// Conexão com o banco de dados usando MySQLi
require_once('conecta.php');
include_once './conexao.php';

// Verifica se os dados do formulário foram enviados

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
    
    <div class="card-prosp-cont">

    <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<form action='alterarProposta.php' method='POST'>";
                echo "<input type='hidden' name='identificador' value='". $row["idAnuncio"] ."'>";
                echo "<div class='card'>";
                echo "<div class='who'> ";
                echo "<h4>" . $row["nome"] . "</h4> ";
                echo "</div> ";
                echo "<img src='993550.png' id='cookieSvg'> ";
                echo "<p class='cookieHeading'>" . $row["tituloAnuncio"] . "</p> ";
                echo "<p class='cookieDescription'>" . $row["descricaoAnuncio"] . "</p> ";
                echo "<div class='buttonContainer'> ";
                echo "<button type='submit' class='acceptButton'>Editar</button> ";
                echo "</div> ";
                echo "</div> ";
                echo "</form>";
            }
        } 
        ?>

    </div>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active"); // Alternar classe .active
        }
        // Adicione um ouvinte de evento para detectar quando a classe .side-bar é alterada
        document.addEventListener('DOMContentLoaded', function () {
            const sideBar = document.querySelector('.side-bar');

            // Verifica se a classe .active foi adicionada ou removida de .side-bar
            const observer = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    if (mutation.attributeName === 'class') {
                        const isSideBarActive = sideBar.classList.contains('active');
                        const menuCima = document.querySelector('.menu-cima');

                        // Adiciona ou remove a classe .active de .menu-cima conforme necessário
                        if (isSideBarActive) {
                            menuCima.classList.add('active');
                        } else {
                            menuCima.classList.remove('active');
                        }
                    }
                });
            });

            observer.observe(sideBar, { attributes: true });
        });

    </script>