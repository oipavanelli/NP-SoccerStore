<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';
$conn = mysqli_connect($host, $usuario, $senha, $bancodedados);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Conectado com sucesso";

// Verifique se todas as chaves estão definidas no array $_POST
if (isset($_POST['usuario'], $_POST['cpf'], $_POST['email'], $_POST['senha'])) {
    
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    
    $contadeacesso = '1' ;
    
        // Código do Professor 

        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO tb_admin (usuario, cpf,email, senha, contadeacesso) VALUES ('$usuario', '$cpf', '$email', '$senha_criptografada', '$contadeacesso')";

        $sql = "INSERT INTO tb_comprador (usuario, cpf,email, senha, contadeacesso) VALUES ('$usuario', '$cpf', '$email', '$senha_criptografada', '$contadeacesso')";

        if (mysqli_query($conn, $sql)) {
              echo "Dados gravados com sucesso";
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        // fechar a conexão com o wamp
        mysqli_close($conn);
        header("Location: cadastro-login.php");
        exit(); // Certifique-se de sair do script após o redirecionamento
    }
     


?>
