<?php 

$servername = "localhost";
$username = "root";
$password = "Sk8long2077#";
$dbname = "getninjas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT nome, tipo, email, especificações, preco, km, carroceria FROM carro join cadastrovendedor on fkVendor = idVendor where id = 1"; /* query utilizada para buscar dados no banco para exibir em um card */
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
                        <a href="vender.html">Vender Carros</a>
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
                        <a href="anuncios.html"><i class='bx bx-edit'></i>Meus Anuncios</a>
                        <a href="perfil.html"><i class='bx bx-user'></i>Minha conta</a>
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
            <form action="inserirImovel.php" method="post">
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
            <input type="text" id="iptM" name="tam" placeholder="Digite o Tamanho">
            <br>
            <label>Quartos:</label>
            <input type="text" id="ipt_cor" name="quart" placeholder="Digite o numero de Quartos">
            <br>
            <label>Banheiros:</label>
            <input type="text" id="ipt_cor" name="ban" placeholder="Digite o numero de banheiros">
            <br>
            <label>Vagas:</label>
            <input type="text" id="ipt_cor" name="vagas" placeholder="Digite o numero de vagas">
            <br>
            <label>Perto de Transporte Publico:</label>
            <input type="text" id="ipt_cor" name="tpubli" placeholder="Sim ou Não">
            <br>
            <label>Mobilia:</label>
            <input type="text" id="ipt_cor" name="mob" placeholder="Sim ou Não">
            <br>
            <label>Andar:</label>
            <input type="text" id="ipt_cor" name="and" placeholder="Qual ou quantos andares possui">
            <br>
                </div>
                <div class="cont-ven">
            <label>Logradouro:</label>
            <input type="text" id="ipt_cor" name="lograd" placeholder="Digite sua Rua, Av ...">
            <br>
            <label>Bairro:</label>
            <input type="text" id="ipt_cor" name="bairro" placeholder="Digite seu Bairro">
            <br>
            <label>Estado:</label>
            <input type="text" id="ipt_cor" name="estado" placeholder="Digite seu estado">
            <br>
            <label>CEP:</label>
            <input type="text" id="ipt_cor" name="cep" placeholder="00000-000">
            <br>
            <label>Cidade:</label>
            <input type="text" id="ipt_cor" name="cidade" placeholder="Digite sua cidade">
            <br>
            <label>Preco:</label>
            <input type="text" id="ipt_cor" name="preco" placeholder="Digite o Preço">
            <br>
            </div>
                <div class="image-ven">
                    <h4>Selecione a(s) imagem(s) para o anuncio</h1>
                    <label for="fileInput" class="custom-file-upload">
                        <img src="https://static.thenounproject.com/png/187803-200.png" alt="Escolher Ficheiro">
                      </label>
                      <input type="file" name="imagens[]" id="fileInput" multiple="multiple" style="display: none;">
                      <div id="preview"></div>
                      <div class="butt">
                        <button type="submit">Concluir</button>
                    </div></form>
            </div>
        </div>
    </div>

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