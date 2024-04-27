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

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// Verifica se os dados do formulário foram enviados

if (isset($_POST['titulo'])) {

    // Recupera os dados do formulário
    
    $titulo = $_POST['titulo'];
    $txt = $_POST['textoAnuncio'];

    // Agora que as imagens foram enviadas, você pode inserir os dados do carro no banco de dados
    $gravar = "UPDATE anuncios set tituloAnuncio = '$titulo', descricaoAnuncio = '$txt', fkUsuario = '$id' ";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo "<script> window.alert('Problemas ao Alterar.'); window.location.href='prosp-tela.php'; </script>";
    } else {
        echo "<script> window.alert('Alterado com sucesso.'); window.location.href='prosp-tela.php'; </script>";
    }
}

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
        <form action="alterarProposta.php" method="post">
            <div class="cardinho-new">
                <h2>Alterar sua Proposta</h2>
                <br>
                <br>
                <br>
                <label>Titulo da Proposta:</label>
                <input type="text" name="titulo" value="<?php echo $row["tituloAnuncio"]?>" class="ipt_norm">
                <br>
                <br>
                <br>
                <label>Proposta:</label>
                <input type="text" name="textoAnuncio" value="<?php echo $row["descricaoAnuncio"]?>" class="ipt_norm">
                <button type="submit">Adicionar</button>
        </div>
    </div>
</form>

<?php }
                }                                                                   ?>