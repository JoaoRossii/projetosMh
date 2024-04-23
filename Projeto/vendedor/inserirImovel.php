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

    $gravar = "INSERT INTO imovel (tipo, condominio, tamanho, quartos, banheiros, vagas, trans_publi, mobilia, andar, fkVendor, endereçoImovel, bairroImovel, estadoImovel, cepImovel, cidadeImovel, preco)
    VALUE 
    ('$tipo','$condominio','$km','$quartos','$banheiro','$vagas','$TPubli','$mobilia','$andar', 1,'$lograd','$bairro','$estado','$cep','$city','$preco')";
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