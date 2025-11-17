<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

// Estabelecer a conexão com o banco de dados usando a extensão MySQLi
$conn = mysqli_connect($host, $usuario, $senha, $bancodedados);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Conectado com sucesso";

// Verifique se todas as chaves estão definidas no array $_POST
if (isset($_POST['usuario'], $_POST['cpf'], $_POST['email'], $_POST['senha'])) {
    
    // Escapar e obter valores do formulário
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    
    // Obter e escapar valor de contadeacesso do formulário
    $contadeacesso = mysqli_real_escape_string($conn, $_POST['0']);
    
    // Criptografar a senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    
    // Preparar e executar a consulta SQL para inserção de dados
    $sql = "INSERT INTO comprador (usuario, cpf, email, senha, contadeacesso) VALUES ('$usuario', '$cpf', '$email', '$senha_criptografada', '$contadeacesso')";

    if (mysqli_query($conn, $sql)) {
        echo "Dados gravados com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
    
    // Redirecionar para a página de cadastro
    header("Location: cadastro.php");
    exit(); // Certifique-se de sair do script após o redirecionamento
} 
?>
