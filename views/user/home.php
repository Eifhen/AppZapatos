<?php declare(strict_types=1);
    // $path = dirname(__DIR__);
    $path = "$_SERVER[DOCUMENT_ROOT]/Proyect_03";
    $path_ = str_replace(DIRECTORY_SEPARATOR,'/', $path);
    $path_r = "../.."; // relative path

    include_once("$path_/controller/user.controller.php");
    include_once("$path_/views/layout.php");
    
    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    $deleted='';
    if(isset($url_components['query'])){
        parse_str($url_components['query'], $params);
        $deleted = (bool) $params['deleted'];
    }
    
    $controller = new UserController();
    $list_of_users = $controller->getUsers();
    $caption = new stdClass();
    $caption->text = isset($list_of_users) ? "List of users" : "Sin datos.";
    $caption->class = isset($list_of_users) ? "text-end" : "text-center";
?>

    <main class=" h-full bg-light pb-5">
        <div class="page-title h-min-70vh mb-5 text-yellow bg-dark-prestige d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h5 class="display-5 mb-3">Administra tus usuarios</h5>
                <p class="lead text-whiter">Agrega, elimina y edita tus usuarios.</p>
            </div>
        </div>
        <section id="main" class="container mb-5">
            <div class="mb-4">
                <h5 class="title-product text-yellow">Agregar un usuario</h5>
                <p class="text-muted">
                    Completa el formulario para agregar un nuevo usuario.
                </p>
            </div>
            <div class="row section">
                <div class="col-12 col-md-5 h-min-60vh mb-5 mb-md-0">
                    <div class="mx-auto rounded col-12 p-3 bg-white shadow-sm h-100">
                        <form action="<?php print_r("$path_r/controller/user.controller.php") ?>" method="post">

                            <fieldset class="mb-2 p-2">
                                <label for="nombre">Nombre</label>
                                <input class="form-control   rounded-pill" type="text" maxlength="27" required
                                       name="nombre" id="nombre" placeholder="Agregar nombre"/>
                            </fieldset>
                            
                            <fieldset class="mb-2 p-2">
                                <label for="apellido">Apellido</label>
                                <input class="form-control  rounded-pill" type="text" maxlength="30" required
                                       name="apellido" id="apellido" placeholder="Agregar apellido"/>
                            </fieldset>

                            <fieldset class="mb-3 p-2">
                                <label for="edad">Edad</label>
                                <input class="form-control  rounded-pill" type="number" required
                                       name="edad" id="edad" placeholder="Agregar edad"/>
                            </fieldset>
                            <button name="submit" value="addUser" class="form-control rounded-pill btn bg-dark-prestige text-yellow shadow-sm" type="submit">
                                Guardar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-7 h-60vh">
                    <div class= "col-12 p-3 shadow-sm bg-white rounded scroll-control h-100">
                        <table class="table mb-0 mx-auto  ">
                            <?php 
                                echo("<caption class='$caption->class'>$caption->text</caption>")
                            ?>
                           
                            <thead class="t-head border-top-0 border-start-0 border-end-0 border-2 ">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Edad</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="t-body ">
                                <?php
                                    if($list_of_users != null){
                                        foreach($list_of_users as $user){
                                            echo(
                                                "<tr>
                                                    <td class='align-middle'>$user->id</td>
                                                    <td class='align-middle'>$user->nombre</td>
                                                    <td class='align-middle'>$user->apellido</td>
                                                    <td class='align-middle'>$user->edad</td>
                                                    <td class='align-middle'>
                                                        <a href='$path_r/controller/user.controller.php?edit=true&id=$user->id' class='me-2 text-decoration-none' alt='edit user' title='edit user'>
                                                            <i class='fa-solid fa-pen-to-square icon text-muted' title='editar'></i>
                                                        </a>
                                                        <a href='$path_r/controller/user.controller.php?delete=true&id=$user->id' alt='delete user' title='delete user'>
                                                            <i class='fa-solid fa-trash-can icon text-muted' title='eliminar'></i>
                                                         </a>
                                                    </td>
                                                </tr>"
                                            );
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php
            // Toast
           if($deleted != ''){
                echo("
                    <div class='position-fixed bottom-0 end-0 p-3' style='z-index: 11'>
                        <div id='delete_toast' data='$deleted' class='toast  bg-danger text-white' role='alert' aria-live='assertive' aria-atomic='true'>
                            <div class='toast-body'>
                                <div class='p-0 d-flex justify-content-between'>
                                    <strong >Registro eliminado</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                </div>
                                <p class='p-0 m-0'>El elemento ha sido eliminado correctamente de la base de datos.</p>
                            </div>
                        </div>
                    </div>                
                ");
           }
        ?>
    </main>
    
<?php include_once("$path/views/footer.php"); ?>