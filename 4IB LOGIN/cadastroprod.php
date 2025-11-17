<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tabs-container {
            max-width: 420px;
            margin-left: 750px;
            justify-content: space-between;
            display: grid;
        }

        .tab {
            flex-basis: 45%;
            display: none;
        }

        .tab.active {
            display: block;
        }

        .tab-content {
            background-color: #fff;
            padding: 25px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tab-content2 {
            margin-top: 50px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: ;
        }

        .toggle-button:hover {
            color: #0000FF;
        }

        .tabs-nav {
            list-style-type: none;
            margin-right: px;
            margin: 35px;
        }

        .tabs-nav li {
            display: inline-block;
            margin-right: 10px;
            padding: 5px;
            border-radius: 3px;
            background-color: #eee;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tabs-nav li.active {
            background-color: #ddd;
        }

        .tabs-nav li:hover {
            background-color: #ccc;
        }

        .menu-text {
            margin-top: 10px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }

        .tlogin {
            text-align: center;
            font-family: Arial;
            color: #1df68d;
        }

        .utton {
            margin-left: px;
            margin-top: -100px;
        }

        input[type="file"] {
            display: ;
            color: ;
        }
    </style>
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
    <img src="n.png" alt="Imagem de login" width="650px" style="float: left; margin-top: 65px;">
    <div class="tabs-container">
        <div id="login-tab" class="tab active">
            <div class="tab-content2">
                <div class="tab-content">
                    <form method="POST" action="gravarprod.php" enctype="multipart/form-data">
                        <h2>
                            <div class="tlogin">
                                <label> Tela de PRODUTOS </label>
                            </div>
                        </h2>
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
    <a href="admininical.php">Voltar</a>
</div>
                    </form>
                </div>
            </div>
        </div>
        <p class="menu-text">Ao fazer login na minha conta, concordo com os Termos e Condições e a Política de Privacidade da NP Soccer Store</p>
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
            $encryptedImage = encryptImage($_FILES['imagem']['tmp_name'], $key);

            // Insira os dados no banco de dados usando instruções preparadas
            $stmt = $conn->prepare("INSERT INTO produtos (nomeprod, descricao, valor, imagem) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $nomeprod, $descricao, $valor, $encryptedImage);

            if ($stmt->execute()) {
                echo "Produto cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o produto: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Tipo de arquivo não suportado. Por favor, envie uma imagem válida.";
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>