<?php
include('sessao.php');

$statusUsuario = '0'; // Substitua isso pela lógica real de verificação de status

if ($statusUsuario === '1') {
    header('Location: aviso-inatividade.php');
    exit;
}

$contadeacesso = 1; // Defina um valor padrão


// Conexão com o banco de dados (substitua pelos seus detalhes de conexão)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "npsoccerstore";

// Crie uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para verificar se há pelo menos uma conta com contadeacesso = 1
$sql = "SELECT COUNT(*) as count FROM tb_comprador WHERE contadeacesso = 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contadeacesso = $row['count'];
    }
}

$conn->close();
if (!isset($_SESSION['userLogado'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css-cadastro1/style.css">
    <script>
        function switchForm() {
            var loginTab = document.getElementById("login-tab");
            var cadastroTab = document.getElementById("cadastro-tab");
            var createAccountButton = document.getElementById("create-account-button");
            var createAdminButton = document.getElementById("create-admin-button");

            if (loginTab.classList.contains("active")) {
                loginTab.classList.remove("active");
                cadastroTab.classList.add("active");
                createAccountButton.textContent = "Voltar para Login";
                createAdminButton.style.display = "none";
            } else {
                loginTab.classList.add("active");
                cadastroTab.classList.remove("active");
                createAccountButton.textContent = "Criar Conta";
                createAdminButton.style.display = "inline-block";
            }
        }

        
        
    


    </script>
</head>
<body>
<header class="center">
        Frete grátis a partir de R$299,99
    </header>
    <div class="header2">
        <div class="menu">
            <a href="../index.php">
                <div class="logo">
                    <img src="../img/logo.png" alt="Logo da Loja">
                </div>
            </a>
            <ul>
                <li class="parent"><a href="#">Vestuário</a>
                    <ul class="submenu-content">
                        <li><a href="../produtos-conjuntos.php">Conjuntos</a></li>
                        <li><a href="../produtos-calções.php">Calções</a></li>
                        <li><a href="../produtos-chuteiras.php">Chuteiras</a></li>
                        <li><a href="../produtos.php">Camisas</a></li>
                                                
                    </ul>
                </li>
                <li class="parent"><a href="#">Itens</a>
                    <ul class="submenu-content">
                        <li><a href="../produtos-garrafas.php">Garrafas</a></li>
                        <li><a href="../produtos-bolas.php">Bolas</a></li>
                        <li><a href="../produtos-caneleiras.php">Caneleiras</a></li>
                        <li><a href="../produtos-luvas.php">Luvas</a></li>
                    </ul>
                </li>
                <li><a href="mailto:npsoccerstore@gmail.com">Contato</a></li>
                <?php if (isset($_SESSION['userLogado']) && $_SESSION['conta'] == 1) { ?>
                    <li> <a href="funcionalidades/adm.php">ADM</a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="barra-pesquisa-div">
            <input type="" id="barraBusca" class="barra-busca" placeholder="Pesquisar...">
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
                <a href="cadastro-login.php">
                    <i class="fas fa-user icon-cadastro">
                    </i>
                </a>
            <?php } ?>
        </div>
        <div class="line">
            
        </div>
    </div>

    <!--<img src="../img/log.png" alt="Imagem de login" width="700px" style="float: left; margin-top:65px;">-->
    <div class="tabs-container">
        <div id="login-tab" class="tab active">
            <div class="tab-content2">
                <div class="tab-content">
                    <form method="POST" action="cad-verificar.php">
                        <h2>
                            <div class="tlogin">
                                <label> Tela de Login </label>
                            </div>
                        </h2>
                        <br>
                        <label for="login-usuario">Usuário</label>
                        <input type="text" id="usuario" name="usuario" required>
                        <br>
                        <label for="login-senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                        <br><br>
                        <input type="submit" class="entrar-button" value="Entrar">
                        <input type="submit" id="create-account-button" class="button-link2" 
                        type="button" value="Criar Conta"onclick="switchForm()"></button>   
                    </form>
                </div>
            </div>   
        </div>
        <div id="cadastro-tab" class="tab">
            <div class="tab-content3">
                <form method="POST" action="cad-gravar.php">
                    <h3>
                        <div class="tlogin">
                            <label> Tela de Cadastro </label>
                        </div>
                    </h3>
                    <br>
                    <label for="usuário">Usuário</label>
                    <input type="text" id="usuário" name="usuario" required>
                    <br>
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" maxlenth="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                    <br>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <br>
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                    <br>
                    <label for=""></label>
                    <input type="text" id="contadeacesso" name="contadeacesso" hidden>
                    <br>
                    <input type="submit" class="cadastrar-button" value="Cadastrar">
                    <button id="create-account-button" class="button-link" type="button" onclick="switchForm()">Voltar para Login</button>
                </form>
            </div>
        </div>
        <p class="menu-text">Ao fazer login na minha conta, concordo com os Termos e Condições e a Política de Privacidade da NP Soccer Store</p>
    </div>
        <div class="bai">
        <?php if ($contadeacesso == 0) { ?>
            <form method="POST" action="adm-cadastro.php">
                <input type="submit" id="create-admin-button" class="create-admin-button" value="Criar Admin">
            </form>
        <?php } ?>
    </div>
</body>
</html>

<?php } ?>