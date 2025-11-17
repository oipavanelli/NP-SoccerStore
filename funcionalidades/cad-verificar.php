<?php 
include('sessao.php');

$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

// Estabelecer a conexão com o banco de dados usando a extensão MySQLi
$conn = new mysqli($host, $usuario, $senha, $bancodedados);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obter as informações do formulário
$usuario = $_POST['usuario'];
$senhaFormulario = $_POST['senha'];

// Consulta para obter os dados do usuário correspondente ao e-mail, usuário ou CPF fornecido
$sql = "SELECT * FROM tb_comprador WHERE usuario = ? OR email = ? OR cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $usuario, $usuario, $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row["senha"];
    $contadeacesso = $row["contadeacesso"];
    $status = $row["status"];

    if ($status == 1) {
        // Status inativo, não permitir o login
        header("Location: aviso-inatividade.php");
        exit;
    }

    if (password_verify($senhaFormulario, $hashedPassword)) {
        // Senha válida, fazer o que for necessário
        echo "Login bem-sucedido!";

        // Determine o destino com base no valor de contadeacesso
        if ($contadeacesso == 1) {
            $_SESSION['userLogado'] = 1;
        } elseif ($contadeacesso == 0) {
            $_SESSION['userLogado'] = 0;
        } else {
            echo "Erro: Tipo de acesso desconhecido.";
            exit;
        }

        $_SESSION['userUsuario'] = $row['usuario'];
        $_SESSION['userEmail'] = $row['email'];
        $_SESSION['userCpf'] = $row['cpf'];
        $_SESSION['userID'] = $row['id'];
        $_SESSION['conta'] = $row['contadeacesso'];

        // Redirecionar após determinar o tipo de acesso
        header("Location: ../index.php");
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Senha incorreta
        echo '<script>alert("Senha incorreta. Por favor, tente novamente."); window.location.href = document.referrer;</script>';
    }
} else {
    // Usuário, e-mail ou CPF não encontrado
    echo '<script>alert("Usuário, e-mail ou CPF não existe."); window.location.href = document.referrer;</script>';
}

// Fechar a conexão com o banco de dados
$stmt->close();
$conn->close();
?>