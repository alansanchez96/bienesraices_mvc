<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    
    <?php if( intval($resultado) === 1): ?>
            <p class="alerta correcto">Creado correctamente.</p>
        <?php elseif( intval($resultado) === 2):  ?>
            <p class="alerta actualizado">Actualizado correctamente.</p>
        <?php elseif( intval($resultado) === 3):  ?>
            <p class="alerta error">Eliminado correctamente.</p>
        <?php elseif( intval($resultado) === 4):  ?>
            <p class="alerta correcto">Log-In Exitoso</p>
        <?php endif; ?>

    <a href="propiedades/create" class="boton boton-verde">Crear Propiedad</a>
    <a href="vendedores/create" class="boton boton-amarillo_contact">Registrar Vendedores</a>
    <a href="blog/admin-blog" class="boton boton-amarillo_contact">Administrador de Articulos</a>
    

    <h2>Propiedades</h2>

    <div class="div">
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($propiedad as $propiedad): ?>
                
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td>
                        <img class="casa-img" src="imagenes/<?php echo $propiedad->imagen; ?>">
                    </td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/delete">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojoBlock">
                        </form>
                        <a href="propiedades/update?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            
            </tbody>

        </table>
    </div>

    <h2>Vendedores</h2>

    <div class="div">
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($vendedores as $vendedor): ?>
                
                    <tr>
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                        <td>
                            <img class="casa-img" src="/imagenes_vendedores/<?php echo $vendedor->imagen; ?>">
                        </td>
                        <td><?php echo $vendedor->telefono; ?></td>
                        <td><?php echo $vendedor->email; ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/delete">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" value="Eliminar" class="boton-rojoBlock">
                            </form>
                            <a href="/vendedores/update?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            
            </tbody>

        </table>
    </div>

</main>