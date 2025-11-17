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

// Consulta para recuperar todos os registros da tabela
$query = "SELECT id, nomeprod, descricao, valor, imagem FROM tb_produtos WHERE CODIGO = 5";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao executar a consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css-produtos2/style.css">
    <script>
        function abrirPaginaDescricao(event) {
            var paginaDescricao = event.currentTarget.getAttribute("data-page");
            if (paginaDescricao) {
                window.location.href = paginaDescricao;
            }
        }

        window.addEventListener("DOMContentLoaded", function () {
            var products = document.getElementsByClassName("product");
            for (var i = 0; i < products.length; i++) {
                products[i].addEventListener("click", abrirPaginaDescricao);
            }
        });
    </script>
</head>
<body>
    <header class="center">
        
       Frete grátis a partir de R$299,99
       
    </header>
    <div class="header2">
        <div class="menu">
            <a href="index.php">
                <div class="logo">
                    <img src="img/logo.png" alt="Logo da Loja">
                </div>
            </a>
                <ul>
                <li class="parent"><a href="#">Vestuário</a>
                    <ul class="submenu-content">
                        <li><a href="produtos-conjuntos.php">Conjuntos</a></li>
                        <li><a href="produtos-calções.php">Calções</a></li>
                        <li><a href="produtos-chuteiras.php">Chuteiras</a></li>
                        <li><a href="produtos.php">Camisas</a></li>
                                                
                    </ul>
                </li>
                <li class="parent"><a href="#">Itens</a>
                    <ul class="submenu-content">
                        <li><a href="produtos-garrafas.php">Garrafas</a></li>
                        <li><a href="produtos-bolas.php">Bolas</a></li>
                        <li><a href="produtos-caneleiras.php">Caneleiras</a></li>
                        <li><a href="produtos-luvas.php">Luvas</a></li>
                    </ul>
                </li>
                    <li><a href="#">Contato</a></li><?php if (isset($_SESSION['userLogado']) && $_SESSION['conta'] == 1) { ?>
                    <li> <a href="funcionalidades/adm.php">ADM</a></li>
                <?php } ?>
                </ul>

            </div>

        <div class="barra-pesquisa-div">
            <input type="text" id="barraBusca" class="barra-busca" placeholder="Pesquisar...">
            <button id="botaoPesquisa" class="botao-pesquisa">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="menu-itens">
            <a href="#">
                <i class="fas fa-shopping-cart icon-carrinho"></i> 
            </a>
            <?php if (isset($_SESSION['userLogado'])) { ?>
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a href="funcionalidades/cadastro-login.php">
                    <i class="fas fa-user icon-cadastro"></i>
                </a>
                </button>
                <ul class="dropdown-menu">
                    <h4 class="m-3">Olá, <span class="cor-texto-usuario-boneco"><?php echo $_SESSION['userUsuario']?></span></h4>
                    <li><a class="dropdown-item" href="funcionalidades/minha-conta.php"><i class="fa-solid fa-gears"></i> &nbsp;Sua Conta</a></li>
                    <li><a class="dropdown-item text-danger" href="?logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;Sair da conta</a></li>
                    
                </ul>
            </div>
            <?php } 
                  else {
            ?>
                <a href="funcionalidades/cadastro-login.php">
                    <i class="fas fa-user icon-cadastro">                     
                    </i>
                </a>
            <?php } 
            ?>
        </div>
        <div class="line">
        </div>
    </div>
<center><h1>Camisas</h1></center>
<div class="produtos">
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $nomeprod = $row['nomeprod'];
            $descricao = $row['descricao'];
            $valor = $row['valor'];
            $imagemNome = $row['imagem'];
            $abrirDescricao = 'desc' . $id . '.php';

            // Aqui você pode adicionar o HTML para cada produto
            echo '<div class="product" data-page="' . $abrirDescricao . '">';
            echo '<img src="img/' . $imagemNome . '" alt="' . $nomeprod . '" " onclick="exibirImagem(\'img/' . $imagemNome . '\')">';                    
            echo '<h3>' . $nomeprod . '</h3>';
            echo '<p>' . $descricao . '</p>';
            echo '<br>';
            echo '<span class="preco">' . $valor . '</span>';
            echo '';
            echo '</div>';
        }
    } else {
        echo "Nenhum produto em destaque encontrado.";
    }
    ?>
</div>
</body>
</html>
