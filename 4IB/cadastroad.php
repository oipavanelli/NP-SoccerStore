<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $usuario = $_POST["admin-usuario"];
    $senha = $_POST["admin-senha"];
    $confirmarSenha = $_POST["admin-confirmar-senha"];

    // Verifica se a senha e a confirmação de senha coincidem
    if ($senha == $confirmarSenha) {
        // Conecta ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Hash da senha para armazenamento seguro no banco de dados
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados do administrador no banco de dados
        $sql = "INSERT INTO administradores (usuario, senha) VALUES ('$usuario', '$senhaHash')";

        if ($conn->query($sql) === TRUE) {
            // Conta de administrador criada com sucesso
            echo "Conta de administrador criada com sucesso!";
        } else {
            echo "Erro ao criar a conta de administrador: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        // Senha e confirmação de senha não coincidem
        echo "A senha e a confirmação de senha não coincidem.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Criar Conta de Administrador</title>
</head>
<body>
    <h2>Criar Conta de Administrador</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="admin-usuario">Usuário:</label>
        <input type="text" id="admin-usuario" name="admin-usuario" required>
        <br>
        <label for="admin-senha">Senha:</label>
        <input type="password" id="admin-senha" name="admin-senha" required>
        <br>
        <label for="admin-confirmar-senha">Confirmar Senha:</label>
        <input type="password" id="admin-confirmar-senha" name="admin-confirmar-senha" required>
        <br>
        <input type="submit" value="Criar Conta">
    </form>
</body>
</html>
