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
      padding: 15px;
    }
    nav {
      margin-left: 100px;
      position: relative; /* Adicionado */
      z-index: 2; /* Adicionado */
    }
    ul {
      list-style-type: none;
      margin: 0px;
      padding: 0;
    }

    li {
      display: inline-block;
      padding: 10px;
      position: relative; /* Adicionado */
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
      background-color:white;
      z-index: 2; /* Adicionado */
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
      margin-right: 10px;
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
      margin-top: 100px;
    }

    #destaques h2 {
      font-size: 24px;
      margin-bottom: 60px;
    }

    .product {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .product img {
      width: 150px;
      height: 150px;
    }

    .product-info {
      margin-left: 10px;
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
      width: 100%;
      position: relative; /* Adicionado */
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
      z-index: 10; /* Adicionado */
    }

    .carousel-arrow.right {
      right: 10px;
    }

    .carousel-description {
      position: absolute;
      left: 10px;
      top: 0;
      width: 48%;
      height: 400px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 10px;
      z-index: 5; /* Adicionado */
      text-align: center;
      margin-top:140px; 
    }
  </style>
</head>
<body>
  <header>
    <img src="logo.png" alt="Logo" style="width: 100px; height: 100px; float: left; margin-left: 40px;">
    <nav style="margin-top:25px;">
      <ul>
        <li>
          <a href="#" style="color: black;">Produtos</a>
          <ul class="submenu">
            <li><a href="produtos.html" style="color: black;">Camisas</a></li>
            <li><a href="#" style="color: black;">Chuteiras</a></li>
          </ul>
        </li>
        <li>
          <a href="#" style="color: black;">Opção 2</a>
          <ul class="submenu">
            <li><a href="#" style="color: black;">Item 2.1</a></li>
            <li><a href="#" style="color: black;">Item 2.2</a></li>
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
        <img src="img.jpg" class="active">
        <img src="img2.jpg">
        <img src="img3.jpg">
        <img src="img4.jpg">

        <div class="carousel-arrow left">&#8249;</div>
        <div class="carousel-arrow right">&#8250;</div>
        <div class="carousel-description">
          <h3 class="product-title">Descrição do produto</h3>
          <p class="product-description">Esta é a descrição do produto 1.</p>
        </div>
      </div>
    </div>

    <div id="destaques">
      <h2>Destaques</h2>
      <div class="product">
        <img src="product1.jpg">
        <div class="product-info">
          <h3>Produto 1</h3>
          <p>Descrição do produto 1.</p>
        </div>
      </div>
      <div class="product">
        <img src="product2.jpg">
        <div class="product-info">
          <h3>Produto 2</h3>
          <p>Descrição do produto 2.</p>
        </div>
      </div>
      <div class="product">
        <img src="product3.jpg">
        <div class="product-info">
          <h3>Produto 3</h3>
          <p>Descrição do produto 3.</p>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector('.carousel');
        const images = carousel.querySelectorAll('img');
        const arrows = carousel.querySelectorAll('.carousel-arrow');
        const productTitle = document.querySelector('.product-title');
        const productDescription = document.querySelector('.product-description');
        let currentImageIndex = 0;

        function showImage(index) {
          images.forEach(function(img) {
            img.classList.remove('active');
          });

          arrows.forEach(function(arrow) {
            arrow.style.display = 'block';
          });

          if (index === 0) {
            arrows[0].style.display = 'none';
          } else if (index === images.length - 1) {
            arrows[1].style.display = 'none';
          }

          images[index].classList.add('active');
          productTitle.textContent = "Descrição do produto " + (index + 1) + ".";
          productDescription.textContent = "Esta é a descrição do produto " + (index + 1) + ".";
        }

        arrows.forEach(function(arrow, index) {
          arrow.addEventListener('click', function() {
            if (index === 0 && currentImageIndex > 0) {
              currentImageIndex--;
              showImage(currentImageIndex);
            } else if (index === 1 && currentImageIndex < images.length - 1) {
              currentImageIndex++;
              showImage(currentImageIndex);
            }
          });
        });

        showImage(currentImageIndex);
      })
      function autoAdvanceImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    showImage(currentImageIndex);
  }

  // Configura um intervalo para avançar automaticamente as imagens a cada 3 segundos
  setInterval(autoAdvanceImage, 3000);;
    </script>
  </main>

  <footer>
    <p>Todos os direitos reservados &copy; NP soccer store</p>
  </footer>
</body>
</html>
