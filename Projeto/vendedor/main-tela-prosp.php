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
$telefone = $_SESSION['telefone'];
$data = $_SESSION['dtnasc'];
$cidade = $_SESSION['cidade'];
$cnpj = $_SESSION['cnpj'];

require_once('conecta.php');

$identificador = $_POST['identificador'];
$sql = "SELECT * FROM anuncios join cadastrousuario on fkUsuario = id where idAnuncio = $identificador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Chat</title>
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
                            <a href="#">Meus Anuncios</a>
                            <a href="prosp-tela.php">Todos Anuncios</a>
                        </div>
                    </div>
                </li>
                <li class="opi1"> Seu Carro
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="vender.php">Inserir Carro</a>
                            <a href="venderEdit.php">Editar Carro</a>
                        </div>
                    </div>
                </li>
                <li class="opi1"> Seu Imovel
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="vendeImo.php">Inserir Imovel</a>
                            <a href="imoveisEdit.php">Editar Imovel</a>
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
                        <a href="anuncios.html"><i class='bx bx-edit' ></i>Meus Anuncios</a>
                        <a href="perfil.html"><i class='bx bx-user'></i>Minha conta</a>
                        <a href="#"><i class='bx bx-dollar-circle'></i>Saldos</a>
                        <a href="#"><i class='bx bx-log-out'></i>Sair</a>
                    </div>
                </div>
            </li>
        </div>
        <div class="ot2">
            <i class='bx bx-menu'></i>
        </div>
    </div>
    <div class="props-main">
        <div class="card">
             <p class="cookieHeading"><?php echo $row["tituloAnuncio"]?></p>
             <p class="cookieDescription"><?php echo $row["descricaoAnuncio"]?></p>
             
           
           </div>
           <form action="../../pagamentoMercadoPago/" method="post">
           <div class="cardito-compr">
            <div class="show-prof">
                <h1>Adquira essa proposta</h1>
            </div>
            <div class="profinho">
                <i class='bx bx-user-circle'></i>
                <label><?php echo $row["nome"]?></label>
            </div>
            <div class="final-comp">
                <h1>R$ 50</h1>
                <button >Comprar agora</button>
            </form>
        </div>
           </div>
    </div>

    <?php }}?>