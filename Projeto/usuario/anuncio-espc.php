<?php 

require_once('conecta.php');

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

$identificador = $_POST['identificador'];
$sql = "SELECT * FROM carro join cadastrovendedor on fkVendor = idVendor where idCarro = '$identificador'";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Vender Imoveis</title>
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
        </div><div class="main-esp">
            <div class="main-cont1">
                <div class="cont-carrou">
            <div class="carousel-container2">
                <div class="carousel2">
                    <img src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem1"]?>" alt="Imagem 1">
                    <img src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem2"]?>" alt="Imagem 2">
                    <img src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem3"]?>" alt="Imagem 3">
                    <img src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem4"]?>" alt="Imagem 4">
                    <img src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem5"]?>" alt="Imagem 5">
                </div>
                <button class="prev2" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next2" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>
            <!-- Miniaturas -->
            <div class="mino">
            <div class="thumbnails">
                <img class="thumbnail2" src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem1"]?>" onclick="currentSlide(1)" alt="Miniatura 1">
                <img class="thumbnail2" src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem2"]?>" onclick="currentSlide(2)" alt="Miniatura 2">
                <img class="thumbnail2" src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem3"]?>" onclick="currentSlide(3)" alt="Miniatura 3">
                <img class="thumbnail2" src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem4"]?>" onclick="currentSlide(4)" alt="Miniatura 4">
                <img class="thumbnail2" src="../vendedor/imagensCarro/<?php echo $row["fkVendor"]?>/<?php echo $row["imagem5"]?>" onclick="currentSlide(5)" alt="Miniatura 5">
            </div>
        </div>
    </div>
    <div class="main-desc-prod">
    <div class="prod-descrip">
        <div class="tt">
            <div class="titi">
                <h2>Titulo do Anuncio</h2>
            </div>
            <div class="love"><i class='bx bx-heart'></i>
            </div>
        </div>
        <div class="desc-prod">
            <div class="car-info">
                <div class="col1">
                    <label>Marca:</label>
                    <div class="anw-car"><?php echo $row["marca"] ?></div>
                    <label>Ano:</label>
                    <div class="anw-car"><?php echo $row["carroceria"] ?></div>
                </div>
                <div class="col1">
                    <label>Combustivel:</label>
                    <div class="anw-car"><?php echo $row["combustivel"] ?></div>
                    <label>Troca:</label>
                    <div class="anw-car"><?php echo $row["troca"] ?></div>
                </div>
                <div class="col1">
                    <label>Km:</label>
                    <div class="anw-car"><?php echo $row["preco"] ?></div>
                    <label>Cor:</label>
                    <div class="anw-car"><?php echo $row["cor"] ?></div>
                </div>
            </div>
          
        </div>
    </div>
    <div class="prec-car">
        <div class="precinho">
            <h2><?php echo $row["preco"] ?></h2>
        </div>
        <div class="contact">
            <label>Descrição</label>
            <div class="cont-desc-car">
                <p><?php echo $row["descricao"] ?></p>
            </div>
        </div>
    </div>
    </div>
    
        <script>
            let slideIndex = 1;
        
            function showSlide(index) {
                const slides = document.querySelectorAll('.carousel2 img');
                if (index > slides.length) {
                    slideIndex = 1;
                }
                if (index < 1) {
                    slideIndex = slides.length;
                }
                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.display = 'none';
                }
                slides[slideIndex - 1].style.display = 'block';
            }
        
            showSlide(slideIndex);
        
            function moveSlide(n) {
                showSlide(slideIndex += n);
            }
        
            function currentSlide(n) {
                showSlide(slideIndex = n);
            }
        </script>

<?php }} ?>