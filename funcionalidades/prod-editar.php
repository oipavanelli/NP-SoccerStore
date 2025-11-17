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

// Inicializar variáveis para armazenar os valores do registro a ser editado
$id = 0;
$nomeprod = "";
$descricao = "";
$valor = "";
$imagemNome = "";

// Verificar se um ID de registro foi fornecido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = limparEntrada($_GET['id']);

    // Consulta SQL para obter os dados do registro a ser editado
    $sql = "SELECT nomeprod, descricao, valor, imagem FROM tb_produtos WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $nomeprod = $row['nomeprod'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $imagemNome = $row['imagem'];
        } else {
            echo "Registro não encontrado.";
        }
    } else {
        echo "Erro ao buscar registro: " . mysqli_error($conn);
    }
}

// Processar a atualização do registro quando o formulário for enviado
if (isset($_POST['editar_registro'])) {
    $nomeprod = limparEntrada($_POST['nomeprod']);
    $descricao = limparEntrada($_POST['descricao']);
    $valor = limparEntrada($_POST['valor']);

    // Verificar se uma nova imagem foi enviada
    if ($_FILES['nova_imagem']['error'] === UPLOAD_ERR_OK) {
        // Remover a imagem atual (opcional)
        if (!empty($imagemNome) && file_exists("C:\xampp\htdocs\4IBNOVO\img/" . $imagemNome)) {
            unlink("C:\xampp\htdocs\4IBNOVO\img/" . $imagemNome);
        }

        // Processar a nova imagem
        $novaImagem = $_FILES['nova_imagem'];
        $originalFileName = $novaImagem['name'];
        $uploadPath = 'C:\xampp\htdocs\4IBNOVO\img/' . $originalFileName;

        if (move_uploaded_file($novaImagem['tmp_name'], $uploadPath)) {
            $imagemNome = $originalFileName;
        } else {
            echo "Erro ao mover a nova imagem para o diretório de upload.";
        }
    }

    // Atualizar o registro no banco de dados
    $sql = "UPDATE tb_produtos SET nomeprod = '$nomeprod', descricao = '$descricao', valor = '$valor', imagem = '$imagemNome' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Registro atualizado com sucesso</h2>";
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
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
    <h2>Editar Registro</h2>
    <form method="POST" action="prod-editar.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <label for="nomeprod">Nome do Produto:</label>
        <input type="text" name="nomeprod" value="<?php echo $nomeprod; ?>" required><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?php echo $descricao; ?></textarea><br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="<?php echo $valor; ?>" required><br>

        <label for="nova_imagem">Nova Imagem:</label>
        <input type="file" name="nova_imagem" accept="image/*" onchange="previewImage(this)"><br>

        <h2>IMAGEM NOVA</h2>
        <img id="imagemPreview" src="" alt="Imagem" style="max-width: 300px; max-height: 300px;">

        <?php
        if (!empty($imagemNome) && file_exists("../img/" . $imagemNome)) {
            echo '<h2>IMAGEM ATUAL</h2><img src="../img/' . $imagemNome . '" alt="Imagem Atual"><br>';
        } else {
            echo 'Imagem atual não encontrada. Verifique o caminho e o nome do arquivo.<br>';
        }
        ?>

        <input type="submit" name="editar_registro" value="Salvar">
    </form>

    <div class="back-button">
        <form action="adm.php">
            <input type="submit" value="Voltar">
        </form>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagemPreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
            }
        }
    </script>
</body>
</html>
