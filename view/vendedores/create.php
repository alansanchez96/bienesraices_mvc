<main class="contenedor seccion">
        <h1>Panel de Registros</h1>
        <h3>Registro de Vendedores</h3>
        <a href="/admin" class="boton boton-verde">Ir a Administrador</a>
        <!-- Imprime un error *Campo sin rellenar* -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data" >

            <?php include __DIR__ . '/formulario.php'; ?>

            <input type="submit" value="Registrar" class="boton boton-verde">
        </form>


    </main>