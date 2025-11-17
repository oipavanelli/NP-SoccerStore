<?php
/* SAlvar como: VERIFICAR.php*/
$servidor= "localhost"; // nome do servidor = localhost
$usuario = "root"; //nome do usuário de acesso ao banco
$senha = ""; //senha do usuário: em branco e sem espaço
$bd = "bd4ib2023"; //nome do banco de dados que será aberto
$conn = mysqli_connect($servidor,$usuario,$senha, $bd);

// checa conexao
if (!($conn)){
		echo ("Não foi possível fazer a conexão com servidor de banco de dados"); 
	exit;
	} else{
	 	echo ("conexão com servidor de banco de dados realizado como sucesso");
	}
// recupera o login
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"]))
	: true;
echo "<br> $email";
//recupera senha
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : true;
echo "<br> $senha";
//verifica se o email e a senha foram fornecidos
if(!$email || !$senha){
	echo"voce deve digitar seu email e senha";
	exit;
}
//buscar dados do banco de dados
$email = mysqli_real_escape_string($conn, $email);
$senha = mysqli_real_escape_string($conn, $senha);

$sql = "SELECT * FROM tabcadloginsenha WHERE email = '$email' AND 
	senha ='$senha'";

$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_assoc($resultado);
$logorray = $linha ['email'];
 echo "<br> $logorray! <br>";//apagar
 echo "<br> $email! <br>";//apagar

	if(($logorray== null) or ($logorray <> $email))
	{
		echo "Nao Existe usuario com esse login e senha!";
		exit;	
	}
	else
	{
		if(mysqli_num_rows ($resultado) <=0)
		{
			echo "login ou senha invalido";
			exit();
		}
		else
		{
			setcookie ("login", $login);
			$linah = mysqli_fetch_assoc($resultado);
			// redireciona para a pagina principal
			header("loication: TELASISTEMA.PHP");
		}
	}
?>
				