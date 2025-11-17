<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Produtos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: white;
      color: black;
      padding: 1px;
      text-align: ;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      position:relative;
    }

    header h1 {
      margin:7px;
      text-align: ; /* Alinhar horizontalmente */
    }
     nav {
      margin-left: -10px;
      position: relative;
      z-index: 2;
    }

    ul {
      list-style-type: none;
      margin: 0px;
      padding: 0;
    }

    li {
      display: inline-block;
      padding: 20px;
      position: relative;
    }

    a {
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }

    ul.submenu {
      display:none ;
      position: absolute;
      top: 70%;
      left: 0px;
      background-color: white;
      z-index: 1;

    }

    li:hover ul.submenu {
      display: block;
    }

    ul.submenu li {
      display: block;
    }

    nav ul {
      list-style-type: none;
      padding: 0;
    }

    nav ul li {
      display: inline-block;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    nav ul li a:hover {
      border-bottom: 3px solid #1df68d;
    }

    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
      padding: 20px;
      justify-items: center;
    }

    .product {
      width: 220px;
      height: 350px;
      border-radius: 15px;
      padding: 15px;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #fff;
      text-align: center;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
    }

    .product:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .product img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .product h2 {
      margin-top: 0;
      color: black;
      font-size: 1.3rem;
    }

    .product p {
      margin-bottom: 0;
      color: #555;
      font-size: 1rem;
    }

    .product-details {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 50px;
    }

    .product-price {
      font-size: 1.2rem;
      font-weight: bold;
      color: #ff6600;
      margin-top: 10px;
    }
  </style>
  <script>
    function abrirPaginaDescricao(event) {
      var paginaDescricao = event.currentTarget.getAttribute("data-pagina");
      if (paginaDescricao) {
        window.location.href = paginaDescricao;
      }
    }

    window.addEventListener("DOMContentLoaded", function() {
      var products = document.getElementsByClassName("product");
      for (var i = 0; i < products.length; i++) {
        products[i].addEventListener("click", abrirPaginaDescricao);
      }

    });
  </script>
</head>
<body>
  <!-- Menu -->
  <header>
    <nav style="margin-top:25px;">
      <ul>
        <li>
          <a href="#" style="color: black; margin-left: 50px;">Masculino</a>
          <ul class="submenu">
            <li><a href="produtos.php" style="color: black; margin-left: 50px;">Camisas</a></li>
            <li><a href="#" style="color: black; margin-left: 50px;">Chuteiras</a></li>
          </ul>
        </li>
        <li>
          <a href="#" style="color: black; margin-right: 0px;">Feminino</a>
          <ul class="submenu">
            <li><a href="#" style="color: black;">Camisas</a></li>
            <li><a href="#" style="color: black;">Chuteira</a></li>
          </ul>
        </li>
        <li>
          <a href="telainicial.php" style="color: black; ">Pagina Inicial</a>
        </li>
      </ul>
    </nav>

  </header>

  <!-- Conteúdo da página -->
  <header>
      <h1>Camisas</h1>
  </header>
  <div class="product-container">
    <div class="product" data-pagina="desc.php">
      <img src="imgbar9.jpg" alt="Produto 1">
      <div class="product-details">
        <h2>Camisa Barcelona</h2>
        <p>Descrição do Produto 1.</p>
        <p class="product-price">R$99,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc2.php">
      <img src="imgbayer.jpg" alt="Produto 2">
      <div class="product-details">
        <h2>Camisa Bayern München</h2>
        <p>Descrição do Produto 2.</p>
        <p class="product-price">R$49,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc3.php">
      <img src="imgcit.jpeg" alt="Produto 3">
      <div class="product-details">
        <h2>Camisa Manchester City</h2>
        <p>Descrição do Produto 3.</p>
        <p class="product-price">R$79,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc4.php">
      <img src="imgintermil.jpg" alt="Produto 4">
      <div class="product-details">
        <h2>Camisa Inter de Milão</h2>
        <p>Descrição do Produto 4.</p>
        <p class="product-price">R$129,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc5.php">
      <img src="camisajuv.jpg" alt="Produto 5">
      <div class="product-details">
        <h2>Camisa Juventus</h2>
        <p>Descrição do Produto 5.</p>
        <p class="product-price">R$149,99</p>
      </div>
    </div>

    <div class="product" data-pagina="descpal.php">
      <img src="imgpal.jpeg" alt="Produto 6">
      <div class="product-details">
        <h2>Camisa Palmeiras</h2>
        <p>Descrição do Produto 6.</p>
        <p class="product-price">R$89,99</p>
      </div>
    </div>
        <div class="product" data-pagina="desc.php">
      <img src="imgbar9.jpg" alt="Produto 1">
      <div class="product-details">
        <h2>Camisa Barcelona</h2>
        <p>Descrição do Produto 1.</p>
        <p class="product-price">R$99,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc2.php">
      <img src="imgbayer.jpg" alt="Produto 2">
      <div class="product-details">
        <h2>Camisa Bayern München</h2>
        <p>Descrição do Produto 2.</p>
        <p class="product-price">R$49,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc3.php">
      <img src="imgcit.jpeg" alt="Produto 3">
      <div class="product-details">
        <h2>Camisa Manchester City</h2>
        <p>Descrição do Produto 3.</p>
        <p class="product-price">R$79,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc4.php">
      <img src="imgintermil.jpg" alt="Produto 4">
      <div class="product-details">
        <h2>Camisa Inter de Milão</h2>
        <p>Descrição do Produto 4.</p>
        <p class="product-price">R$129,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc5.php">
      <img src="camisajuv.jpg" alt="Produto 5">
      <div class="product-details">
        <h2>Camisa Juventus</h2>
        <p>Descrição do Produto 5.</p>
        <p class="product-price">R$149,99</p>
      </div>
    </div>

    <div class="product" data-pagina="descpal.php">
      <img src="imgpal.jpeg" alt="Produto 6">
      <div class="product-details">
        <h2>Camisa Palmeiras</h2>
        <p>Descrição do Produto 6.</p>
        <p class="product-price">R$89,99</p>
      </div>
    </div>
        <div class="product" data-pagina="desc.php">
      <img src="imgbar9.jpg" alt="Produto 1">
      <div class="product-details">
        <h2>Camisa Barcelona</h2>
        <p>Descrição do Produto 1.</p>
        <p class="product-price">R$99,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc2.php">
      <img src="imgbayer.jpg" alt="Produto 2">
      <div class="product-details">
        <h2>Camisa Bayern München</h2>
        <p>Descrição do Produto 2.</p>
        <p class="product-price">R$49,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc3.php">
      <img src="imgcit.jpeg" alt="Produto 3">
      <div class="product-details">
        <h2>Camisa Manchester City</h2>
        <p>Descrição do Produto 3.</p>
        <p class="product-price">R$79,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc4.php">
      <img src="imgintermil.jpg" alt="Produto 4">
      <div class="product-details">
        <h2>Camisa Inter de Milão</h2>
        <p>Descrição do Produto 4.</p>
        <p class="product-price">R$129,99</p>
      </div>
    </div>

    <div class="product" data-pagina="desc5.php">
      <img src="camisajuv.jpg" alt="Produto 5">
      <div class="product-details">
        <h2>Camisa Juventus</h2>
        <p>Descrição do Produto 5.</p>
        <p class="product-price">R$149,99</p>
      </div>
    </div>

    <div class="product" data-pagina="descpal.php">
      <img src="imgpal.jpeg" alt="Produto 6">
      <div class="product-details">
        <h2>Camisa Palmeiras</h2>
        <p>Descrição do Produto 6.</p>
        <p class="product-price">R$89,99</p>
      </div>
    </div>
    
    <!-- Adicione mais produtos conforme necessário -->
    
  </div>
  </div>
</body>
</html>

