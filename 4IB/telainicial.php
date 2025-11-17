  <!DOCTYPE html>
<html>
<head>
  <title>NP soccer store</title>
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: white;
      color: #fff;
      padding: 3px;
    }

    nav {
      margin-left: 100px;
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
      padding: 10px;
      position: relative;
    }

    a {
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }

    ul.submenu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0px;
      background-color: white;
      z-index: 2;
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

    main {
      padding: 20px;
    }

    .btn {
      display: inline-block;
      background-color: #000;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
    }

    #destaques {
      margin-top: 250px;
      display: flex;
      justify-content: space-between;
    }

    .product {
      width: 220px;
      height: 415px;
      border-radius: 15px;
      padding: 15px;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #fff;
      text-align: center;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      margin-right: 20px;
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
      color: ;
      margin-top: 10px;
    }

    footer {
      background-color: #000;
      color: #fff;
      padding: 10px;
      text-align: center;
      height: 30px;
    }

    .carousel-container {
      display: flex;
      align-items: center;
      width: 101%;
      height: 500px;
      position: relative;
      z-index: 1;

    }

    .carousel {
      background-color: ;
      width: 100%;
      height: 400px;
      position: relative;
    }

    .carousel img {
      width: 50%;
      height: 100%;
      display: none;
      margin-left: 635px;
      cursor: pointer;
       margin-top: -43px;
    }

    .carousel img.active {
      display: block;
    }

    .carousel-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 45px;
      cursor: pointer;
    }

    .carousel-arrow.left {
      left: 10px;
      z-index: 10;
      font-size: 90px;
      margin-top: -30px;
    }

    .carousel-arrow.right {
      right: 10px;
      font-size: 90px;
      margin-top: -30px;
    }

    .carousel-description {
      position: absolute;
      left: 10px;
      top: 0;
      width: 48%;
      height: 400px;
      background-color: ;
      padding: 10px;
      z-index: 5;
      text-align: center;
      margin-top: 140px;
    }

    .registration-icon {
      position: absolute;
      top: 25px;
      right: 30px;
      width: 30px;
      height: 30px;
    }

    .registration-icon a {
      display: block;
      width: 100%;
      height: 100%;
      text-decoration: none;
      cursor: pointer;
    }

    .registration-icon img {
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>
  <header>
    <img src="logo.png" alt="Logo" style="width: 100px; height: 100px; float: left; margin-left: 30px;">
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
          <a href="#" style="color: black; ">Sobre</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="carousel-container">
      <div class="carousel">
        <a href="descpal.php">
          <img src="imgpal.jpeg" class="active" style="width: 40%; height: 120%; margin-left: 55%;">
        </a>
        <a href="pagina2.html">
          <img src="imgcruzeiro.jpeg" style="width: 40%; height: 120%; margin-left: 55%;">
        </a>
        <a href="pagina3.html">
          <img src="imgbayer.jpg" style="width: 40%; height: 120%; margin-left: 55%;">
        </a>
        <a href="pagina4.html">
          <img src="imgbar9.jpg" style="width: 40%; height: 120%; margin-left: 55%;">
        </a>

        <div class="carousel-arrow left">&#8249;</div>
        <div class="carousel-arrow right">&#8250;</div>
        <div class="carousel-description" id="carousel-description">
          <h3 class="product-title" id="product-title">Descrição do produto</h3>
          <p class="product-description" id="product-description"></p>
        </div>
      </div>
    </div>

    <div id="destaques">
      <div class="product" style="margin-left: 30px;">
        <a href="descricao_produto1.html">
          <img src="imgcit.jpeg">
          <div class="product-details">
            <h2>Camisa Manchester City</h2>
            <p>Descrição do Produto 3.</p>
            <p class="product-price">R$79,99</p>
          </div>
        </a>
      </div>
      
      <div class="product" style="margin-left: 20px;">
        <a href="descricao_produto2.html">
          <img src="imgintermil.jpg">
          <div class="product-details">
            <h2>Camisa Inter de Milão</h2>
            <p>Descrição do Produto 2.</p>
            <p class="product-price">R$89,99</p>
          </div>
        </a>
      </div>

      <div class="product" style="margin-left: 20px;">
        <a href="descricao_produto4.html">
          <img src="imgpal.jpeg">
          <div class="product-details">
            <h2>Camisa Palmeiras</h2>
            <p>Descrição do Produto 4.</p>
            <p class="product-price">R$89,99</p>
          </div>
        </a>
      </div>

      <div class="product" style="margin-left: 20px;">
        <a href="descricao_produto5.html">
          <img src="imgroma.jpg">
          <div class="product-details">
            <h2>Camisa Roma</h2>
            <p>Descrição do Produto 5.</p>
            <p class="product-price">R$99,99</p>
          </div>
        </a>
      </div>
    </div>
    
  </main>

  <footer>
    <p>Todos os direitos reservados &copy; NP soccer store</p>
  </footer>

  <!-- Área Clicável para o Ícone de Cadastro -->
  <div class="registration-icon">
    <a href="pagina-de-cadastro.html">
      <img src="iconecadastro.png" alt="Ícone de Cadastro">
    </a>
  </div>

 <script>
    const carouselDescription = document.getElementById('carousel-description');
    const productTitle = document.getElementById('product-title');
    const productDescription = document.getElementById('product-description');
    
    // Array de descrições dos produtos
    const productData = [
      {
        title: "Camisa Palmeiras",
        description: "Descrição do Produto 1",
      },
      {
        title: "Camisa Cruzeiro",
        description: "Descrição do Produto 2",
      },
      {
        title: "Camisa Coritiba",
        description: "Descrição do Produto 3",
      },
      {
        title: "Camisa Barcelona",
        description: "Descrição do Produto 4",
      },
    ];

    const images = document.querySelectorAll('.carousel img');
    let currentImageIndex = 0;

    function showProductDescription(index) {
      const product = productData[index];
      productTitle.textContent = product.title;
      productDescription.textContent = product.description;
      showImage(index);
    }

    function showImage(index) {
      images.forEach(function(img) {
        img.classList.remove('active');
      });

      images[index].classList.add('active');

      productTitle.textContent = productData[index].title;
      productDescription.textContent = productData[index].description;
    }

    const carousel = document.querySelector('.carousel');
    const arrows = carousel.querySelectorAll('.carousel-arrow');

    arrows.forEach(function(arrow, index) {
      arrow.addEventListener('click', function() {
        if (index === 0 && currentImageIndex > 0) {
          currentImageIndex--;
          showProductDescription(currentImageIndex);
        } else if (index === 1 && currentImageIndex < images.length - 1) {
          currentImageIndex++;
          showProductDescription(currentImageIndex);
        }
      });
    });

    showProductDescription(currentImageIndex);
    setInterval(autoAdvanceImage, 3000);

    // Função para avançar automaticamente as imagens do carrossel
    /*function autoAdvanceImage() {
      currentImageIndex = (currentImageIndex + 1) % images.length;
      showProductDescription(currentImageIndex);
    }*/
  </script>
</body>
</html>
