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

// Função para evitar injeção de SQL
function limparEntrada($entrada) {
    global $conn;
    return mysqli_real_escape_string($conn, $entrada);
}

// Verificar se um ID de registro foi fornecido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = limparEntrada($_GET['id']);

    // Preparar e executar a consulta SQL para inativar o registro
    $sql = "UPDATE tb_comprador SET status = '0' WHERE id = ?";

    
    // Preparar a instrução
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Vincular o ID como um parâmetro
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Executar a consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "<h2>Registro Ativado com sucesso</h2>";
        } else {
            echo "Erro ao inativar o registro: " . mysqli_error($conn);
        }

        // Fechar a instrução preparada
        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ativar Registro</title>
</head>
<body>
    <form action="adm.php">
        <br>
        <input type="submit" value="Voltar">
    </form>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
