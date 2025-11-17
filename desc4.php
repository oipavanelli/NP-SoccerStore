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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição do Produto</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css-desc/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
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
                <li><a href="mailto:npsoccerstore@gmail.com">Contato</a></li>
                <?php if (isset($_SESSION['userLogado']) && $_SESSION['conta'] == 1) { ?>
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
                        
                            <i class="fas fa-user icon-cadastro"></i>
                        
                    </button>
                    <ul class="dropdown-menu">
                        <h4 class="m-3">Olá, <span class="cor-texto-usuario-boneco"><?php echo $_SESSION['userUsuario'] ?></span></h4>
                        <li><a class="dropdown-item" href="funcionalidades/minha-conta.php"><i class="fa-solid fa-gears"></i> &nbsp;Sua Conta</a></li>
                        <li><a class="dropdown-item text-danger" href="?logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;Sair da conta</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <a href="funcionalidades/cadastro-login.php">
                    <i class="fas fa-user icon-cadastro">
                    </i>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="line">

    </div>
    </div>
<div class="product">
    <div class="product-images">
        <img src="img/7581945f.jpg" alt="Imagem 1">
        <img src="img/BOT2.jpg" alt="Imagem 2">
        <img src="img/BOT1.jpg" alt="Imagem 3">
        <img src="img/BOT3.jpg" alt="Imagem 4">
        <img src="img/BOT4.jpeg" alt="Imagem 5">
    </div>

    <div class="product-thumbnails">
        <img src="img/7581945f.jpg" alt="Thumbnail 1">
        <img src="img/BOT2.jpg" alt="Thumbnail 2">
        <img src="img/BOT1.jpg" alt="Thumbnail 3">
        <img src="img/BOT3.jpg" alt="Thumbnail 4">
        <img src="img/BOT4.jpeg" alt="Thumbnail 5">
    </div>
</div>
    
    <div class="product-description" style="margin-top:-527px; margin-left:770px;">
        <h2>Camisa Botafogo<br>Edição Goleiro 22-23</h2>
        <h4>R$ 169,90</h4>
        <h6 style="margin-top:-10px;">ou 5x de R$ 33,98</h6>
        Selecione o tamanho:
        <div class="product-sizes">
        <div class="size-option" id="size-M">P</div>
        <div class="size-option" id="size-L">M</div>
        <div class="size-option" id="size-S">G</div>
        <div class="size-option" id="size-M">GG</div>
        
    </div>
        <a href="#" id="back-button">Adicionar ao carrinho</a>
    </div>
    <div class="product-info">
        <!-- Conteúdo da informação do produto -->
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2023 Sua Loja de Artigos Esportivos</p>
        </div>
    </footer>
    <script>
        
         const productImages = document.querySelectorAll('.product-images img');
        const productThumbnails = document.querySelectorAll('.product-thumbnails img');
        const backButton = document.getElementById('back-button');

        // Exibir a primeira imagem no carrossel.
        productImages[0].style.display = 'block';

        productThumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                // Esconder todas as imagens do carrossel.
                productImages.forEach(image => (image.style.display = 'none'));

                // Exibir a imagem correspondente à miniatura clicada.
                productImages[index].style.display = 'block';
            });
        });
        const sizeOptions = document.querySelectorAll('.size-option');

        sizeOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Remover a classe 'selected' de todos os tamanhos
                sizeOptions.forEach(option => option.classList.remove('selected'));
                // Adicionar a classe 'selected' apenas ao tamanho selecionado
                option.classList.add('selected');
            });
        });
        backButton.addEventListener('click', () => {
            // Você pode adicionar a ação de voltar para a página anterior aqui.
        });
       
    </script>
</body>
</html>