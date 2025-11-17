<!DOCTYPE html>
<html>
<head>
  <title>Página de Produtos</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  
  header {
    background-color: ;
    color: #fff;
    padding: 20px;
    text-align: center;
  }
  
  h1 {
    margin: 0;
    color: black;
  }
  
  .product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .product {
    width: 300px;
    margin: 20px;
    border: 1.9px solid green;
    border-radius: 20px;
    padding: 25px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .product:hover {
    transform: translateY(-10px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
  
  .product img {
    max-width: 100%;
    height: auto;
  }
  
  .product h2 {
    margin-top: 0;
  }
  
  .product p {
    margin-bottom: 0;
  }
</style>
<script>
  // Função para abrir a página de descrição do produto
  function abrirPaginaDescricao(event) {
    var paginaDescricao = event.currentTarget.getAttribute("data-pagina");
    if (paginaDescricao) {
      window.open(paginaDescricao, "_blank");
    }
  }
  
  // Adiciona o evento de clique em todos os elementos com a classe "product"
  window.addEventListener("DOMContentLoaded", function() {
    var products = document.getElementsByClassName("product");
    for (var i = 0; i < products.length; i++) {
      products[i].addEventListener("click", abrirPaginaDescricao);
    }
  });
</script>
<body>
<header>
  <h1>Camisas</h1>
</header>

<div class="product-container">
  <div class="product" data-pagina="desc.php">
    <img src="img4.jpg" alt="Produto 1" style="margin-left: 30px;">
    <h2>Camisa Barcelona</h2>
    <p>Descrição do Produto 1.</p>
    <p>Preço: R$99,99</p>
  </div>

  <div class="product" data-pagina="desc2.php">
    <img src="img5.jpg" alt="Produto 2" style="margin-left: 35px;">
    <h2>Camisa Bayern München</h2>
    <p>Descrição do Produto 2.</p>
    <p>Preço: R$49,99</p>
  </div>

  <div class="product" data-pagina="desc3.php">
    <img src="img6.jpg" alt="Produto 3" style="margin-left: 30px;">
    <h2>Camisa Manchester City</h2>
    <p>Descrição do Produto 3.</p>
    <p>Preço: R$79,99</p>
  </div>

  <div class="product" data-pagina="desc4.php">
    <img src="img7.jpg" alt="Produto 4" style="margin-left: 30px;">
    <h2>Camisa Inter de Milão</h2>
    <p>Descrição do Produto 4.</p>
    <p>Preço: R$129,99</p>
  </div>

  <div class="product" data-pagina="desc5.php">
    <img src="img8.jpg" alt="Produto 5" style="margin-left: 30px;">
    <h2>Camisa Juventus</h2>
    <p>Descrição do Produto 5.</p>
    <p>Preço: R$149,99</p>
  </div>

  <div class="product" data-pagina="desc6.php"> 
    <img src="img9.jpg" alt="Produto 6" style="margin-left: 30px;"> 
    <h2>Camisa Inter Miami</h2>
    <p>Descrição do Produto 6.</p> 
    <p>Preço: R$89,99</p> 
  </div> 
  <div class="product" data-pagina="desc.php">
    <img src="img4.jpg" alt="Produto 1" style="margin-left: 30px;">
    <h2>Camisa Barcelona</h2>
    <p>Descrição do Produto 1.</p>
    <p>Preço: R$99,99</p>
  </div>

  <div class="product" data-pagina="desc2.php">
    <img src="img5.jpg" alt="Produto 2" style="margin-left: 35px;">
    <h2>Camisa Bayern München</h2>
    <p>Descrição do Produto 2.</p>
    <p>Preço: R$49,99</p>
  </div>

  <div class="product" data-pagina="desc3.php">
    <img src="img6.jpg" alt="Produto 3" style="margin-left: 30px;">
    <h2>Camisa Manchester City</h2>
    <p>Descrição do Produto 3.</p>
    <p>Preço: R$79,99</p>
  </div>

  <div class="product" data-pagina="desc4.php">
    <img src="img7.jpg" alt="Produto 4" style="margin-left: 30px;">
    <h2>Camisa Inter de Milão</h2>
    <p>Descrição do Produto 4.</p>
    <p>Preço: R$129,99</p>
  </div>

  <div class="product" data-pagina="desc5.php">
    <img src="img8.jpg" alt="Produto 5" style="margin-left: 30px;">
    <h2>Camisa Juventus</h2>
    <p>Descrição do Produto 5.</p>
    <p>Preço: R$149,99</p>
  </div>

  <div class="product" data-pagina="desc6.php"> 
    <img src="img9.jpg" alt="Produto 6" style="margin-left: 30px;"> 
    <h2>Camisa Inter Miami</h2>
    <p>Descrição do Produto 6.</p> 
    <p>Preço: R$89,99</p> 
  </div> 
</div> 
</body>
</html>
