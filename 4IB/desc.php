<!DOCTYPE html>
<html>

<head>
  <title>Descrição do Produto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      max-width: 800px;
      margin: 0 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .carousel {
      flex: 1;
      position: relative;
      overflow: hidden;
    }

    .carousel img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .carousel img.active {
      opacity: 1;
    }

    .carousel-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 30px;
      cursor: pointer;
      color: #333;
      background-color: #f9f9f9;
      padding: 5px 10px;
      border-radius: 50%;
      user-select: none;
    }

    .carousel-arrow.left {
      left: 10px;
    }

    .carousel-arrow.right {
      right: 10px;
    }

    .product-description {
      flex: 1;
      padding: 20px;
    }

    .product-description h1 {
      font-size: 24px;
      color: #333;
      margin: 0 0 10px;
    }

    .product-description h2 {
      font-size: 18px;
      color: #555;
      margin: 0;
    }

    .product-description p {
      font-size: 16px;
      color: #666;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    .back-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #28a745; /* Cor de fundo */
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      border-radius: 5px;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease; /* Transição de cor de fundo e escala */
    }

    .back-button:hover {
      background-color: #218838; /* Cor de fundo no hover */
      transform: scale(1.05); /* Aumenta ligeiramente o tamanho no hover */
    }

    .product-images-row {
      display: flex;
      margin: 10px 0;
    }

    .product-images-row img {
      width: 60px;
      cursor: pointer;
      border: 2px solid transparent;
      transition: opacity 0.3s ease, border-color 0.3s ease;
    }

    .product-images-row img:hover {
      opacity: 0.7;
      border-color: #333;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="carousel">
      <img src="imgbar.jpg" class="active">
      <img src="imgbar2.jpg">
      <img src="imgbar3.jpg">
      <img src="imgbar4.jpg">
      <img src="imgbar5.jpg">
      <img src="imgbar6.jpg">
      <img src="imgbar7.jpg">
      <img src="imgbar8.jpg">
      <div class="carousel-arrow left">&#8249;</div>
      <div class="carousel-arrow right">&#8250;</div>
    </div>

    <div class="product-description">
      <h1>CAMISA BARCELONA</h1>
      <h2>$19.99</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce volutpat quam id justo hendrerit,
        non rhoncus nisi gravida.</p>

      <div class="product-images-row">
        <img src="imgbar.jpg" onclick="showImage(0)">
        <img src="imgbar2.jpg" onclick="showImage(1)">
        <img src="imgbar3.jpg" onclick="showImage(2)">
        <img src="imgbar4.jpg" onclick="showImage(3)">
      </div>

      <div class="product-images-row">
        <img src="imgbar5.jpg" onclick="showImage(4)">
        <img src="imgbar6.jpg" onclick="showImage(5)">
        <img src="imgbar7.jpg" onclick="showImage(6)">
        <img src="imgbar8.jpg" onclick="showImage(7)">
      </div>

      <center><a href="produtos.php" class="back-button">Voltar</a></center>
    </div>
  </div>

  <script>
    const carousel = document.querySelector('.carousel');
    const images = carousel.querySelectorAll('img');
    const arrows = carousel.querySelectorAll('.carousel-arrow');
    const productImages = document.querySelectorAll('.product-images-row img');
    let currentImageIndex = 0;
    let intervalId;

    function showImage(index) {
      images.forEach((image, i) => {
        if (i === index) {
          image.classList.add('active');
        } else {
          image.classList.remove('active');
        }
      });

      currentImageIndex = index;
    }

    arrows.forEach(arrow => {
      arrow.addEventListener('click', () => {
        stopCarousel();

        if (arrow.classList.contains('left')) {
          currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        } else {
          currentImageIndex = (currentImageIndex + 1) % images.length;
        }

        showImage(currentImageIndex);
      });
    });

    productImages.forEach((image, index) => {
      image.addEventListener('click', () => {
        stopCarousel();
        showImage(index);
      });
    });

    function stopCarousel() {
      clearInterval(intervalId);
    }
  </script>
</body>

</html>
