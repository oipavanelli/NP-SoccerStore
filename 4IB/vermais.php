<!DOCTYPE html>
<html>
<head>
  <title>Menu Example</title>
  <style>
    /* CSS for menu styling (you can modify as per your design) */
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    li {
      display: inline-block;
      padding: 10px;
    }
    a {
      text-decoration: none;
      color: white;

    }
    ul.submenu {
      display: none;
      position: absolute;
      background-color: white;
    }
    li:hover ul.submenu {
      display: block;
    }
    ul.submenu li {
      display: block;
    }
    
    header {
      background-color: black;
      color: white;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <h1>Meu Menu</h1>
    <nav>
      <ul>
        <li>
          <a href="#">Opção 1</a>
          <ul class="submenu">
            <li><a href="#">Item 1.1</a></li>
            <li><a href="#">Item 1.2</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Opção 2</a>
          <ul class="submenu">
            <li><a href="#">Item 2.1</a></li>
            <li><a href="#">Item 2.2</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Opção 3</a>
          <ul class="submenu">
            <li><a href="#">Item 3.1</a></li>
            <li><a href="#">Item 3.2</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>
