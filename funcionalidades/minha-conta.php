<?php
session_start();

$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

// Estabelecer a conexão com o banco de dados usando a extensão PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$bancodedados", $usuario, $senha);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


if (isset($_POST['editar_usuario'])) {
    // Recupere os dados do formulário
    $usuario = $_POST['usuario'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    // Atualize os dados do usuário no banco de dados
    $sql = "UPDATE tb_comprador SET usuario = :usuario, cpf = :cpf, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $_SESSION['userID']);

    if ($stmt->execute()) {
        // Atualização bem-sucedida
        echo "Dados atualizados com sucesso!";
    } else {
        // Erro na atualização
        echo "Erro na atualização dos dados: " . $stmt->errorInfo()[2];
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        [type="email"],
        [type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #1df68d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #15b763;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="POST">
        <label for="usuario">Nome de Usuário:</label>
        <input type="text" name="usuario" value="<?php echo $_SESSION['userUsuario'] ?>" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo $_SESSION['userCpf'] ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['userEmail'] ?>" required><br>

       

        <input type="submit" name="editar_usuario" value="Salvar">
    </form>

    <div class="back-button">
        <form action="../index.php">
            <input type="submit" value="Voltar">
        </form>
    </div>
</body>
</html>
