<?php 
    
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;

?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/public/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="mobile-menu contenedor">
                    
                    <div class="logo-img">
                        <a href="/index.php">
                            <img src="/public/build/img/logo.svg" alt="Logotipo de bienes raices">
                        </a>
                    </div>
                    <div class="mobileMenu-hidden">
                        <img src="/public/build/img/barras.svg" alt="Apertura de menu de opciones">
                    </div>
                    
                </div>

                
                <div class="derecha">
                    <img class="nav-darkmode" src="/public/build/img/dark-mode.svg" alt="activar dark-mode">

                    <nav class="navegacion-header">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login.php">Log In</a>
                        <?php endif; ?>
                        <?php if ($auth): ?>
                            <a href="/admin" class="centrado">Admin</a>
                        <?php endif; ?>
                        <?php if($auth): ?>
                            <a href="/cerrar-sesion.php">Log Out</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>  <!-- Barra -->

            <?php
                if($inicio){
                    echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujos</h1>";
                }
                // o echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujos</h1> : '';
            
            ?>
        </div>
    </header>