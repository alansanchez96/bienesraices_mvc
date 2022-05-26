<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <!-- Imprime un error *Campo sin rellenar* -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST">

            <fieldset>
                <legend>Email y Contraseña</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Ingresa tu Email" id="email" >

                <label for="pw">Contraseña</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña" id="pw">
                
            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
        

    </main>