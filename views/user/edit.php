<?php declare(strict_types=1);
    // $path = dirname(__DIR__);
    $path = "$_SERVER[DOCUMENT_ROOT]/Proyect_03";
    $path_ = str_replace(DIRECTORY_SEPARATOR,'/', $path);
    $path_r = "../.."; // relative path

    include_once("$path_/controller/user.controller.php");
    include_once("$path_/views/layout.php");

    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = (int) $params['id'];

    $controller = new UserController();
    $user = $controller->getUser($id);
    
?>

    <main class="h-full bg-light pb-5">
        <div class="page-title h-min-70vh mb-5 text-yellow bg-dark-prestige d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h5 class="display-5 mb-3">Editar usuario</h5>
                <p class="lead text-whiter">Edita la información del usuario seleccionado.</p>
                <a href="./home.php" class="btn btn-outline-light rounded-pill link">
                    Ver listado de usuarios
                </a>
            </div>
        </div>
       <div class="container mb-5">
            <div class="bg-white p-3 pb-4 mx-auto col-12 col-md-4 rounded shadow">
                <form action="<?php print_r("$path_r/controller/user.controller.php") ?>" method="post">
                    <fieldset>
                        <input class="form-control rounded-pill d-none " type="hidden" 
                                name="id" value="<?php print_r($user->id) ?>"/>
                    </fieldset>

                    <fieldset class="mb-2 p-2">
                        <label class="text-product" for="nombre">Nombre</label>
                        <input class="form-control rounded-pill" type="text" maxlength="27" required
                                name="nombre" id="nombre" value="<?php print_r($user->nombre) ?>"/>
                    </fieldset>
                    
                    <fieldset class="mb-2 p-2">
                        <label class="text-product" for="apellido">Apellido</label>
                        <input class="form-control rounded-pill" type="text" maxlength="30" required
                                name="apellido" id="apellido" value="<?php print_r($user->apellido) ?>"/>
                    </fieldset>

                    <fieldset class="mb-3 p-2">
                        <label class="text-product" for="edad">Edad</label>
                        <input class="form-control  rounded-pill" type="number" required
                                name="edad" id="edad" value="<?php  print_r($user->edad) ?>"/>
                    </fieldset>
                    <button name="submit" value="updateUser" class="form-control rounded-pill btn bg-dark-prestige text-yellow shadow-sm" type="submit">
                        Actualizar
                    </button>
                </form>
            </div>
       </div>
    </main>
    
<?php include_once("$path/views/footer.php"); ?>