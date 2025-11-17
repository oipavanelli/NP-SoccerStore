<?php
include('funcionalidades/sessao.php');

$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'npsoccerstore';

$conn = mysqli_connect($host, $usuario, $senha, $bancodedados);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id, nomeprod, descricao, valor, imagem FROM tb_produtos WHERE codigo = 2 AND id IN (4, 5 ,6) ORDER BY FIELD(id, 13, 16, 15)";
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
    <title>NP Soccer Store</title>
    <link rel="stylesheet" type="text/css" href="css-index/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        <div class="line">
            
        </div>
    </div>

    <div class="carousel">
        <div class="slide">
            <a href="desc7.php">
                <img src="img/1bd4a1b1.jpg" alt="Slide 1">
                <div class="descricao-produto">
                    <h3>Camisa Vasco da Gama 21-22</h3>
                    <p>Camisa Vasco da Gama Edição Especial 21-22</p>
                    <button class="ver-mais-button" onclick="verMais(1)">Ver Mais</button>
                </div>
            </a>
        </div>
        <div class="slide">
            <a href="desc21.php">
                <img src="img/ff97d9eb.jpg" alt="Slide 2">
                <div class="descricao-produto">
                    <h3>Camisa Fluminense 12-13</h3>
                    <p>Camisa Fluminense Edição Retro 12-13</p>
                    <button class="ver-mais-button" onclick="verMais(2)">Ver Mais</button>
                </div>
            </a>
        </div>
        <div class="slide">
            <a href="desc6.php">
                <img src="img/409722d2.jpg" alt="Slide 3">
                <div class="descricao-produto">
                    <h3>Camisa Internacional 22-23</h3>
                    <p>Camisa Internacional Edição II 22-23</p>
                    <button class="ver-mais-button" onclick="verMais(3)">Ver Mais</button>
                </div>
            </a>
        </div>
        <div class="prev">&#8249;</div>
        <div class="next">&#8250;</div>
    </div>

    <section class="produtos-destaque">
        <div class="container">
            <h2>Produtos em Destaque</h2>
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

                        echo '<div class="produto" data-page="' . $abrirDescricao . '">';
                        echo '<img src="img/' . $imagemNome . '" alt="' . $nomeprod . '" style="margin-left: 3px;" onclick="exibirImagem(\'img/' . $imagemNome . '\')">';
                        echo '<h3>' . $nomeprod . '</h3>';
                        echo '<p>' . $descricao . '</p>';
                        echo '<span class="preco">' . $valor . '</span>';
                        echo '<button class="comprar-button" data-page="' . $abrirDescricao . '">Comprar</button>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum produto em destaque encontrado.";
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Sua Loja de Artigos Esportivos</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll(".slide");
        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        function showSlide() {
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.style.display = "block";
                } else {
                    slide.style.display = "none";
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide();
        }

        prevButton.addEventListener("click", prevSlide);
        nextButton.addEventListener("click", nextSlide);

        showSlide();

        function verMais(numeroProduto) {
            window.location.href = `desc${numeroProduto}.php`;
        }

        const produtosDestaque = document.querySelectorAll(".produto");

        produtosDestaque.forEach((produto, index) => {
            produto.addEventListener("click", () => {
                const numeroProduto = index + 1;
                window.location.href = `desc${numeroProduto}.php`;
            });
        });

        function editarDescricao(numeroProduto) {
            const nomeProduto = document.getElementById(`nomeProduto${numeroProduto}`);
            const descricaoProduto = document.getElementById(`descricaoProduto${numeroProduto}`);

            const novoNome = prompt("Novo nome do produto: ");
            const novaDescricao = prompt("Nova descrição do produto:");

            if (novoNome !== null && novaDescricao !== null) {
                nomeProduto.textContent = novoNome;
                descricaoProduto.textContent = novaDescricao;
            }
        }

        const barraBusca = document.getElementById("barraBusca");
        const botaoPesquisa = document.getElementById("botaoPesquisa");

        botaoPesquisa.addEventListener("click", () => {
            const termoBusca = barraBusca.value;
            if (termoBusca.trim() !== "") {
                window.location.href = `resultados-de-busca.php?termo=${termoBusca}`;
            }
        });

        const formPesquisa = document.getElementById("formPesquisa");
        formPesquisa.addEventListener("submit", (event) => {
            const termoBusca = barraBusca.value;
            if (termoBusca.trim() === "") {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>