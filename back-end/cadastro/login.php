<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro</title>
</head>
<body>
<?php
$conexao=mysqli_connect("localhost", "root", "Sk8long2077#", "getninjas");
if(!$conexao){
    echo "erro-bd";
    exit;
}

// Verifica se o formulário foi submetido
if (isset($_POST['user'])) {
    $email = $_POST["user"];
    $senha = $_POST["senha"];

    // Consulta para verificar o email na tabela de "Usuario"
    $query_user = "SELECT id, password_hash FROM cadastrousuario WHERE email = '" . $email ."'";
    $result_user = $conexao->query($query_user);

    // Consulta para verificar o email na tabela de "Vendedor", se não encontrado em "Usuario"
    if ($result_user->num_rows === 0) {
        $query_vend = "SELECT id, password_hash FROM cadastrovendedor WHERE email = '" . $email . "'";
        $result_vend = $conexao->query($query_vend);
        
     
        
        if ($result_vend->num_rows > 0) {
            $row = $result_vend->fetch_assoc();
            $senha_hash = $row["password_hash"];

            
            
            // Verificar a senha para empresas
            if (password_verify ($senha, $senha_hash)) {
                // Senha correta 
                session_start();
            $sql = "select * FROM cadastrovendedor where email='" . $email . "'";
				$resultado = mysqli_query($conexao, $sql);
				while ($dados = mysqli_fetch_array($resultado)) {
					$_SESSION['empresa'] = $dados['empresa'];
					$_SESSION['senha'] = $dados['senha'];
					$_SESSION['email'] = $dados['email'];
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['perfil'] = $dados['perfil'];
                    $_SESSION['cnpj'] = $dados['CNPJ'];
				} 
                
            echo "
            <script>
            window.location.href='cadastro.html';
            </script>";
            }
        }
    } else {
        $row = $result_user->fetch_assoc();
        $senha_hash = $row["password_hash"];

        // Verificar a senha para alunos
        if (password_verify ($senha, $senha_hash)) {
            // Senha correta 
            session_start();
            $sql = "select * FROM cadastrousuario where email='" . $email . "'";
				$resultado = mysqli_query($conexao, $sql);
				while ($dados = mysqli_fetch_array($resultado)) {
					$_SESSION['nome'] = $dados['nm_projeto'];
					$_SESSION['senha'] = $dados['senha'];
					$_SESSION['email'] = $dados['email'];
                    $_SESSION['id'] = $dados['id'];
                    $_SESSION['perfil'] = $dados['perfil'];
				}
            $sql1 = "select FROM projetos where email='" . $email . "'";
                $result = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_array($resultado)) {
                    $_SESSION['id'] = $dados['id'];
                }
            echo "
            <script>
            window.location.href='cadastro.html';
            </script>";
        }
    }

    // Se chegou aqui, o email ou senha estão incorretos
    echo "
    <script> window.alert('email ou senha errados, tente novamente');
    window.location.href='login.html';
    </script>";
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
    
    
</body>
</html>