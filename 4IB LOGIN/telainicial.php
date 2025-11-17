<!DOCTYPE html>
<html>

<head>
    <title>NP Soccer Store</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" type="/css/styles.css">  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #000;
            color: #fff;
            padding: 3px;
            height: 90px;
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
          background-color: #fff;
          z-index: 2;
          width: 120px; /* Defina a largura desejada */
          padding: 0px 10; /* Adicione espaçamento superior e inferior */
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
            font-size: 17px;
            font-weight: normal; 
            font-family: "Sua Fonte", sans-serif; 
        }

        nav ul li a:hover {
            border-bottom: 3px solid #1df68d;
        }

        main {
            padding: 20px;
            text-align: center;
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .product {
            width: 220px;
            height: 420px;
            border-radius: 15px;
            padding: 15px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin: 20px;
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
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #000;
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
            margin-top: 30px;
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

        /* Estilize as setas do carrossel com a classe .arrow-box */
        .carousel-arrow.left {
            left: 10px;
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
            margin-top: 100px;
            font-size: 23px;
        }

        .registration-icon {
            position: absolute;
            top: 30px;
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

        /* Adicione esta classe para criar um retângulo ao redor das setas */
        .arrow-box {
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }


        /* Estilize as setas do carrossel para adicionar o retângulo preto */
        .carousel-arrow.left:after,
        .carousel-arrow.right:after {
            content: "";
            position: absolute;
            top: 5;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }

        /* Estilize o retângulo preto */
        .carousel-arrow.left:after {
            background-color: #dcdcdc;
            width: 100%;
            height: 90%;
            border-radius: 5px;
        }

        .carousel-arrow.right:after {
            background-color: #dcdcdc;
            width: 100%;
            height: 90%;
            border-radius: 5px;
        }
        i{
            font-size: 30px;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <img src="logonp.png" alt="Logo" style="width: 60px; height: 40px; float: left; margin-left: 40px; margin-top:25px;">
        <nav style="margin-top: 25px;">
            <ul>
                <li>
                    <a href="#" style="margin-left: 60px; ">Masculino</a>
                    <ul class="submenu">
                        <li><a href="produtos.php" style="color: black; margin-left: 50px;">Camisas</a></li>
                        <li><a href="#" style="color: black; margin-left: 50px;">Chuteiras</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" style="margin-right: 0px;">Feminino</a>
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

                <div class="carousel-arrow left arrow-box">&#8249;</div>
                <div class="carousel-arrow right arrow-box">&#8250;</div>
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
                        <p>Descrição do Produto 1.</p>
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

    <div class="registration-icon">
        <a href="cadastro.php">
            
        </a>
    </div>

    <script>
        const carouselDescription = document.getElementById('carousel-description');
        const productTitle = document.getElementById('product-title');
        const productDescription = document.getElementById('product-description');

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
            images.forEach(function (img) {
                img.classList.remove('active');
            });

            images[index].classList.add('active');

            productTitle.textContent = productData[index].title;
            productDescription.textContent = productData[index].description;
        }

        const carousel = document.querySelector('.carousel');
        const arrows = carousel.querySelectorAll('.carousel-arrow');

        arrows.forEach(function (arrow, index) {
            arrow.addEventListener('click', function () {
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

        /*function autoAdvanceImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showProductDescription(currentImageIndex);
        }*/
    </script>
</body>

</html>
