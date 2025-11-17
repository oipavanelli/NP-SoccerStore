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

// Consulta para recuperar todos os registros da tabela de produtos, incluindo informações de estoque
$query = "SELECT id, nomeprod, descricao, valor, estoque FROM tb_estoque ORDER BY ID ASC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao recuperar dados do banco de dados: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Produtos</title>
</head>
<style> 
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    padding-top: 2px;
}
header {
    background-color:#0094FF;
    color: #FFF;
    padding: 0px 0;
    height: 34px;  
    max-width: 100%;
    position: fixed; /* Torna o cabeçalho fixo no topo */
    width: 100%; /* Faz com que o cabeçalho tenha a largura total */
    top: 0; /* Fixa o cabeçalho no topo da página */
    z-index: 1000; 
    
}
.header2 {
    display: flex;
    align-items: center;
    background-color: #fff;
    color: #fff;
    padding: 0;
    height: 65px;
    margin-top: 34px;
    position: fixed; /* Torna o cabeçalho fixo no topo */
    width: 100%; /* Faz com que o cabeçalho tenha a largura total */
    top: 0; /* Fixa o cabeçalho no topo da página */
    z-index: 1000;
}

.menu-itens {
    display: flex;
    margin-right: 20px;
    column-gap: 9%;
    width: 20%;
    justify-content: flex-end;
    align-items: center;
}
.line  {
    position: fixed; /* Torna a linha fixa no topo */
    width: 103%;
    top: 99px; /* Ajuste a altura em pixels para definir a distância a partir do topo */
    height: 1px; /* Altura da linha */
    background-color: #dcdcdc; /* Cor da linha */
    
}
.logo {
    width: 100px;
    float: left;
    margin-left: 30px;
    margin-top: -9px;
}
.logo img {
    width: 70px;
    height: 60px;
    padding-top: 9px;
}

.menu {
    width: 90%;
    margin-left: 0px;; /* Adicione o espaço à esquerda para acomodar a logo */
    padding-top:1px;
}
.menu ul {
    list-style: none;
    padding: 0;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content:center;
    text-align:center;

}

.menu ul li {
    margin-right: 20px;
    position: relative;
    padding-top: 24px;
}

.menu ul li a {
    color: #000;
    text-decoration: none;
    text-align: center;
    top: 0px;
    font-size: 17px;
}

.menu ul li.parent {
    position: relative;
}

/* Aplique a linha hover apenas ao menu pai */
.menu ul li.parent::before {
    content: "";
    position: absolute;
    bottom: -1px;
    right: 0;
    width: 0;
    height: 3px;
    background-color: #0094FF;
    transition: width 0.3s ease-in-out;
}

.menu ul li.parent:hover::before {
    width: 99%;

}

.submenu-content {

    position: absolute;
    background-color: #fff;
    z-index: 1000;
    padding: 5px;
    top: 110%;
    left: -5px;
    width: 180px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
    display: flex;
    flex-direction: row-reverse;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-start;
}


.menu ul li.parent:hover .submenu-content {
    opacity: 1;
    visibility: visible;
}

.submenu-content a {
    color: #fff; /* Cor do texto no submenu */
    text-decoration: none;
    text-justify: left;
    
}
.submenu-content a::after {
    content: "";
    position: absolute;
    width: 90%;
    height: 1px; /* Ajuste a altura da linha conforme necessário */
    bottom: 0; /* Posiciona a linha abaixo do texto */
    left: 4px;
    background-color: #000; /* Cor da linha */
    transform: scaleX(0); /* Inicialmente, a linha estará oculta */
    transform-origin: center;
}

.submenu-content ul {   
    list-style: none; 
    padding: 0; 
    margin: 0;/* Remova as margens padrão da lista */
    text-align: left;
}

.submenu-content li {   
    width: calc(50% - 10px); /* Duas colunas (50%) com espaço entre elas */
    margin: 0 0px 10px 0;
    display: block; 
}
.submenu-content li:nth-child(2n) {
    margin-right: 0;
}

/* Estilo da tabela de relatório */
table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #ddd;
    margin-top:130px;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #333;
    color: #fff;
}

/* Estilo das linhas pares e ímpares para facilitar a leitura */
table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Estilo dos botões Inativar e Ativar */
button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

/* Estilo do botão de voltar */
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

.report {
    background-color:blue;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 10px;
    display:flex;
   
}

.report:hover {
    background-color: #777;
}


</style>
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
    </header>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Preço</th>
             <!-- Adicionado estoque -->
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nomeprod'] . '</td>';
            echo '<td>' . $row['descricao'] . '</td>';
            echo '<td>' . $row['estoque'] . '</td>'; // Mostra o estoque
            echo '<td>' . $row['valor'] . '</td>';
            
            echo '</tr>';
            
            // Adicione aqui a lógica para verificar o alerta de estoque baixo
            //if ($row['estoque'] < 10) {
            //    echo '<script>alert("Alerta de estoque baixo para ' . $row['nomeprod'] . '");</script>';
            // }
            
            // Adicione aqui a lógica para rastrear a movimentação de estoque
            // Você pode registrar essas informações em outro banco de dados ou arquivo de registro.
        }
        ?>
    </table>
    <!--<button class="back-button" onclick="window.location.href = 'adm.php'">Voltar para ADM</button>
    <button class="report" onclick="window.location.href = 'relatorio-usuarios.php'">Relatório de Usuários</button>-->
    <br><br><br>
</body>
</html>
