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