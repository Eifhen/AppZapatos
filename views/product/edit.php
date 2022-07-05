<?php declare(strict_types=1);

    $path = $_SERVER['DOCUMENT_ROOT']."/Proyect_03";
    $path_r = '../..';
    
    include_once("$path/views/layout.php");
    include_once("$path/controller/product.controller.php");

    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);

    $controller = new ProductController();
    $product = $controller->getProduct((int)$params['id']);

?>

    <main class="h-full bg-light pb-4">
        <div class="page-title h-min-70vh mb-5 text-yellow bg-dark-prestige d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h5 class="display-5 mb-3">Edita tu producto</h5>
                <p class="lead text-whiter">Edita los productos de tu catálogo.</p>
                <a href="./home.php" class="btn btn-outline-light rounded-pill link">
                    Ver listado de productos
                </a>
            </div>
        </div>
        <div class="container p-md-0 h-min-70vh mb-5">
            <div class="col-12 col-md-6 mx-auto p-3 rounded shadow-sm  bg-white">
                <form id="form_image" action="<?php print_r("$path_r/controller/product.controller.php?")?>" 
                      method="POST" enctype="multipart/form-data">
                    
                    <fieldset>
                        <input name="id" type="hidden" class="d-none invisible" value='<?php echo $product->id?>'>
                    </fieldset>

                    <fieldset class="mb-3">
                        <label class="mb-2  text-product" for="stock">Nombre del artículo:</label>
                        <input class="form-control form-control-sm rounded-pill" maxlength="27" required
                                type="text" name="name" id="stock" placeholder="Nombre del producto" 
                                value='<?php echo $product->name ?>' />
                    </fieldset>
                    
                    <fieldset class="mb-3">
                        <label class="mb-2  text-product" for="stock">Stock:</label>
                        <input class="form-control form-control-sm rounded-pill"  required
                                type="number" name="stock" id="stock" placeholder="Stock del producto" 
                                value='<?php echo $product->stock ?>'/>
                    </fieldset>
                    
                    <fieldset class="mb-3">
                        <label class="mb-2  text-product" for="tipo">Tipo de producto:</label>
                        <input class="form-control form-control-sm rounded-pill text-muted" disabled
                                type="text" name="tipo" id="tipo" value="Zapatos" />
                        <small class="italic ">-Por el momento solo puedes agregar zapatos.</small>
                    </fieldset>
                    
                    <fieldset class="mb-3">
                        <div id="img_container" class="imgBox mx-auto rounded  bg-light mb-3 d-flex">
                            <img class="image rounded d-none" id="show_img" data='<?php echo $product->image ?>' 
                                 src='<?php echo("$path_r/files/$product->image") ?>' alt="image">
                            <h6 id="img_text" class="text-muted align-self-center mx-auto">
                                Cargar Imagén
                            </h6>
                        </div>
                        <label class="form-label text-product" for="image" >Cargar imagén</label>
                        <input class="form-control form-control-sm" name="image" id="image" type="file" >
                        <small class="italic ">-Carga la imagén de un zapato.</small>
                    </fieldset>
                    
                    <button name="submit" value="updateProduct" class="form-control rounded-pill btn bg-dark-prestige text-yellow shadow-sm" type="submit">
                         Actualizar Producto
                    </button>

                </form>
            </div>
        </div>
    </main>

 

<?php
  include_once("$path/views/footer.php");
?>