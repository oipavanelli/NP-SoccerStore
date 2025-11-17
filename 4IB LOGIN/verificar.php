<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

try {
    // Estabelecer uma conexão com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$bancodedados", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tratar falhas na conexão
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}

// Obter as informações do formulário
$usuario = $_POST['usuario'];
$senhaFormulario = $_POST['senha'];

// Consulta para obter os dados do usuário correspondente ao e-mail ou ao usuário fornecido
$sql = "SELECT * FROM comprador WHERE usuario = :usuario OR email = :email OR cpf = :usuario";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":usuario", $usuario);
$stmt->bindParam(":email", $usuario);
$stmt->bindParam(":cpf", $usuario);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $row["senha"];
    $contadeacesso = $row["contadeacesso"];

    if (password_verify($senhaFormulario, $hashedPassword)) {
        // Senha válida, fazer o que for necessário
        echo "Login bem-sucedido!";
        
        // Realizar redirecionamento aqui, antes de qualquer saída
        if ($contadeacesso == 1) {        
            header("Location: admininical.php");
        } elseif ($contadeacesso == 0) {
            header("Location: telainicial.PHP");
        } else {
            echo "Erro: Tipo de acesso desconhecido.";
        }
        
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        // Senha incorreta
        echo '<script>alert("Senha incorreta. Por favor, tente novamente."); window.location.href = document.referrer;</script>';
    }
} else {
    // Usuário ou e-mail não encontrado
    echo '<script>alert("Usuário ou e-mail não existe."); window.location.href = document.referrer;</script>';
}

// Fechar a conexão com o banco de dados
$conn = null;
?>
