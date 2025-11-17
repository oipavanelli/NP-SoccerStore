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

// Consulta para recuperar todos os registros da tabela
$query = "SELECT id, nomeprod, descricao, valor, imagem FROM tb_produtos WHERE codigo = 5 ";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao recuperar dados do banco de dados: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css-categorias/style.css">
    <style>
.back-button {
    background-color: #555;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: -10px;
}

.back-button:hover {
    background-color: #777;
}
.report-button {
    background-color:#1f7d21;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 10px;
    display:flex;
   
}

.report-button:hover {
    background-color: #777;
}
    </style>
    <title>Página de Produtos - Conjuntos</title>
    <script>
        // Função para editar a camisa
        function editarCamisa(camisaId) {
            // Redirecionar para a página de edição com o ID fornecido
            window.location.href = "prod-editar.php?id=" + camisaId;
        }

        // Função para excluir a camisa
        function excluirCamisa(camisaId) {
            if (confirm("Tem certeza de que deseja excluir esta camisa?")) {
                // Redirecionar para a página de exclusão com o ID fornecido
                window.location.href = "prod-excluir.php?id=" + camisaId;
            }
        }

        // Função para abrir a página de descrição do produto
        function abrirPaginaDescricao(event) {
            var paginaDescricao = event.currentTarget.getAttribute("data-pagina");
            if (paginaDescricao) {
                window.open(paginaDescricao, "_blank");
            }
        }

        // Adiciona o evento de clique em todos os elementos com a classe "product"
        window.addEventListener("DOMContentLoaded", function () {
            var products = document.getElementsByClassName("product");
            for (var i = 0; i < products.length; i++) {
                products[i].addEventListener("click", abrirPaginaDescricao);
            }
        })
        function exibirImagem(imagemNome) {
            var preview = document.getElementById("imagemPreview");
            preview.src = imagemNome;
        }
    </script>
</head>
<body>
<div class="header2">
        <div class="menu">
            <a href="adm.php">
                <div class="logo">
                    <img src="../img/logo-adm.png" alt="Logo da Loja">
                </div>
            </a>

            <ul>
                <li class="parent"><a href="cad-localizar.php">Localizar Usuários</a></li>
                <li class="parent"><a href="#">Todos os Produtos</a>
                    <ul class="submenu-content">
                        <li><a href="luvas-localizar.php">Luvas</a></li>
                        <li><a href="bola-localizar.php">Bolas</a></li>
                        <li><a href="conj-localizar.php">Conjuntos</a></li>
                        <li><a href="calc-localizar.php">Calções</a></li>                        
                        <li><a href="prod-localizar.php">Camisas</a></li>
                        <li><a href="chut-localizar.php">Chuteiras</a></li>                        
                        <li><a href="garr-localizar.php">Garrafas</a></li>
                        <li><a href="cane-localizar.php">Caneleiras</a></li>
                    </ul>
                </li>
                <li class="parent"><a href="prod-cadastro.php">Cadastrar Produtos</a></li>
                <li class="parent"><a href="relatorio-tudo.php">Abrir Relatórios</a>
                    <ul class="submenu-content">
                        <li><a href="relatorio-usuarios.php">Usuários</a></li>
                        <li><a href="relatorio-produtos.php">Produtos</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>

       

        
        <div class="line">
            
        </div>
    </div>
    <header>
    </header>
<center>
<h1>Conjuntos</h1>
</center>
<div class="product-container">
<?php

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $nomeprod = $row['nomeprod'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $imagemNome = $row['imagem'];

    
    echo '<div class="product">'; /* data-pagina="produtos.php" -- Para quando clicar ir para a página aonde estiver o produto*/
    echo '<h4>ID: ' . $id . '</h4>';
    echo '<div class="baiano">';
    echo '<img src="../img/' . $imagemNome . '" alt="' . $nomeprod . '" style="margin-left: 30px;">';
    echo '</div>';
    echo '<h2>' . $nomeprod . '</h2>';
    echo '<p>' . $descricao . '</p>';
    echo '<p>Preço: ' . $valor . '</p>';
    echo '<button onclick="editarCamisa(' . $id . ')">Editar</button>';
    echo '<button onclick="excluirCamisa(' . $id . ')">Excluir</button>';
    
    echo '</div>';
}


?>
</div>
</body>
    
</html>
<?php
// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
