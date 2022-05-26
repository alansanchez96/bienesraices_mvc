<main class="contenedor seccion">
    
    <h2>Administrador del Blog</h2>

    <?php if( intval($resultado) === 3): ?>
            <p class="alerta error">La publicacion fue eliminada con éxito</p>
        <?php endif;  ?>

    <div class="div">
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                
                <?php foreach($blog as $blog): ?>
                    
                    <tr>
                        <td><?php echo $blog->id; ?></td>
                        <td>
                            <img class="casa-img" src="/imagenes_blog/<?php echo $blog->imagen; ?>">
                        </td>
                        <td><?php echo $blog->titulo; ?></td>
                    <td><?php echo $blog->nombre . " " . $blog->apellido; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/blog/delete">
                            <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                            <input type="hidden" name="tipo" value="blog">
                            <input type="submit" value="Eliminar" class="boton-rojoBlock">
                        </form>
                        <a href="/blog/entrada?id=<?php echo $blog->id; ?>" class="boton-amarillo">Ver Detalles</a>
                    </td>
                </tr>
                
                <?php endforeach; ?>
                
            </tbody>
            
        </table>
    </div>
</main>