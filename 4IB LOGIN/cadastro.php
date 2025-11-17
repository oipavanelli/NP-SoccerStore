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
        .tab-content2{
            margin-top: 100px;
        }
        .tab-content3 {
            background-color: #fff;
            padding: 25px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        input[type="submit"] {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #1df68d;
            color: #fff;
            text-decoration: none;
            font-weight: ;
            transition: background-color 0.3s ease;
            border-color: #1df68d;
        }

        input[type="submit"]:hover {
            background-color: #0AB663;
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

        .create-account-button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #1df68d;
            color: #fff;
            text-decoration: none;
            font-weight: ;
            transition: background-color 0.3s ease;
            border-color: #1df68d;
            margin-top: 40.9px;
            margin-left: 201.7px;
        }

        .create-account-button:hover {
            background-color: #0AB663;
        }

        .create-admin-button {
            display: none;
            border-radius: 20px;
            background-color: #1df68d;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border-color: #1df68d;
        }

        .create-admin-button:hover {
            background-color: #0AB663;
        }

        .button-link {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #1df68d;
            color: #fff;
            text-decoration: none;
            font-weight: ;
            transition: background-color 0.3s ease;
            border-color: #1df68d;
            margin-top: -37.9px;
            margin-left: 8px;
        }

        .button-link:hover {
            background-color: #0AB663;
        }

        .button-link2 {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #1df68d;
            color: #fff;
            text-decoration: none;
            font-weight: ;
            transition: background-color 0.3s ease;
            border-color: #1df68d;
            margin-top: -37.9px;
            margin-left: -42px;
        }

        .button-link2:hover {
            background-color: #0AB663;
        }

        .bai
        {
            margin-left:1029px;
            margin-top:-113px;
        }
    </style>
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

        function redirectAndRemoveButton() {
    // Primeiro, redirecione para a outra página (substitua 'outrapagina.html' pelo URL desejado).
    window.location.href = 'cadastroad.php';
    
    // Em seguida, remova o botão "Criar Admin".
    var adminButton = document.getElementById("create-admin-button");
    adminButton.remove();
}

    </script>
</head>
<body>
    <img src="n.png" alt="Imagem de login" width="700px" style="float: left; margin-top:65px ;">
    <div class="tabs-container">
        <div id="login-tab" class="tab active">
            <div class="tab-content2">
                <div class="tab-content">                
                    <form method="POST" action="verificar.php">
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
						<div class="container">
							<button id="create-account-button" class="button-link2" type="button" onclick="switchForm()">Criar Conta</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
        <div id="cadastro-tab" class="tab">
            <div class="tab-content3">                
                <form method="POST" action="gravar.php">
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
					<input type="text" id="cpf" name="cpf" required>
					<br>
					<label for="email">Email</label>
					<input type="text" id="email" name="email" required>
					<br>
					<label for="senha">Senha</label>
					<input type="password" id="senha" name="senha" required>
					<br>
                    <label for=""></label>
                    <input type="" id="contadeacesso" name="contadeacesso" hidden>
                    <br>
					<input type="submit" class="cadastrar-button" value="Cadastrar">
					<button id="create-account-button" class="button-link" type="button" onclick="switchForm()">Voltar para Login</button>
                </form>
            </div>
        </div>
        <p class="menu-text">Ao fazer login na minha conta, concordo com os Termos e Condições e a Política de Privacidade da NP Soccer Store</p>
    </div>
    <div class="bai">
         <form method="POST">
            <input type="submit" id="create-admin-button" class="create-admin-button" onclick="redirectAndRemoveButton()" value="Criar Admin">
        </form>
    </div>
</body>
</html>