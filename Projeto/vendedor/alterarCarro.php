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

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "SELECT id, nome, cor, combustivel, tipo, email, especificações, preco, km, carroceria, estado FROM carro join cadastrovendedor on fkVendor = idVendor where idVendor = $id"; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Perfil</title>
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
                        <a href="anuncios.html"><i class='bx bx-edit' ></i>Meus Anuncios</a>
                        <a href="perfil.html"><i class='bx bx-user'></i>Minha conta</a>
                        <a href="#"><i class='bx bx-dollar-circle'></i>Saldos</a>
                        <a href="#"><i class='bx bx-log-out'></i>Sair</a>
                    </div>
                </div>
            </li>
        </div>
        </div>
        <div class="main-vend">
            <div class="vend-cardC">
                <div class="cont-ven">
                <form action="inserirCarro.php" method="post" enctype="multipart/form-data">
                    <label for="marcas">Marca:</label>
                    <input type="text" id="ipt_cor" name="marca" placeholder="Digite a marca do seu carro">
                <br>
                <label>Nome:</label>
               <input type="text" max="2024" id="ipt_ano" name="nomeCarro" maxlength="4" placeholder="Ano do modelo">
            
            <br>
            <label>Tipo:</label>
            <input type="text" id="ipt_cor" name="tipo" value="<?php echo $row["tipo"] ?>">
            <br>
            <label>Cor:</label>
            <input type="text" id="ipt_cor" name="cor" value="<?php echo $row["cor"] ?>">
            <br>
            <label>Carroceria:</label>
            <input type="text" id="ipt_cor" name="carroc" value="<?php echo $row["carroceria"] ?>">
            <br>
            <label>Combustivel:</label>
            <input type="text" id="ipt_cor" name="combu" value="<?php echo $row["combustivel"] ?>">
            <br>
</div>
<div class="cont-ven">
            <label>Final da Placa:</label>
            <input type="text" id="ipt_cor" name="finpla" placeholder="Quantos Kilometros andados">
            <br>
            <label>Troca:</label>
            <input type="text" id="ipt_cor" name="troc" placeholder="Sim ou Não?">
            <br>
            <label>Km:</label>
            <input type="text" id="ipt_cor" name="km" placeholder="Quantos Kilometros andados">
            <br>
            <label>Preço:</label>
            <input type="text" id="ipt_cor" name="preco" placeholder="Preço">
            <br>
            <label>Especificações:</label>
            <input type="text" id="ipt_cor" name="espec" placeholder="Quantos Kilometros andados">
            <br>
            <label>Descrição:</label>
            
            <input type="text" id="ipt_cor" cols="30" rows="10" name="descr" placeholder="Escreva uma breve descrição"></textarea>
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
                    </div>
            </div></form>
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



