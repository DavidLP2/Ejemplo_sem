<php>

</php>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/1200px-Gmail_icon_%282020%29.svg.png" type="image/x-icon">
  <title>Clase de diseño</title>
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

    /* ====== Contenido principal ====== */
    main {
      flex: 1;
      padding: 40px;
      background: #f3f4f6;
    }

    main h2 {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <?php include('menu.php'); ?>

  <!-- Contenido -->
  <main>
    <h2>Bienvenidos</h2>
    <p>Este es un ejemplo de cómo se estructura un sitio web con HTML, CSS y un poco de orden en el frontend.</p>
  </main>
  
<?php include("Footer.php"); ?>
</body>
</html>
