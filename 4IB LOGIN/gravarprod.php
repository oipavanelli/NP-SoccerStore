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

// Verificar se os campos obrigatórios estão preenchidos
if (isset($_POST['nomeprod'], $_POST['descricao'], $_POST['valor'],  $_FILES['imagem'])) {
    // Obter informações sobre a imagem enviada
    $imagem = $_FILES['imagem'];
   
    // Verificar se o upload da imagem foi bem-sucedido
    if ($imagem['error'] === UPLOAD_ERR_OK) {
        // Nome original da imagem
        $originalFileName = $imagem['name'];
        
        // "Criptografar" o nome do arquivo (usando MD5 como exemplo)
        $encryptedFileName = md5($originalFileName);
        
        // Caminho para salvar a imagem (ajuste conforme necessário)
        $uploadPath = 'C:/wamp642/www/4IB/' . $encryptedFileName; 
        
        // Mover a imagem para o local desejado
        if (move_uploaded_file($imagem['tmp_name'], $uploadPath)) {
            // Escapar e obter outros valores do formulário
            $nomeprod = mysqli_real_escape_string($conn, $_POST['nomeprod']);
            $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
            $valor = mysqli_real_escape_string($conn, $_POST['valor']);
            
            // Somente o nome do arquivo
            $imagemNome = $encryptedFileName;
            
            // Preparar e executar a consulta SQL para inserção de dados
            $sql = "INSERT INTO produtos (imagem, nomeprod, descricao, valor) VALUES ('$imagemNome', '$nomeprod', '$descricao', '$valor')";
            
            if (mysqli_query($conn, $sql)) {
                echo "Dados gravados com sucesso";
                
                // Redirecionar para a página de administração após o sucesso
                header("Location: admininical.php");
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
