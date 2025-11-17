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

    // Preparar e executar a consulta SQL para excluir o registro
    $sql = "DELETE FROM tb_produtos WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Registro excluído com sucesso</h2>";
    } else {
        echo "Erro ao excluir o registro: " . mysqli_error($conn);
    }
}

// Consulta para recuperar todos os registros da tabela
$query = "SELECT id, nomeprod, descricao, valor FROM tb_produtos";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao recuperar dados do banco de dados: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Registro</title>
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
