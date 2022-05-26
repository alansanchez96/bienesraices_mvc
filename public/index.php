<?php 

    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;
    use Controllers\PropiedadController;
    use Controllers\VendedoresController;
    use Controllers\PageController;
    use Controllers\LoginController;

    $router = new Router();

    // ZONA PRIVADA
    
    /* Propiedades */
    $router->getUrl('/admin', [PropiedadController::class, 'index'] );
    
    $router->getUrl('/propiedades/create', [PropiedadController::class, 'create'] );
    $router->postUrl('/propiedades/create', [PropiedadController::class, 'create'] );
    
    $router->getUrl('/propiedades/update', [PropiedadController::class, 'update'] );
    $router->postUrl('/propiedades/update', [PropiedadController::class, 'update'] );

    $router->postUrl('/propiedades/delete', [PropiedadController::class, 'delete'] );

    /* Vendedores */
    $router->getUrl('/vendedores/create', [VendedoresController::class, 'create'] );
    $router->postUrl('/vendedores/create', [VendedoresController::class, 'create'] );
    
    $router->getUrl('/vendedores/update', [VendedoresController::class, 'update'] );
    $router->postUrl('/vendedores/update', [VendedoresController::class, 'update'] );

    $router->postUrl('/vendedores/delete', [VendedoresController::class, 'delete'] );
    
    /* Blogs */
    $router->getUrl('/blog/admin-blog', [PageController::class, 'view'] );/* 
    $router->postUrl('/blog/admin-blog', [PageController::class, 'delete'] ); */

        
    
    // ZONA PUBLICA

    $router->getUrl('/', [PageController::class, 'index']);
    $router->getUrl('/nosotros', [PageController::class, 'nosotros']);
    $router->getUrl('/propiedades', [PageController::class, 'propiedades']);
    $router->getUrl('/propiedad', [PageController::class, 'propiedad']);
    $router->getUrl('/blog', [PageController::class, 'blog']);
    $router->getUrl('/blog/create-blog', [PageController::class, 'createBlog']);
    $router->postUrl('/blog/create-blog', [PageController::class, 'createBlog']);
    $router->getUrl('/blog/entrada', [PageController::class, 'entrada']);
    $router->postUrl('/blog/delete', [PageController::class, 'delete']);
    $router->getUrl('/contacto', [PageController::class, 'contacto']);
    $router->postUrl('/contacto', [PageController::class, 'contacto']);

    // Auth y Login-out

    $router->getUrl('/login', [LoginController::class, 'login']);
    $router->postUrl('/login', [LoginController::class, 'login']);
    
    $router->getUrl('/logout', [LoginController::class, 'logout']);




    $router->comprobarRutas();