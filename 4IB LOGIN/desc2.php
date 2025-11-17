<!DOCTYPE html>
<html>
<head>
  <title>Descrição do Produto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:;
      margin-left: 150px;
    }
    
    .carousel {
      background-color: #eee;
      width: 300px;
      margin: 0 auto;
      position: fixed;
      width: 450px;
      height: 450px;
      margin-left: 80px;
      margin-top: ;
    }
    
    .carousel img {
      width: 100%;
      display: none;
    }
    
    .carousel img.active {
      display: block;
    }
    
    .carousel-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 50px;
      cursor: pointer;
      color:;
    }
    
    .carousel-arrow.left {
      left: 10px;
    }
    
    .carousel-arrow.right {
      right: 10px;
    }
    
    .product-description {
      width: 600px;
      margin: 20px auto;
    }
    
    .product-description h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }
    
    .product-description p {
      font-size: 16px;
      color: #666;
      line-height: 1.5;
    }
    
    .product-price {
      font-size: 18px;
      color: #555;
      margin-bottom: 10px;
    }
    
    .back-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      border-radius: 5px;
      margin-top: 20px;
    }
    
    .back-button:hover {
      background-color: green;
    }
    
    .product-images {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      margin-right: 40px;
    }
    
    .product-images-row img {
      width: 60px;
      margin: 0 5px;
      cursor: pointer;
      border: 2px solid transparent;
    }
    
    .product-images-row img:hover {
      opacity: 0.7;
      border-color: #333;
    }
  </style>
</head>
<body>
  <div class="carousel">
    <img src="img5.jpg" class="active">
    <img src="imgbayern.jpg">
    <img src="imgbayern2.jpg">
    <img src="imgbayern3.jpg">
    <img src="imgbayern4.jpg">
    <img src="imgbayern5.jpg">
    <img src="imgbayern6.jpg">
    <img src="imgbayern7.jpg">
    
    <div class="carousel-arrow left">&#8249;</div>
    <div class="carousel-arrow right">&#8250;</div>
  </div>
  
  <div class="product-description" style="margin-left: 550px; margin-top: 100px;">
    <h1>CAMISA BAYERN MUNCHEN</h1>
    <p class="product-price"><b><h2>$19.99</h2></b></p>
    
    <div class="product-images-row"> <!-- Nova div adicionada para as imagens -->
      <img src="img5.jpg" onclick="showImage(0)">
      <img src="imgbayern.jpg" onclick="showImage(1)">
      <img src="imgbayern2.jpg" onclick="showImage(2)">
      <img src="imgbayern3.jpg" onclick="showImage(3)">
    </div>
    
    <div class="product-images-row"> <!-- Nova div adicionada para as imagens -->
      <img src="imgbayern4.jpg" onclick="showImage(4)">
      <img src="imgbayern5.jpg" onclick="showImage(5)">
      <img src="imgbayern6.jpg" onclick="showImage(6)">
      <img src="imgbayern7.jpg" onclick="showImage(7)">
    </div>
    
    <a href="produtos.html" class="back-button">Voltar</a>
  </div>

    <script>
    const carousel = document.querySelector('.carousel');
    const images = carousel.querySelectorAll('img');
    const arrows = carousel.querySelectorAll('.carousel-arrow');
    const productImages = document.querySelectorAll('.product-images-row img'); // Atualizado o seletor
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

    function startCarousel() {
      intervalId = setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        showImage(currentImageIndex);
      }, 2000);
    }

    function stopCarousel() {
      clearInterval(intervalId);
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

    document.addEventListener('DOMContentLoaded', startCarousel);
    document.querySelector('.carousel').addEventListener('mouseover', stopCarousel);
    document.querySelector('.carousel').addEventListener('mouseout', startCarousel);
  </script>
</body>
</html>
