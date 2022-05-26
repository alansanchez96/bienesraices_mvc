<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    } 
?>

<!DOCTYPE html>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="mobile-menu contenedor">
                    
                    <div class="logo-img">
                        <a href="/">
                            <img src="/../build/img/logo.svg" alt="Logotipo de bienes raices">
                        </a>
                    </div>
                    <div class="mobileMenu-hidden">
                        <img src="/../build/img/barras.svg" alt="Apertura de menu de opciones">
                    </div>
                    
                </div>

                
                <div class="derecha">
                    <img class="nav-darkmode" src="/../build/img/dark-mode.svg" alt="activar dark-mode">

                    <nav class="navegacion-header">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login">Log In</a>
                        <?php endif; ?>
                        <?php if ($auth): ?>
                            <a href="/admin" class="centrado">Admin</a>
                        <?php endif; ?>
                        <?php if($auth): ?>
                            <a href="/logout">Log Out</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>  <!-- Barra -->

            <?php
                if($inicio){
                    echo "<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos Exclusivos de Lujos</h1>";
                }
                // o echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujos</h1> : '';
            
            ?>
        </div>
    </header>

    
    <?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion-footer">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </div>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date('Y');?> &copy;</p>
    </footer>

    <script src="/../build/js/modernizr.js"></script>
    <script src="/../build/js/app.js"></script>
</body>
</html>