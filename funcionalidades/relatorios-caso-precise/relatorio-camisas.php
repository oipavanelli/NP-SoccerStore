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

// Consulta para recuperar todos os registros da tabela de produtos
$query = "SELECT id, nomeprod, descricao, valor, imagem FROM tb_produtos WHERE codigo = 2";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro ao recuperar dados do banco de dados: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Camisas</title>
</head>
<style> 
/* Estilo geral */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    padding: 20px;
    background-color: #333;
    color: #fff;
}

/* Estilo da tabela de relatório */
table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #ddd;
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
    <h1>Relatório de Camisas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
            <!-- <th>Estoque</th> -->
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nomeprod'] . '</td>';
            echo '<td>' . $row['descricao'] . '</td>';
            echo '<td>' . $row['valor'] . '</td>';
            # echo '<td>' . $row['estoque'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <button class="back-button" onclick="window.location.href = 'adm.php'">Voltar para ADM</button>
    <button class="report-button" onclick="window.location.href = 'relatorio-bolas.php'">Relatório de Bolas</button>
    <button class="report-button" onclick="window.location.href = 'relatorio-luvas.php'">Relatório de Luvas</button>
    <button class="report-button" onclick="window.location.href = 'relatorio-chuteiras.php'">Relatório de Chuteiras</button>
    <button class="report-button" onclick="window.location.href = 'relatorio-conjuntos.php'">Relatório de Conjuntos</button>
    <button class="report" onclick="window.location.href = 'relatorio-usuarios.php'">Relatório de Usuario</button>
</body>
</html>
