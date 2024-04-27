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
    $idImovel = $_POST['idImovel'];
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

    $gravar = "UPDATE imovel SET tipo = '$tipo', condominio = '$condominio', tamanho = '$km', quartos = '$quartos', banheiros = '$banheiro', vagas = '$vagas', trans_publi = '$TPubli', mobilia = '$mobilia', andar = '$andar',
    endereçoImovel = '$lograd', bairroImovel = '$bairro', estadoImovel = '$estado', cepImovel = '$cep', cidadeImovel = '$city', preco = '$preco', 
    imagem1 = '$nome_arquivo1', imagem2 = '$nome_arquivo2', imagem3 = '$nome_arquivo3', imagem4 = '$nome_arquivo4', imagem5 = '$nome_arquivo5' WHERE id = '$idImovel'";
    
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

$identificador = $_POST["identificador"];
$sql = "SELECT * FROM imovel where id ='$identificador'"; /* query utilizada para buscar dados no banco para exibir em um card */
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
    <title>Vender Imoveis</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="indexV.php" style="text-decoration: none; color: var(--font-color); font-size: 25px;">Logo</a>
        </div>
        <div class="op">
            <li class="opi1"> Anuncios
                <div class="dropdown">
                    <div class="dropdown-content">
                        <a href="minhasProsp.php">Meus Anuncios</a>
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
                        <a href="anuncios.html"><i class='bx bx-edit'></i>Meus Anuncios</a>
                        <a href="perfilv.html"><i class='bx bx-user'></i>Minha conta</a>
                        <a href="#"><i class='bx bx-dollar-circle'></i>Saldos</a>
                        <a href="#"><i class='bx bx-log-out'></i>Sair</a>
                    </div>
                </div>
            </li>
        </div>
        </div>
        <div class="main-vend">
            <div class="vend-card">
                <div class="cont-ven">
            <label>Tipo:</label>
            <form action="vendeImoEdit.php" method="post" enctype="multipart/form-data">
            <select class="slc-tipo" name="tipo" id="slcTipo">
                <option value="Apartamento">Apartamento</option>
                <option value="Casa">Casa</option>
                <option value="Mansão">Mansão</option>
                <option value="Chacara">Chacara</option>
                <option value="Sitio">Sitio</option>
            </select>
            <br>
            <label>Condominio:</label>
            <select class="slc-tipo" name="cond" id="slcTipo">
                <option value="sim">Sim</option>
                <option value="nao">Nao</option>
            </select>
            <br>
            <label>Tamanho em M² :</label>
            <input type="text" id="iptM" name="tam" value="<?php echo $row["tamanho"] ?> ">
            <input type="hidden" name="idImovel" value="<?php echo $row["id"] ?>">
            <br>
            <label>Quartos:</label>
            <input type="text" id="ipt_cor" name="quart"  value="<?php echo $row["quartos"] ?> ">
            <br>
            <label>Banheiros:</label>
            <input type="text" id="ipt_cor" name="ban"  value="<?php echo $row["banheiros"] ?> ">
            <br>
            <label>Vagas:</label>
            <input type="text" id="ipt_cor" name="vagas"  value="<?php echo $row["vagas"] ?> ">
            <br>
            <label>Perto de Transporte Publico:</label>
            <input type="text" id="ipt_cor" name="tpubli" value="<?php echo $row["trans_publi"] ?> ">
            <br>
            <label>Mobilia:</label>
            <input type="text" id="ipt_cor" name="mob" value="<?php echo $row["mobilia"] ?> ">
            <br>
            <label>Andar:</label>
            <input type="text" id="ipt_cor" name="and"  value="<?php echo $row["andar"] ?> ">
            <br>
                </div>
                <div class="cont-ven">
            <label>Logradouro:</label>
            <input type="text" id="ipt_cor" name="lograd" value="<?php echo $row["endereçoImovel"] ?> ">
            <br>
            <label>Bairro:</label>
            <input type="text" id="ipt_cor" name="bairro" value="<?php echo $row["bairroImovel"] ?> ">
            <br>
            <label>Estado:</label>
            <input type="text" id="ipt_cor" name="estado" value="<?php echo $row["estadoImovel"] ?> ">
            <br>
            <label>CEP:</label>
            <input type="text" id="ipt_cor" name="cep" value="<?php echo $row["cepImovel"] ?> ">
            <br>
            <label>Cidade:</label>
            <input type="text" id="ipt_cor" name="cidade" value="<?php echo $row["cidadeImovel"] ?> ">
            <br>
            <label>Preco:</label>
            <input type="text" id="ipt_cor" name="preco" value="<?php echo $row["preco"] ?> ">
            <br>
            </div>
                <div class="image-ven">
                    <h4>Selecione a(s) imagem(s) para o anuncio</h1>
                    <label for="fileInput" class="custom-file-upload">
                        <img src="https://static.thenounproject.com/png/187803-200.png" alt="Escolher Ficheiro">
                      </label>
                      <input type="file" name="imagens1" id="fileInput">
                      <input type="file" name="imagens2" id="fileInput">
                      <input type="file" name="imagens3" id="fileInput">
                      <input type="file" name="imagens4" id="fileInput">
                      <input type="file" name="imagens5" id="fileInput">
                      <div id="preview"></div>
                      <div class="butt">
                        <button type="submit">Concluir</button>
                    </div></form>
            </div>
        </div>
    </div>
<?php }} ?>w
    <script>
        function mostrarOpcaoEspecifica() {
            var selectMarcas = document.getElementById("marcas");
            var selectOpcoesEspecificas = document.getElementById("opcoesEspecificas");
            var marcaSelecionada = selectMarcas.value;

            // Limpar opções anteriores
            selectOpcoesEspecificas.innerHTML = "";

            // Definir opções específicas com base na marca selecionada
            if (marcaSelecionada === "BMW") {
                criarSelectOpcoesEspecificas(["Série 1", "Série 2", "Série 3", "Série 4", "Série 5", "Série 6", "Série 7", "X1", "X2", "X3", "X4", "X5", "X6", "X7", "Z4"]);
            } else if (marcaSelecionada === "CHEVROLET") {
                criarSelectOpcoesEspecificas(["Camaro", "Cobalt", "Cruze", "Onix", "Prisma", "S10", "Spin", "Tracker"]);
            }
            // Adicione mais 'else if' conforme necessário para outras marcas

            // Função para criar as opções específicas
            function criarSelectOpcoesEspecificas(opcoes) {
                opcoes.forEach(function (opcao) {
                    var option = document.createElement("option");
                    option.text = opcao;
                    selectOpcoesEspecificas.add(option);
                });
            }
        }
    </script>
    <script>
        
        document.getElementById('fileInput').addEventListener('change', function() {
  const preview = document.getElementById('preview');
  const maxImages = 9; // Limite máximo de imagens

  const files = this.files;
  let imagesAdded = preview.getElementsByClassName('thumbnail').length; // Conta as imagens já presentes no preview

  for (let i = 0; i < files.length && imagesAdded < maxImages; i++) {
    const file = files[i];
    const reader = new FileReader();

    reader.onload = function(e) {
      const thumbnail = document.createElement('div');
      thumbnail.classList.add('thumbnail');
      thumbnail.innerHTML = `<img src="${e.target.result}" alt="${file.name}">`;
      preview.appendChild(thumbnail);

      imagesAdded++; // Incrementa o contador de imagens adicionadas
    };

    reader.readAsDataURL(file);
  }
});



    </script>
</body>
</html>

<?php

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

    $gravar = "INSERT INTO imovel (tipo, condominio, tamanho, quartos, banheiros, vagas, trans_publi, mobilia, andar, endereçoImovel, bairroImovel, estadoImovel, cepImovel, cidadeImovel, preco)
    VALUE 
    ('$tipo','$condominio','$km','$quartos','$banheiro','$vagas','$TPubli','$mobilia','$andar','$lograd','$bairro','$estado','$cep','$city','$preco') ";
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo 
        "<script> window.alert('Problemas ao Inserir.');
        window.location.href='inserirImovel.html'
        </script>";
    } else {
        echo 
        "<script> window.alert('Inserido com sucesso.');
        window.location.href='inserirImovel.html'
        </script>";
    }

    $diretorio = "images/$usuario_id/";

    // Criar o diretório
    mkdir($diretorio, 0755);

    // Receber os arquivos do formulário
    $arquivo = $_FILES['imagens'];
    //var_dump($arquivo);

    // Ler o array de arquivos
    for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

        // Receber nome da imagem
        $nome_arquivo = $arquivo['name'][$cont];

        // Criar o endereço de destino das imagens
        $destino = $diretorio . $arquivo['name'][$cont];

        // Acessa o IF quando realizar o upload corretamente
        if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
            $query_imagem = "UPDATE INTO carro (nome_imagem VALUES (:nome_imagem) WHERE fk_vendedor LIKE = 1";
            $cad_imagem = $conn->prepare($query_imagem);
            $cad_imagem->bindParam(':nome_imagem', $nome_arquivo);

            if ($cad_imagem->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Imagem cadastrado com sucesso!</p>";
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Imagem não cadastrada com sucesso!</p>";
        }
    }
}

?>