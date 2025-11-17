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

// Consulta para recuperar todos os registros da tabela de usuários
$query = "SELECT id, usuario, cpf, email, contadeacesso, status FROM tb_comprador ORDER BY 
    CASE
        WHEN contadeacesso = '1' THEN 1  -- Administradores
        WHEN status = '0' THEN 2  -- Usuários ativos
        ELSE 3                          -- Usuários inativos
    END";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao recuperar dados do banco de dados: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css-prod-localizarr/style.css">
    <style>
        .inativo {
            background-color: #f2f2f2; /* Cor de fundo para inativos */
            color: #999; /* Cor de texto para inativos */
        }
        .ativo {
            background-color: #ffffff; /* Cor de fundo para ativos */
            color: #000; /* Cor de texto para ativos */
        }
        .admin {
            background-color: #e6ffe6; /* Cor de fundo para administradores ativos */
            color: #006600; /* Cor de texto para administradores ativos */
        }
    
    </style>
    <title>Página de Usuários</title>
    <script>

        // Função para inativar o usuário
        function inativarUsuario(usuarioId) {
            if (confirm("Tem certeza de que deseja inativar este usuário?")) {
                // Redirecionar para a página de exclusão com o ID fornecido
                window.location.href = "cad-inativar.php?id=" + usuarioId;
            }
        }

        // Função para ativar o usuário
        function ativarUsuario(usuarioId) {
            if (confirm("Tem certeza de que deseja ativar novamente este usuário?")) {
                // Redirecionar para a página de exclusão com o ID fornecido
                window.location.href = "cad-ativar.php?id=" + usuarioId;
            }
        }

        // Função para abrir a página de descrição do usuário
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
        });
    </script>
</head>
<body>
<header class="center">
        PAGINA ADM
    </header>
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
                <li class="parent"><a href="#">Abrir Relatórios</a>
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
    <!--<a href="adm.php">Página ADM</a>
   
    
    
        <div class="dropdown">
            <a href="produtos-tudo.php">Todos os Produtos</a>
        </div>

        <div class="dropdown">
            <a href="relatorio-tudo.php">Abrir Relatórios</a>
        </div>
        
        <a href="../index.php">Página Inicial</a>-->
</header>
<center>
<h1>USUÁRIOS</h1>
</center>
<div class="product-container">
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $usuario = $row['usuario'];
    $cpf = $row['cpf'];
    $email = $row['email'];
    $contadeacesso = $row['contadeacesso']; // Renomeie de 'status' para 'contadeacesso'
    $status = $row['status'];

    // Verifique a variável $contadeacesso e defina a classe com base nela
    $statusClass = '';
    if ($contadeacesso == '1') {
        $statusClass = 'admin';
    } elseif ($status == '1') {
        $statusClass = 'inativo';
    } else {
        $statusClass = 'ativo';
    }

    echo '<div class="product ' . $statusClass . '">';

    echo '<h2>ID: ' . $id . '</h2>';
    echo '<p>' . $usuario . '</p>';
    echo '<p>CPF: ' . $cpf . '</p>';
    echo '<p>Email: ' . $email . '</p>';

    // Verifique se a conta é de um administrador antes de exibir o botão "Inativar"
    if ($contadeacesso != '1') {
        if ($status == '1') {
            echo '<button onclick="ativarUsuario(' . $id . ')">Ativar</button>';  
        } else {
            echo '<button onclick="inativarUsuario(' . $id . ')">Inativar</button>';
        }
    }

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
