<?php foreach( $blog as $blog ): ?>


    <article class="entrada-blog">
        <div class="img-entrada">
            <picture>
                <img loading="lazy" src="/imagenes_blog/<?php echo $blog->imagen; ?>" alt="Entrada Blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="/blog/entrada?id=<?php echo $blog->id; ?>">
                <h4><?php echo $blog->titulo; ?></h4>
                <p>Escrito el <span class="parrafo-span"><?php echo $blog->fecha; ?></span> por <span class="parrafo-span"><?php echo $blog->nombre . " " . $blog->apellido; ?></span></p>
                <p><?php echo $blog->descripcion ?></p>
            </a>
        </div>
    </article>

<?php endforeach; ?>