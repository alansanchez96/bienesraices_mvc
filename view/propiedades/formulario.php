<fieldset>
    <legend>Informacion General</legend>
    
    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Ingresa un valor neto" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg , image/png" name="propiedad[imagen]">

        <?php if($propiedad->imagen): ?>
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
        <?php endif; ?>
    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Minimo 50 caracteres"><?php echo s($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Informacion sobre Propiedad</legend>

    <label for="habitaciones">Cantidad de Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" min="1" value="<?php echo s($propiedad->habitaciones); ?>" placeholder="Ej: 8">

    <label for="wc">Cantidad de baños</label>
    <input type="number" id="wc" name="propiedad[wc]" min="1" max="9" value="<?php echo s($propiedad->wc); ?>" placeholder="Ej: 2">

    <label for="estacionamiento">Cantidad de estacionamientos</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>" placeholder="Ej: 1">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
        <label for="vendedor">Vendedor</label>
        <select name="propiedad[vendedorId]" id="vendedor">
                <option selected disabled value="">-- Selecciona un vendedor --</option>
            <?php foreach($vendedores as $vendedor): ?>
                <option 
                    <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
                    value="<?php echo s($vendedor->id); ?>">
                    <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
                </option>
            <?php endforeach; ?>
        </select>
</fieldset>





