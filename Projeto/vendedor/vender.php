<?php 

<?php 
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$cpf = $_SESSION['cpf'];
$rua = $_SESSION['rua'];
$bairro = $_SESSION['bairro'];
$estado = $_SESSION['estado'];

// Conexão com o banco de dados usando MySQLi
require_once('conecta.php');
include_once './conexao.php';

// Verifica se os dados do formulário foram enviados
if (isset($_POST['nomeCarro'])) {

    // Recupera os dados do formulário
    $marca = $_POST['marca'];
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
    $idCarro = $_POST["idCarro"];

    // Diretório para salvar as imagens
    $diretorio = "imagensCarro/$id/";

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
                    $query_imagem = "INSERT INTO imagemcarro (nome_imagem, fkVendor) VALUES (:nome_imagem, $id)";
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

    // Agora que as imagens foram enviadas, você pode inserir os dados do carro no banco de dados
    $gravar = "UPDATE carro nome = '$nome', tipo = '$tipo', especificações = '$espec', carroceria = '$carroc',
     combustivel = '$comb', finalplaca = '$finpla' , cor = '$cor', troca = '$troca', descricao = '$desc', km = '$km', fkVendor, preco = '$preco', marca = '$marca' WHERE id = $idCarro;
    $resultado = mysqli_query($conexao, $gravar);
    if ($resultado == false) {
        echo "<script> window.alert('Problemas ao Inserir.'); window.location.href=''; </script>";
    } else {
        echo "<script> window.alert('Inserido com sucesso.'); window.location.href=''; </script>";
    }
}

?>
