<fieldset>
    <legend>Informacion General</legend>
    
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedores[nombre]" placeholder="Nombre" value="<?php echo s($vendedores->nombre); ?>">
    
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido" value="<?php echo s($vendedores->apellido); ?>">
    
    <label for="imagen">Imagen de Perfil</label>
    <input type="file" id="imagen" accept="image/jpeg , image/png" name="vendedores[imagen]">
        <?php if($vendedores->imagen): ?>
            <img src="/admin/vendedores/imagenes/<?php echo $vendedores->imagen; ?>" class="imagen-small">
        <?php endif; ?>
    
</fieldset>

<fieldset>
    <legend>Informacion de Contacto</legend>

    <label for="tel">Telefono</label>
    <input type="tel" id="tel" name="vendedores[telefono]" placeholder="Numero Telefonico" value="<?php echo s($vendedores->telefono); ?>">
    
    <label for="email">E-mail</label>
    <input type="email" id="email" name="vendedores[email]" placeholder="Correo Electronico" value="<?php echo s($vendedores->email); ?>">
        
</fieldset>