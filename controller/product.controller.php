<?php declare(strict_types=1); 

    $path = dirname(__DIR__);
    include_once("$path/database/database.manager.php");
    include_once("$path/functions/product.convert.php");
    include_once("$path/functions/image.validation.php");
    include_once("$path/functions/redirection.manager.php");
    
    class ProductController{

        private DataBaseManager $db;
        private ProductModelManager $product;
        private ImageValidation $img;
        private RedirectionManager $redirect;
        private string $go;

        public function __construct(){
            $this->db = new DataBaseManager();
            $this->product = new ProductModelManager();
            $this->img = new ImageValidation();
            $this->redirect = new RedirectionManager(true);
            $this->go = $this->redirect->path;
        } 

        // ##### REQUESTs Handler #####
        public function Handler(){

            // POST REQUESTs ###########################
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                if($_POST['submit'] == 'addProduct'){
                    $this->addProduct();
                }
                if($_POST['submit'] == 'updateProduct'){
                    $this->updateProduct();
                }
            }

            // GET REQUESTs  ###########################
            if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if(isset($_GET["delete"]) && isset($_GET['id'])){
                    $this->deleteProduct();
                }
                if(isset($_GET["edit"]) && isset($_GET['id'])){
                    $this->editProduct();
                }
            }

        }

        public function getProducts(){
            $sql = "SELECT * FROM productos";
            $data = $this->db->run()->query($sql);
            $list = $this->product->ToArray($data);
            return $list;
        }

        public function getProduct( int $id_product){
            $sql = "SELECT * FROM productos WHERE id = $id_product";
            $data = $this->db->run()->query($sql)->fetch_assoc();
            $get_product = $this->product->ToObject($data, $data['IMAGE']);
            return $get_product;
        }

        public function addProduct(){
            $file = $_FILES["image"]; // el array asociativo[image] en su indice [name]
            $file_name = $file['name'];

            $target_dir = "../files/";  // ruta relativa donde guardaremos el archivo
            $target_file = $target_dir . basename($file_name); // ruta completa donde guardaremos el archivo
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // obtenemos la extensión del archivo
          
            // validamos el archivo
            $image = $this->img->validate($file, $target_file, $image_type);
            if($image != false){
                
                $prod = $this->product->ToObject($_POST, $image);
                $sql = "INSERT INTO 
                        productos (
                            productos.NAME, 
                            productos.STOCK, 
                            productos.IMAGE, 
                            productos.TIPO
                        )
                        VALUES (
                            '$prod->name',
                            '$prod->stock',
                            '$prod->image', 
                            '$prod->tipo'
                        )";

                $this->db->run()->query($sql);
                header("Location:{$this->go}/views/product/home.php#items");   
                exit;        
            }

            exit('Lo sentimos pero ha ocurrido un error al cargar la imagen.');
            
        }

        public function deleteProduct(){
            $id_prod = $_GET['id'];
            $sql = "DELETE FROM productos WHERE ID = $id_prod";
            $this->db->run()->query($sql);
            header("Location:{$this->go}/views/product/home.php?deleted=true#items");  
            exit;
        }

        public function editProduct(){
            $id_product = $_GET['id'];
            header("Location:{$this->go}/views/product/edit.php?id=$id_product");  
            exit;
        }

        public function updateProduct(){
            $file = $_FILES["image"]; // el array asociativo[image] en su indice [name]
            $file_name = $file['name'];

            $target_dir = "../files/";  // ruta relativa donde guardaremos el archivo
            $target_file = $target_dir . basename($file_name); // ruta completa donde guardaremos el archivo
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // obtenemos la extensión del archivo
          
            // validamos el archivo (si lo hay)
            $image = $file_name != '' ? $this->img->validate($file, $target_file, $image_type) : '';
            $prod = $this->product->ToObject($_POST, $image);
            $sql = '';
            if($image != false){
                // si tenemos imagén
                $sql = "UPDATE productos 
                        SET 
                            productos.NAME = '$prod->name', 
                            productos.STOCK = '$prod->stock', 
                            productos.IMAGE = '$prod->image', 
                            productos.TIPO = '$prod->tipo' 
                        WHERE ID = $prod->id";
            } else {
                // si no tenemos imagén
                $sql = "UPDATE productos 
                        SET 
                            productos.NAME = '$prod->name', 
                            productos.STOCK = '$prod->stock', 
                            productos.TIPO = '$prod->tipo' 
                        WHERE ID = $prod->id";
            }

            $this->db->run()->query($sql);
            header("Location:{$this->go}/views/product/home.php#items");   
            exit;
        }
    }

    if($_SERVER['REQUEST_METHOD']){
        $controller = new ProductController();
        $controller->Handler();
    }

?>