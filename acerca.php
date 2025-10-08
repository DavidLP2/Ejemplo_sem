<php>

</php>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="ruta/a/tu/favicon.ico" type="image/x-icon">
  <title>Sobre nosotros</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ====== Header ====== */
    header {
      background: #1e3a8a;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 22px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      color: #facc15;
    }

    /* ====== Contenido principal ====== */
    main {
      flex: 1;
      padding: 40px;
      background: #f3f4f6;
    }

    main h2 {
      margin-bottom: 15px;
    }

    /* ====== Footer ====== */
    footer {
      background: #F54928;
      color: white;
      text-align: center;
      padding: 15px 0;
    }
  </style>
</head>
<body> 

  <!-- Header con menú -->
  <header>
    <h1>Mi Web Frontend</h1>
    <nav>
      <ul>
         <li><a href="Inicio.php">Inicio</a></li>
        <li><a href="acerca.php">Acerca</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <!-- Contenido -->
  <main>
    <h2>ALI DAVID LAMAR</h2>
    <p>Este es un ejemplo de cómo se estructura un sitio web con HTML, CSS y un poco de orden en el frontend.</p>
  </main>
  <img src="https://a.storyblok.com/f/160385/4bf112f0cd/datos_curiosos.jpg/m/?w=256&q=100" alt="Imagen de vaca" style="display: block; margin: 0 auto; max-width: 100%; height: auto;">

  <!-- Footer -->
 <?php include("Footer.php"); ?>

</body>
</html>
