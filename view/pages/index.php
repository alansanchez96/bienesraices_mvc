<main class="contenedor seccion">

    <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>

    <?php include 'iconos.php'; ?>

</main>



<section class="seccion contenedor">
    <h2 data-cy="heading-propiedades">Casas y Departamentos en Ventas</h2>

        <?php 
            include __DIR__ .'/listado.php';
        ?>


    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver todas</a>
    </div>
</section>



<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto a la brevedad.</p>
    <a href="/contacto" class="boton-amarillo_contact">Contactanos</a>
</section>

<div class="contenedor seccion grid-section">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <?php 
            include __DIR__ . '/../blog/articulos-blog.php';
        ?>
       
    </section>
    
    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Alan D. Sanchez</p>
        </div>
    </section>

</div>