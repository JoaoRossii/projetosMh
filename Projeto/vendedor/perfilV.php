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
$telefone = $_SESSION['telefone'];
$data = $_SESSION['dtnasc'];
$cidade = $_SESSION['cidade'];
$cnpj = $_SESSION['cnpj'];

require_once('conecta.php');

$SQL = "select * FROM cadastrousuario where email='" . $email . "'";
$resultado = mysqli_query($conexao, $SQL);

// while ($dados = mysqli_fetch_array($resultado)) {
//     $_SESSION['nome'] = $dados['nm_projeto'];
// 	$_SESSION['senha'] = $dados['senha'];
// 	$_SESSION['email'] = $dados['email'];
//     $_SESSION['perfil'] = $dados['perfil'];
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Perfil</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
                        <a href="perfil.html"><i class='bx bx-user'></i>Minha conta</a>
                        <a href="#"><i class='bx bx-log-out'></i>Sair</a>
                    </div>
                </div>
            </li>
        </div>
        <div class="ot2">
            <i class='bx bx-menu'></i>
        </div>
    </div>
    <div class="content-perf">
        <div class="main-perf">
            <div class="display-perf">
                <img src="https://i.pinimg.com/originals/42/07/81/420781385c0f05000a2e30cd2381fc3c.gif" alt="">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="perf-op">
                <a href="chat.html"><li><i class='bx bx-chat'></i>Chat</li></a>
                <li class="usi"><i class='bx bx-user'></i>Minha conta</li>
                <li><i class='bx bx-log-out'></i>Sair</li>
            </div>
        </div>
        <div class="rest-perf">
            <div class="dados">
                <div class="dados-cont">
                <h2>Meus Dados:</h2>
                <div class="ti"></div>
                <i onclick="thomas()" class='bx bxs-pencil tooltip'>
                    <span class="tooltiptext">Editar Dados</span></i>
            </div>
        <form action="/projetosMh/back-end/Update/alterarDadosVendedor.php" method="post">
            <div class="camp">
                <label>E-mail:</label>
                <input type="text" name="email" id="inp" value="<?php echo $email ?>""  disabled>
            </div>
                <div class="camp">
                    <label>Nome Completo:</label>
                <input type="text" name="nome" id="inp" value="<?php echo $nome ?>""  disabled>
            </div>
            <div class="camp">
                <label>CPF:</label>
            <input type="text" name="cpf" id="inp" value="<?php echo $cpf ?>""  disabled>
            </div>
            <div class="camp">
                <label>CNPJ:</label>
            <input type="text" name="cnpj" id="inp" value="<?php echo $cnpj ?>""  disabled>
        </div>
                <div class="camp" >
                    <label>Data de Nascimento:</label>
                <input type="text" maxlength="10" name="data_nascimento" placeholder="dd/mm/aaaa" id="inp" value="<?php echo $data ?>"" disabled>
            </div>
            <div class="btunin">
                <button id="btnuzin" type="submit">Alterar Dados</button>
            </div>
        </form>        
            </div>
            <div class="dados2">
                <div class="dados-cont">
                    <h2>Endereço e contato:</h2>
                    <div class="ti2"></div>
                    <i onclick="ende()" class='bx bxs-pencil tooltip' >
                        <span class="tooltiptext">Editar Endereço</span></i>
                </div>
                <form action="/projetosMh/back-end/Update/alterarEnderecoVendedor.php" method="post">
                <div class="camp">
                    <label>CEP:</label>
                    <input type="text" name="cep" placeholder="00000-000"   id="end" disabled>
                </div>
                <div class="camp">
                    <label>Rua:</label>
                    <input type="text" name="rua" value="<?php echo $rua ?>" id="end" disabled>
                </div>
                <div class="campao">
                <div class="camp">
                    <label>Estado:</label>
                    <select class="slc-uf" name="estado" id="slc_uf" disabled>
                        <option value="<?php echo $estado ?>" selected disabled><?php echo $estado ?></option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                    
                </div>
                <div class="camp">
                    <label>Cidade:</label>
                    <input type="text" placeholder="<?php echo $cidade ?>" name="cidade" id="end" disabled>
                </div>
            </div>
            <div class="camp">
                <label>Telefone:</label>
                <input type="text" placeholder="<?php echo $telefone ?>"   name="telefone" id="end" disabled>
            </div>
                <div class="btunin">
                    <button id="btnuzin2" type="submit">Alterar</button>
                </div>
        </form>        
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $('#data_nascimento').mask('00/00/0000');
    });
</script>


    <script src="main.js"></script>
    <script>


   function thomas() {
    var inputs = document.querySelectorAll('[id="inp"]'); // Seleciona todos os elementos com o ID 'end'

    inputs.forEach(function(input) {
        input.disabled = false; // Habilita cada elemento
        input.style.cursor = "auto"; // Define o cursor como 'auto' para cada elemento
    });


    var btn = document.getElementById('btnuzin');
    btn.style.display = "block";
}
    </script>
    <script>
     function ende() {
        var inputs = document.querySelectorAll('[id="end"]'); // Seleciona todos os elementos com o ID 'end'

inputs.forEach(function(input) {
    input.disabled = false; // Habilita cada elemento
    input.style.cursor = "auto"; // Define o cursor como 'auto' para cada elemento
});

    var btn2 = document.getElementById('btnuzin2');
    btn2.style.display = "block";
    slc_uf.disabled = false;
    slc_uf.style.cursor = "auto";
}
    </script>