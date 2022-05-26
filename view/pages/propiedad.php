<div class="anuncios">
    <main class="contenedor seccion contenido-centrado">

        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo; ?></h1>
    
        <div class="imagen-anuncio">

                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de casa en venta">

        </div>
        <div class="contenido-anuncio">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="../build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="../build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img loading="lazy" src="../build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad->descripcion; ?></p>
        </div>
    </main>
</div>