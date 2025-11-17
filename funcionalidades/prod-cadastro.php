<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css-cadastroprod1/style.css">
    <script>
        function exibirImagem() {
            var input = document.getElementById("imagem");
            var preview = document.getElementById("imagemPreview");

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function formatCurrency(input) {
            var value = input.value;

            value = value.replace(/\D/g, '');

            if (value.length > 0) {
                value = parseFloat(value) / 100;
                value = value.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL',
                    minimumFractionDigits: 2
                });
            } else {
                value = "R$ 0,00";
            }

            input.value = value;
        }
    </script>
</head>

<body>
    <img src="../img/logo-adm.png" alt="Imagem de login" width="650px" style="float: left; margin-top: 4x5px;">
    <div class="tabs-container">
            <div class="tab-content2">
                <div class="tab-content">
                    <form method="POST" action="prod-gravar.php" enctype="multipart/form-data">
                        <h2>
                            <div class="tlogin">
                                <label> Tela de PRODUTOS </label>
                            </div>
                        </h2>

                        <div class="containert">
                            <div class="column">
                                <div class="radiob">
                                    <input type="radio" id="bola" name="codigo" value="1">
                                    <label for="bola">Bola</label>
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="camisa" name="codigo" value="2">
                                    <label for="camisa" >Camisa</label> 
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="chuteiras" name="codigo" value="3">
                                    <label for="chuteiras">Chuteiras</label>
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="luvas" name="codigo" value="4">
                                    <label for="luvas">Luvas</label>
                                </div> 
                            </div>                           
                            <div class="column">                                
                                <div class="radiob">
                                    <input type="radio" id="conjunto" name="codigo" value="5">
                                    <label for="conjunto">Conjunto</label>
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="calcoes" name="codigo" value="6">
                                    <label for="calcoes">Calções</label>
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="garrafas" name="codigo" value="7">
                                    <label for="garrafas">Garrafas</label>
                                </div>
                                <div class="radiob">
                                    <input type="radio" id="caneleiras" name="codigo" value="8">
                                    <label for="caneleiras">Caneleiras</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <label for="imagem">Imagem</label>
                        <input type="file" name="imagem" id="imagem" onchange="exibirImagem()" required>
                        <br>
                        <br>
                        <img id="imagemPreview" src="" alt="Imagem" style="max-width: 300px; max-height: 300px;">
                        <br><br><br><br>
                        <label for="nomeprod">Nome</label>
                        <input type="text" id="nomeprod" name="nomeprod" required>
                        <label for="descricao">Descrição</label>
                        <input type="text" id="descricao" name="descricao" required>
                        <br>
                        <label for="valor">Valor:</label>
                        <input type="text" id="valor" name="valor" oninput="formatCurrency(this)" onblur="removeCurrencyMask(this)" value="R$ 0,00"><br>
                        <br>
                        <div class="button-container">
                        <input type="submit" value="Cadastrar Produto">
                        <a href="adm.php">Voltar</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
</body>
</html>

<?php
// Função para criptografar a imagem
function encryptImage($imagePath, $key)
{
    $plainText = file_get_contents($imagePath);
    $cipherText = openssl_encrypt($plainText, 'aes-256-cbc', $key, 0, $key);
    return base64_encode($cipherText);
}

// Função para descriptografar a imagem
function decryptImage($encryptedImage, $key)
{
    $cipherText = base64_decode($encryptedImage);
    $plainText = openssl_decrypt($cipherText, 'aes-256-cbc', $key, 0, $key);
    return $plainText;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar ao banco de dados (substitua com suas credenciais)
    $conn = new mysqli("localhost", "root", "", "npsoccerstore");

    // Verifique se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verifique se foi enviado um arquivo de imagem
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Verifique se o arquivo é uma imagem (você pode melhorar isso)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($fileInfo, $_FILES['imagem']['tmp_name']);
        finfo_close($fileInfo);

        if (in_array($fileType, $allowedTypes)) {
            $key = 'cc0ffba3e54ee1a17643a916b1ce0734';

            $nomeprod = $conn->real_escape_string($_POST['nomeprod']);
            $descricao = $conn->real_escape_string($_POST['descricao']);
            $valor = floatval(str_replace(',', '.', str_replace('R$ ', '', $_POST['valor'])));
            $id_produtos = $_POST['id_produtos'];
            $encryptedImage = encryptImage($_FILES['imagem']['tmp_name'], $key);

            /*
            // Insira os dados no banco de dados usando instruções preparadas
            $stmt = $conn->prepare("INSERT INTO tb_estoque (nomeprod, descricao, valor, imagem, id_produtos) VALUES (?, ?, ?, ?, ?)");
            // Cria mais uma Query que nem essa de cima aqui em baixo, com as mesmas informações, só muda o nome da tabela:
            $stmt2 = $conn->prepare("INSERT INTO tb_produtos (nomeprod, descricao, valor, imagem, id_produtos) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssds", $nomeprod, $descricao, $valor, $id_produtos, $encryptedImage);
            $stmt2->bind_param("ssds", $nomeprod, $descricao, $valor, $id_produtos, $encryptedImage);

            if ($stmt->execute()) {
                echo "Produto cadastrado com sucesso!";
                
            }else {
                echo "Erro ao cadastrar o produto: " . $stmt->error;
            }

            $stmt->close();
            */stmt->close();
        } else {
            echo "Tipo de arquivo não suportado. Por favor, envie uma imagem válida.";
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>