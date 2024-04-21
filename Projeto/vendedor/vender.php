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
                <form action="vender.php" method="post">
                    <label for="marcas">Marca:</label>
                <select class="slc-uf" id="marcas" name="marca" onchange="mostrarOpcaoEspecifica()">
                    <option value="" selected disabled>Selecione uma marca</option>
                    <option value="ACURA">ACURA</option>
                    <option value="ADAMO">ADAMO</option>
                    <option value="AGNIS">AGNIS</option>
                    <option value="AGRALE">AGRALE</option>
                    <option value="ALFA ROMEO">ALFA ROMEO</option>
                    <option value="AMAZONAS">AMAZONAS</option>
                    <option value="AMERICAR">AMERICAR</option>
                    <option value="ANGRA">ANGRA</option>
                    <option value="ASIA">ASIA</option>
                    <option value="ASTON MARTIN">ASTON MARTIN</option>
                    <option value="AUDI">AUDI</option>
                    <option value="AUSTIN-HEALEY">AUSTIN-HEALEY</option>
                    <option value="AVALLONE">AVALLONE</option>
                    <option value="BAJA">BAJA</option>
                    <option value="BEACH">BEACH</option>
                    <option value="BENTLEY">BENTLEY</option>
                    <option value="BIANCO">BIANCO</option>
                    <option value="BMW">BMW</option>
                    <option value="BORGWARD">BORGWARD</option>
                    <option value="BRASFIBRA">BRASFIBRA</option>
                    <option value="BRILLIANCE">BRILLIANCE</option>
                    <option value="BRM">BRM</option>
                    <option value="BUGATTI">BUGATTI</option>
                    <option value="BUGRE">BUGRE</option>
                    <option value="BUGWAY">BUGWAY</option>
                    <option value="BUICK">BUICK</option>
                    <option value="BYD">BYD</option>
                    <option value="CADILLAC">CADILLAC</option>
                    <option value="CAOA CHERY">CAOA CHERY</option>
                    <option value="CAOA CHERY-">CAOA CHERY-</option>
                    <option value="CAUYPE">CAUYPE</option>
                    <option value="CBP">CBP</option>
                    <option value="CBT">CBT</option>
                    <option value="CHAMONIX">CHAMONIX</option>
                    <option value="CHANA">CHANA</option>
                    <option value="CHANGAN">CHANGAN</option>
                    <option value="CHEDA">CHEDA</option>
                    <option value="CHEVROLET">CHEVROLET</option>
                    <option value="CHEVROLET">CHEVROLET</option>
                    <option value="CHRYSLER">CHRYSLER</option>
                    <option value="CITROËN">CITROËN</option>
                    <option value="CORD">CORD</option>
                    <option value="COYOTE">COYOTE</option>
                    <option value="CROSS LANDER">CROSS LANDER</option>
                    <option value="D2D MOTORS">D2D MOTORS</option>
                    <option value="DACON">DACON</option>
                    <option value="DAEWOO">DAEWOO</option>
                    <option value="DAIHATSU">DAIHATSU</option>
                    <option value="DATSUN">DATSUN</option>
                    <option value="DE SOTO">DE SOTO</option>
                    <option value="DE TOMASO">DE TOMASO</option>
                    <option value="DELOREAN">DELOREAN</option>
                    <option value="DKW-VEMAG">DKW-VEMAG</option>
                    <option value="DODGE">DODGE</option>
                    <option value="DUNNAS">DUNNAS</option>
                    <option value="EAGLE">EAGLE</option>
                    <option value="EDSEL">EDSEL</option>
                    <option value="EFFA">EFFA</option>
                    <option value="EGO">EGO</option>
                    <option value="EMIS">EMIS</option>
                    <option value="ENGESA">ENGESA</option>
                    <option value="ENSEADA">ENSEADA</option>
                    <option value="ENVEMO">ENVEMO</option>
                    <option value="FARGO">FARGO</option>
                    <option value="FARUS">FARUS</option>
                    <option value="FERCAR BUGGY">FERCAR BUGGY</option>
                    <option value="FERRARI">FERRARI</option>
                    <option value="FIAT">FIAT</option>
                    <option value="FIAT">FIAT</option>
                    <option value="FIBRARIO">FIBRARIO</option>
                    <option value="FIBRAVAN">FIBRAVAN</option>
                    <option value="FISKER">FISKER</option>
                    <option value="FNM">FNM</option>
                    <option value="FORD">FORD</option>
                    <option value="FORD">FORD</option>
                    <option value="FOTON">FOTON</option>
                    <option value="FYBER">FYBER</option>
                    <option value="GEELY">GEELY</option>
                    <option value="GEO">GEO</option>
                    <option value="GIANTS">GIANTS</option>
                    <option value="GLASPAC">GLASPAC</option>
                    <option value="GMC">GMC</option>
                    <option value="GRANCAR">GRANCAR</option>
                    <option value="GREAT WALL">GREAT WALL</option>
                    <option value="GURGEL">GURGEL</option>
                    <option value="GWM">GWM</option>
                    <option value="HAFEI">HAFEI</option>
                    <option value="HB">HB</option>
                    <option value="HOFSTETTER">HOFSTETTER</option>
                    <option value="HONDA">HONDA</option>
                    <option value="HONDA">HONDA</option>
                    <option value="HUDSON">HUDSON</option>
                    <option value="HUMMER">HUMMER</option>
                    <option value="HUPMOBILE">HUPMOBILE</option>
                    <option value="HYUNDAI">HYUNDAI</option>
                    <option value="HYUNDAI">HYUNDAI</option>
                    <option value="ICOMDA">ICOMDA</option>
                    <option value="INCOFER">INCOFER</option>
                    <option value="INFINITI">INFINITI</option>
                    <option value="INTERNATIONAL">INTERNATIONAL</option>
                    <option value="ISUZU">ISUZU</option>
                    <option value="IVECO">IVECO</option>
                    <option value="JAC">JAC</option>
                    <option value="JAGUAR">JAGUAR</option>
                    <option value="JEEP">JEEP</option>
                    <option value="JENSEN">JENSEN</option>
                    <option value="JINBEI">JINBEI</option>
                    <option value="JONWAY">JONWAY</option>
                    <option value="JPX">JPX</option>
                    <option value="KAISER">KAISER</option>
                    <option value="KIA">KIA</option>
                    <option value="KOENIGSEGG">KOENIGSEGG</option>
                    <option value="L AUTOMOBILE">L AUTOMOBILE</option>
                    <option value="L´AUTO CRAFT">L´AUTO CRAFT</option>
                    <option value="LADA">LADA</option>
                    <option value="LAMBORGHINI">LAMBORGHINI</option>
                    <option value="LANCIA">LANCIA</option>
                    <option value="LAND ROVER">LAND ROVER</option>
                    <option value="LANDWIND">LANDWIND</option>
                    <option value="LEXUS">LEXUS</option>
                    <option value="LHM">LHM</option>
                    <option value="LIFAN">LIFAN</option>
                    <option value="LINCOLN">LINCOLN</option>
                    <option value="LOBINI">LOBINI</option>
                    <option value="LOTUS">LOTUS</option>
                    <option value="MAGNATA">MAGNATA</option>
                    <option value="MAHINDRA">MAHINDRA</option>
                    <option value="MARCOPOLO">MARCOPOLO</option>
                    <option value="MARINA´S">MARINA´S</option>
                    <option value="MASERATI">MASERATI</option>
                    <option value="MATRA">MATRA</option>
                    <option value="MAYBACH">MAYBACH</option>
                    <option value="MAZDA">MAZDA</option>
                    <option value="MCLAREN">MCLAREN</option>
                    <option value="MENON">MENON</option>
                    <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                    <option value="MERCURY">MERCURY</option>
                    <option value="MG">MG</option>
                    <option value="MINI">MINI</option>
                    <option value="MITSUBISHI">MITSUBISHI</option>
                    <option value="MITSUBISHI">MITSUBISHI</option>
                    <option value="MIURA">MIURA</option>
                    <option value="MOBBY">MOBBY</option>
                    <option value="MORGAN">MORGAN</option>
                    <option value="MORRIS">MORRIS</option>
                    <option value="MP LAFER">MP LAFER</option>
                    <option value="MPLM">MPLM</option>
                    <option value="NASH">NASH</option>
                    <option value="NEWTRACK">NEWTRACK</option>
                    <option value="NISSAN">NISSAN</option>
                    <option value="NISSAN">NISSAN</option>
                    <option value="NURBURGRING">NURBURGRING</option>
                    <option value="OLDSMOBILE">OLDSMOBILE</option>
                    <option value="OPEL">OPEL</option>
                    <option value="PACKARD">PACKARD</option>
                    <option value="PAG">PAG</option>
                    <option value="PAGANI">PAGANI</option>
                    <option value="PEUGEOT">PEUGEOT</option>
                    <option value="PEUGEOT">PEUGEOT</option>
                    <option value="PLYMOUTH">PLYMOUTH</option>
                    <option value="PONTIAC">PONTIAC</option>
                    <option value="PORSCHE">PORSCHE</option>
                    <option value="PUMA">PUMA</option>
                    <option value="RAM">RAM</option>
                    <option value="RDK">RDK</option>
                    <option value="RELY">RELY</option>
                    <option value="RENAULT">RENAULT</option>
                    <option value="RENAULT">RENAULT</option>
                    <option value="RENO">RENO</option>
                    <option value="REVA-I">REVA-I</option>
                    <option value="RILEY">RILEY</option>
                    <option value="RIVIAN">RIVIAN</option>
                    <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>
                    <option value="ROMI">ROMI</option>
                    <option value="ROVER">ROVER</option>
                    <option value="SAAB">SAAB</option>
                    <option value="SANTA MATILDE">SANTA MATILDE</option>
                    <option value="SATURN">SATURN</option>
                    <option value="SEAT">SEAT</option>
                    <option value="SELVAGEM">SELVAGEM</option>
                    <option value="SERES">SERES</option>
                    <option value="SHELBY">SHELBY</option>
                    <option value="SHINERAY">SHINERAY</option>
                    <option value="SHORT">SHORT</option>
                    <option value="SHUANGHUAN">SHUANGHUAN</option>
                    <option value="SIMCA">SIMCA</option>
                    <option value="SMART">SMART</option>
                    <option value="SPYKER">SPYKER</option>
                    <option value="SSANGYONG">SSANGYONG</option>
                    <option value="STANDARD">STANDARD</option>
                    <option value="STUDEBAKER">STUDEBAKER</option>
                    <option value="SUBARU">SUBARU</option>
                    <option value="SUNBEAM">SUNBEAM</option>
                    <option value="SUZUKI">SUZUKI</option>
                    <option value="TAC">TAC</option>
                    <option value="TANDER">TANDER</option>
                    <option value="TANGER">TANGER</option>
                    <option value="TESLA">TESLA</option>
                    <option value="TOY">TOY</option>
                    <option value="TOYOTA">TOYOTA</option>
                    <option value="TOYOTA">TOYOTA</option>
                    <option value="TRIUMPH">TRIUMPH</option>
                    <option value="TROLLER">TROLLER</option>
                    <option value="UNIMOG">UNIMOG</option>
                    <option value="UP">UP</option>
                    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                    <option value="VOLVO">VOLVO</option>
                    <option value="WAKE">WAKE</option>
                    <option value="WALK">WALK</option>
                    <option value="WALLYSCAR">WALLYSCAR</option>
                    <option value="WEG">WEG</option>
                    <option value="WILLYS">WILLYS</option>
                    <option value="WILLYS-OVERLAND">WILLYS-OVERLAND</option>
                    <option value="WUYANG">WUYANG</option>
                    <option value="YAMAMA">YAMAMA</option>
                    <option value="YAMAMOTO">YAMAMOTO</option>
                    <option value="YUGO">YUGO</option>
                    <option value="ZODIAC">ZODIAC</option>
                    <option value="WILLYS-OVERLAND">WILLYS-OVERLAND</option>
                </select>
                <br>
                <label for="opcoesEspecificas">Modelo:</label>
                <select class="slc-uf" id="opcoesEspecificas">
                    <option value="" selected disabled>Escolha um modelo</option>
                </select>
                <br>
                <label>Nome:</label>
               <input type="text" max="2024" id="ipt_ano" maxlength="4" placeholder="Ano do modelo">
            
            <br>
            <label>Tipo:</label>
            <input type="text" id="ipt_vers" placeholder="Versão">
            <br>
            <label>Cor:</label>
            <input type="text" id="ipt_cor" placeholder="Cor">
            <br>
            <label>Carroceria:</label>
            <input type="text" id="ipt_cor" placeholder="Quantos Kilometros andados">
            <br>
            <label>Combustivel:</label>
            <input type="text" id="ipt_cor" placeholder="Quantos Kilometros andados">
            <br>
</div>
<div class="cont-ven">
            <label>Final da Placa:</label>
            <input type="text" id="ipt_cor" placeholder="Quantos Kilometros andados">
            <br>
            <label>Troca:</label>
            <input type="text" id="ipt_cor" placeholder="Sim ou Não?">
            <br>
            <label>Km:</label>
            <input type="text" id="ipt_cor" placeholder="Quantos Kilometros andados">
            <br>
            <label>Preço:</label>
            <input type="text" id="ipt_cor" placeholder="Preço">
            <br>
            <label>Especificações:</label>
            <input type="text" id="ipt_cor" placeholder="Quantos Kilometros andados">
            <br>
            <label>Descrição:</label>
            
            <textarea name="" id="" cols="30" rows="10" placeholder="Escreva uma breve descrição"></textarea>
                </div>
                <div class="image-ven">
                    <h4>Selecione a(s) imagem(s) para o anuncio</h1>
                    <label for="fileInput" class="custom-file-upload">
                        <img src="https://static.thenounproject.com/png/187803-200.png" alt="Escolher Ficheiro">
                      </label>
                      <input type="file" name="imagens[]" id="fileInput" multiple="multiple" style="display: none;">
                      <div id="preview"></div>
                      <div class="butt">
                        <button>Concluir</button>
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

<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

if (isset($_POST['nomeCarro'])) {

$nome = $_POST['nomeCarro'];
$tipo = $_POST['tipo'];
$cor = $_POST['cor'];
$carroc = $_POST['carroc'];
$comb = $_POST['combu'];
$finpla = $_POST['finpla'];
$troca = $_POST['troc'];
$km = $_POST['km'];
$preco = $_POST['preco'];
$espec = $_POST['espec'];
$desc = $_POST['descr'];
// $ = $_POST[''];
 require('conecta.php');

 $gravar = "INSERT INTO carro (nome, tipo, especificações, carroceria, combustivel, finalplaca, cor, troca, descricao, km, preco, marca modelo, marca) 
 VALUE ('$nome', '$tipo', '$cor', '$carroc', '$comb', '$finpla', '$troca', '$km', '$preco', '$espec', '$desc' ) ";
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


