<main class="contenedor seccion">
    <h1>Crea un Articulo</h1>

    <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data">

        <fieldset>
            <legend>Informacion personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Ingresa tu Nombre" name="blog[nombre]" value="<?php echo s($blog->nombre); ?>">

            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" placeholder="Ingresa tu Apellido" name="blog[apellido]" value="<?php echo s($blog->apellido); ?>">

        </fieldset>

        <fieldset>
            <legend>Crea tu Articulo</legend>

            <label for="titulo">Titulo del artículo</label>
            <input type="text" id="titulo" placeholder="Ej: Terraza en el techo de tu casa" name="blog[titulo]" value="<?php echo s($blog->titulo); ?>">

            <label for="descripcion">Breve descripcion</label>
            <textarea id="descripcion" placeholder="Maximo 200 caracteres" name="blog[descripcion]" value="<?php echo s($blog->descripcion); ?>"></textarea>

            <label for="img">Imagen de Portada</label>
            <input type="file" id="img" accept="image/jpeg , image/png" name="blog[imagen]" value="<?php echo s($blog->imagen); ?>">

        </fieldset>

        <input type="submit" class="boton boton-verde" value="Enviar">

    </form>
</main>