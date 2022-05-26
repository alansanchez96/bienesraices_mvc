<main class="contenedor seccion contenido-centrado">

    <h1><?php echo $blog->titulo; ?></h1>

    <div class="imagen-blog">
        <picture>
            <img loading="lazy" src="/imagenes_blog/<?php echo $blog->imagen; ?>" alt="Imagen de casa en venta">
        </picture>
    </div>
    
    <div class="texto-entrada">
        <p>Escrito el: <span class="parrafo-span"><?php echo $blog->fecha; ?></span> por: <span class="parrafo-span"><?php echo $blog->nombre . " " . $blog->apellido; ?></span></p>
        <p><?php echo $blog->descripcion; ?></p>
    </div>





</main>