<!-- descricao_produto.php -->
<?php
include('funcionalidades/sessao.php');

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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta para recuperar informações do produto com base no ID
    $query = "SELECT nomeprod, descricao, valor, imagem FROM tb_produtos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nomeprod = $row['nomeprod'];
        $descricao = $row['descricao'];
        $valor = $row['valor'];
        $imagemNome = $row['imagem'];
    } else {
        // Produto não encontrado, você pode lidar com isso adequadamente
        $nomeprod = "Produto não encontrado";
        $descricao = "Desculpe, o produto não está disponível.";
        $valor = "N/A";
        $imagemNome = "imagem_padrao.jpg";
    }
} else {
    // Se o ID do produto não for especificado na URL, você pode redirecionar para uma página de erro ou fazer algo apropriado.
    header("Location: pagina_de_erro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Descrição do Produto</title>
  <!-- Seus estilos e scripts aqui -->
</head>
<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>
    <div class="header2">
        <!-- Seu menu aqui -->
    </div>
    <div class="descricao-produto">
        <img src="img/<?php echo $imagemNome; ?>" alt="<?php echo $nomeprod; ?>">
        <h1><?php echo $nomeprod; ?></h1>
        <p><?php echo $descricao; ?></p>
        <span class="preco"><?php echo $valor; ?></span>
    </div>
  </body>
</html>
