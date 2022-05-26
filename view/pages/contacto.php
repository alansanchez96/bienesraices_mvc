<main class="contenedor seccion">

    <h1>Contacto</h1>

    <?php 
        if($mensaje === "Mensaje enviado correctamente."){ ?>
            <p class="alerta correcto"><?php echo $mensaje; ?></p>
        <?php } elseif($mensaje === "Error inesperado. Mensaje no enviado."){ ?>
            <p class="alerta error"><?php echo $mensaje; ?></p>
    <?php } ?>

<!-- AGREGAR ESTO ULTIMO DE ANOCHE -->

    <picture>
        <source srcset="../build/img/destacada3.webp" type="image/webp">
        <source srcset="../build/img/destacada3.jpg" type="image/jpeg">
        <img src="../build/img/destacada3.jpg" alt="Imagen de ingreso a formulario">
    </picture>

    <h2>Llena el formulario</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Ingresa tu nombre" id="nombre" name="contacto[nombre]" >

            <label for="mensaje">Tu mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
        
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>-- Seleccionar --</option>
                <option value="comprar">Comprar</option>
                <option value="vender">Vender</option>
            </select>
        
            <label for="precio_presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Ingresa Presupuesto / Precio" id="precio_presupuesto" name="contacto[presupuesto]" >

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            
            <p>Como desea ser contactado</p>

            <div class="form-contacto">
                <label for="contact-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contact-telefono" name="contacto[contactar]">

                <label for="contact-email">E-mail</label>
                <input type="radio" value="email" id="contact-email" name="contacto[contactar]">            
            </div>

            <div id="contacto"></div>
            

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>
</main>