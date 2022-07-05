<?php
    $path = $_SERVER['DOCUMENT_ROOT']."/Proyect_03";
    $img_path = "../../files/";
    $path_r = "../.."; // relative path

    include_once("$path/views/layout.php");
    include_once("$path/controller/product.controller.php");

    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    $deleted='';
    if(isset($url_components['query'])){
        parse_str($url_components['query'], $params);
        $deleted = (bool) $params['deleted'];
    }

    $controller = new ProductController();
    $list_of_products = $controller->getProducts();

?>

    <main class="h-full mb-5">
        <div class=" page-title h-min-70vh mb-5 text-yellow bg-dark-prestige d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h5 class="display-5 mb-3 ">Listado de productos</h5>
                <p class="lead text-whiter">Administra tu catálogo de productos.</p>
                <a href="./add.php" class="btn btn-outline-light rounded-pill link">
                    Agregar producto
                </a>
            </div>
        </div>

        <div class="container p-md-0 h-min-90vh pb-5" id="items">
            <div class="mb-4">
                <h5 class="title-product text-yellow">Zapatos</h5>
                <p class="text-muted">
                    Catálogo de zapatos.
                </p>
            </div>
            <div class="row">

                <?php
                    if($list_of_products != null){
                        foreach($list_of_products as $product){
                            echo (
                                  "  <div class='col-8 col-sm-6 col-md-4 col-lg-3 ps-1 pe-1 mb-3 mx-auto mx-md-0'>
                                        <div class='product-card card shadow-sm border-0 h-100'>
                                            <div class='icon-box ps-2'>
                                                <a class='me-2 text-decoration-none mt-1' href='$path_r/controller/product.controller.php?edit=true&id=$product->id'>
                                                    <i class='fa-solid fa-pen-to-square icon text-muted' title='editar'></i>
                                                </a>
                                                <a class='text-decoration-none mt-2' href='$path_r/controller/product.controller.php?delete=true&id=$product->id'>
                                                    <i class='fa-solid fa-trash-can icon text-muted' title='eliminar'></i>
                                                </a>
                                            </div>
                                            <div class='img-card rounded-top'>
                                                <img class='rounded-top image' title='$product->name' 
                                                     src='$img_path/$product->image' alt='$product->image'>
                                            </div>
                                           
                                            <div class='card-body pb-0 mt-0 pt-2'>
                                                <h6 class='italic m-0 p-0'>$product->name</h6>
                                            </div>
                                            <div class='card-footer bg-white text-end border-0 pt-2 mt-0 pe-0'>
                                                <div class='bg-blue col-7 col-lg-5 text-white text-center ms-auto r-pill-s'>
                                                    <p class='m-0 p-0 stock'>stock ($product->stock)</p>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>"
                            );
                        }    
                    }            
                    else{
                        echo(
                            "
                             <div class='shadow-sm rounded p-3 col-12 col-md-6 bg-white border-start border-danger border-5'>
                                Por el momento no hay información disponible.
                             </div>
                            "
                        );
                    }
                ?>

            </div>
        </div>

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
    
<?php
  include_once("$path/views/footer.php");
?>