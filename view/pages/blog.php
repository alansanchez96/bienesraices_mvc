<main class="contenedor seccion contenido-centrado">

    <h1>Nuestro Blog</h1>

    <?php if( intval($resultado) === 1): ?>
            <p class="alerta actualizado">Tu blog será verificado</p>
        <?php endif;  ?>

    <?php include __DIR__ . '/../blog/articulos-blog.php' ?>

    <a href="/../blog/create-blog" class="boton boton-verde">Crear Articulo</a>
    
</main>