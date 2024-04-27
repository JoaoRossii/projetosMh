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

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "SELECT idCarro, nome, cor, marca, combustivel, troca, tipo, email, especificações, finalplaca, descricao, preco, km, carroceria, estado FROM carro join cadastrovendedor on fkVendor = idVendor "; /* query utilizada para buscar dados no banco para exibir em um card */
$result = $conn->query($sql);

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
            <a href="indexV.php" style="text-decoration: none; color: var(--font-color); font-size: 25px;">Logo</a>
        </div>
        <div class="op">
                <li class="opi1">Anuncios
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
                    <input type="text" id="ipt_cor" name="marca" placeholder="digite a marca do carro">
                <br>
                <label>Nome:</label>
               <input type="text" max="2024" id="ipt_ano" name="nomeCarro" placeholder="digite o nome do carro"> 
            
            <br>
            <label>Tipo:</label>
            <input type="hidden" name="idCarro" >
            <input type="text" id="ipt_cor" name="tipo" placeholder="digite o tipo do carro, van, furgão, caminhonete ...">
            <br>
            <label>Cor:</label>
            <input type="text" id="ipt_cor" name="cor" placeholder="digite a cor do carro">
            <br>
            <label>Carroceria:</label>
            <input type="text" id="ipt_cor" name="carroc" placeholder="digite o ano da carroceria">
            <br>
            <label>Combustivel:</label>
            <input type="text" id="ipt_cor" name="combu" placeholder="digite o tipo de combustivel">
            <br>
</div>
<div class="cont-ven">
            <label>Final da Placa:</label>
            <input type="text" id="ipt_cor" name="finpla" placeholder="digite o final da placa">
            <br>
            <label>Troca:</label>
            <input type="text" id="ipt_cor" name="troc" placeholder="aceita troca ? sim ou não">
            <br>
            <label>Km:</label>
            <input type="text" id="ipt_cor" name="km" placeholder="digite a kilometragem do carro">
            <br>
            <label>Preço:</label>
            <input type="text" id="ipt_cor" name="preco" placeholder="digite o preço do carro">
            <br>
            <label>Especificações:</label>
            <input type="text" id="ipt_cor" name="espec" placeholder="digite as especificações do carro">
            <br>
            <label>Descrição:</label>
            
            <input type="text" id="ipt_cor" cols="30" rows="10" name="descr" placeholder="digite a descrição do carro"></textarea>
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



