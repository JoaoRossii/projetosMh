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



$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// while ($dados = mysqli_fetch_array($resultado)) {
//     $_SESSION['nome'] = $dados['nm_projeto'];
// 	$_SESSION['senha'] = $dados['senha'];
// 	$_SESSION['email'] = $dados['email'];
//     $_SESSION['perfil'] = $dados['perfil'];
// }

$selectCarro = "SELECT * FROM veiculo";

if (!empty($_POST)) {
    $selectCarro .= " WHERE (1=1)";
    if (isset($_POST["marca"])){
        $marca = $_POST["marca"];
        $selectCarro .= "AND marca = '$marca'";
    }

    if (isset($_POST["MaxPreco"])){
        $precoMax = $_POST["MaxPreco"];
        $selectCarro .= "AND marca = '$precoMax'";
    }

    if($_POST["pesq"]!=""){
        $pesq = $_POST["pesq"];
        $selectCarro .= "AND nome like '%$nome%'";
    }
    
}
$selectCarro .= "ORDER BY nome";

$sql = "SELECT tipo, condominio, quartos, preco, quartos, banheiros, tamanho, vagas, cidadeImovel, estadoImovel FROM imovel join cadastrovendedor on fkVendor = idVendor where id = 1"; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);
$resulte = $conn->query($sql);
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
            <a href="index.php" style="text-decoration: none; color: var(--font-color); font-size: 25px;">Logo</a>
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
            <li class="opi1">Vender
                <div class="dropdown">
                    <div class="dropdown-content">
                        <a href="carros_novos.html">Vender Carros</a>
                        <a href="#">Vender Imovel</a>
                        <a href="CompouAlu_imoveis.html">Alugue seu imóvel</a>
                    </div>
                </div>
            </li>
            <li>Oficios</li>
            <li>Suporte</li>
        </div>
        <div class="ot">
            <i class='bx bx-moon night'></i>
            <i class='bx bx-heart'></i>
            <li class="opi1" style="list-style: none;">
                <div class="dropdown"><i class='bx bx-user-circle'></i>
                    <div class="dropdown-content2">
                        <a href="anuncios.html"><i class='bx bx-edit' ></i>Meus Anuncios</a>
                        <a href="perfil.php"><i class='bx bx-user'></i>Minha conta</a>
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
    <div class="side-bar" id="sidebar">
        <div class="content-side">
        <div class="op3">
            <div class="tipi">
                <span>Carros</span>
                <span>Motos</span>
            </div>
            <div class="restu">
             <span>Localização</span>
             <form action="resultadoImovelLocal.php">
             <input type="text" placeholder="Digite onde..."><i class='bx bx-map'></i>
             </form>
            </div>
        </div>
        <div class="clean">
            <button>Limpar</button>
        </div>
    </div>
    </div>
    <div class="menu-cima">
        <div class="j1">
        <i class='bx bx-slider-alt' onclick="toggleSidebar()"></i>
    </div>
    <div class="j3">
        <form action="resultadoImovel.php" method="post">
            <input type="text" id="" placeholder="Pesquise aqui.." name="nome">
            <select class="slc1" name="preco_option">
                <option value="MaxPreco">Maior preço</option>
                <option value="MinPreco">Menor preço</option>
            </select>
        </form>
    </div>
    </div>
    <div class="centri">
    <div class="content-shop">
    <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo "<div class='card-container'>";
    echo "<div class='cardC'>";
    echo "<div class='photo'><img src='uno.png' alt='Imagem 1'></div>";  
    echo "<div class='photo'><img
    src='https://www.karvi.com.br/_next/image/?url=https%3A%2F%2Fdjdnloyvqzzd3.cloudfront.net%2Fstatic%2Fgallery%2Fbr%2Fdesktop%2Ffiat_uno_2021_plano_detalle_tablero.jpg&w=1440&q=90'
    alt='Imagem 1'></div>";
    echo "<div class='photo'><img
    src='https://s2-autoesporte.glbimg.com/7QsD8eYB517mrkj2HIhARSHntcM=/0x0:707x402/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/B/7/NTyPQHSkSxa78crlBzZg/img-design-externo.png'
    alt='Imagem 1'></div>";
    echo "</div>";
    echo "<div class='descrip'>";
    echo "<h2>" . $row["tipo"] . " em " . $row["cidadeImovel"] . "</h2>";
    echo "<span class='esp'>" . $row["quartos"] ." quartos , ". $row["banheiros"] .  " banheiros</span>";
    echo "<div class='prec-ano'>";
    echo "<h3>" . $row["preco"] . "</h3>";
    echo "<span>" . $row["vagas"] . " vagas</span>";
    echo "</div>";
    echo "<div class='km-loc'>";
    echo "<span class='kaemi'>" . $row["tamanho"] . "Km² </span>";
    echo "<div class='loqui'>";
    echo "<i class='bx bx-map'></i>";
    echo "<span class='loc'>" . $row["estadoImovel"] . "</span>";
    echo "</div>";
    echo "</div>";
    echo "<div class='buttu-gostei'>";
    echo "<div class='primi'></div>";
    echo "<button>Ver mais</button>";
    echo "<div class='goxtei'><i class='bx bx-heart'></i></div>";
    echo "</div>";
    echo "</div>";
    echo "<div class='prev'>&#10094;</div>";
    echo "<div class='next'>&#10095;</div>";
    echo "</div>";
    }
} else {
    echo "Nenhum Carro econtrado.";
    }
?>
          
    </div>
</div>
</body>
</html>
<script>
 function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active"); // Alternar classe .active
        }
        // Adicione um ouvinte de evento para detectar quando a classe .side-bar é alterada
document.addEventListener('DOMContentLoaded', function() {
    const sideBar = document.querySelector('.side-bar');

    // Verifica se a classe .active foi adicionada ou removida de .side-bar
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
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
<script>
const card = document.querySelector('.cardC');
const photos = document.querySelectorAll('.photo');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
let counter = 0;

function showPhoto() {
  // Calcula o deslocamento da transição multiplicando a largura da foto pelo contador
  const offset = -counter * photos[0].offsetWidth;
  // Aplica o deslocamento ao estilo de transformação do cartão
  card.style.transform = `translateX(${offset}px)`;
}

nextBtn.addEventListener('click', () => {
  counter++;
  // Verifica se o contador ultrapassa o número de fotos disponíveis
  if (counter > 2) {
    counter = 0; // Retorna ao início
  }
  showPhoto();
});

prevBtn.addEventListener('click', () => {
  counter--;
  // Verifica se o contador é menor que zero (para retroceder do início ao final)
  if (counter < 0) {
    counter = 0; // Define o contador para a última foto
  }
  showPhoto();
});
  </script>
<script src="main.js"></script>