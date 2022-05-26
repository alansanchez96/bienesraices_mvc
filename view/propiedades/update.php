<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton boton-verde">Ir a Propiedades</a>
    <!-- Imprime un error *Campo sin rellenar* -->
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data" >

        <?php include __DIR__ . '/formulario.php' ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>