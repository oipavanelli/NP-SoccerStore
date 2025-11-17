<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];

    // Conexão com o banco de dados (substitua com suas próprias informações)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "npsoccerstore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Prepara a imagem para armazenamento no banco de dados
    $imagem_binaria = file_get_contents($imagem_temp);
    $imagem_binaria = $conn->real_escape_string($imagem_binaria);

    // Insere a imagem no banco de dados
    $sql = "INSERT INTO imagens (nome, imagem) VALUES ('$imagem', '$imagem_binaria')";

    if ($conn->query($sql) === TRUE) {
        echo "Imagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar imagem: " . $conn->error;
    }

    $conn->close();
}
?>
