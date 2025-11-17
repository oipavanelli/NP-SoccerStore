<?php 
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

// Estabelecer a conexão com o banco de dados usando a extensão MySQLi
$conn = mysqli_connect($host, $usuario, $senha, $bancodedados);
//$pdo = new PDO('mysql:host=localhost;dbname=npsoccerstore', 'root', '');

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verificar se os campos obrigatórios estão preenchidos
if (isset( $_POST['nomeprod'], $_POST['descricao'], $_POST['valor'], $_POST['codigo'], $_FILES['imagem'])) {
    // Obter informações sobre a imagem enviada
    $imagem = $_FILES['imagem'];
   
    // Verificar se o upload da imagem foi bem-sucedido
    if ($imagem['error'] === UPLOAD_ERR_OK) {
        // Nome original da imagem
        $originalFileName = $imagem['name'];
        
        // Caminho para salvar a imagem (ajuste conforme necessário)
        $uploadPath = 'C:\xampp\htdocs\4IBNOVO\img/' . $originalFileName; 
        
        // Mover a imagem para o local desejado
        if (move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
            // Escapar e obter outros valores do formulário
            
            $nomeprod = mysqli_real_escape_string($conn, $_POST['nomeprod']);
            $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
            $valor = mysqli_real_escape_string($conn, $_POST['valor']);
            $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
            
            
            // Somente o nome do arquivo
            $imagemNome = $originalFileName;
            
            // Preparar e executar a consulta SQL para inserção de dados
            $sql = "INSERT INTO tb_produtos (imagem, nomeprod, descricao, valor, codigo) VALUES ('$imagemNome', '$nomeprod', '$descricao', '$valor', '$codigo')";

            $sql2 = "INSERT INTO tb_estoque (imagem, nomeprod, descricao, valor, codigo, estoque) VALUES ('$imagemNome', '$nomeprod', '$descricao', '$valor','$codigo',1)";
            
            if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
                echo "Dados gravados com sucesso";
                
                // Redirecionar para a página de administração após o sucesso
                header("Location: adm.php");
                exit(); // Certifique-se de sair após o redirecionamento
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Erro ao mover a imagem para o diretório de upload.";
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
    
    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
} else {
    echo "Erro: Campos obrigatórios não preenchidos.";
}
?>