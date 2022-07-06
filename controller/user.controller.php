<?php declare(strict_types=1);

    $path = dirname(__DIR__);
    include_once("$path/database/database.manager.php");
    include_once("$path/functions/user.convert.php");
    include_once("$path/functions/redirection.manager.php");

    class UserController {

        private DataBaseManager $db;
        private UserModelManager $user;
        private RedirectionManager $redirect;
        private string $go;
        
        public function __construct(){

            $this->db = new DataBaseManager();
            $this->user = new UserModelManager();
            $this->redirect = new RedirectionManager(true);
            $this->go = $this->redirect->path;
        }

        // ##### REQUESTs Handler #####
        public function Handler(){

            // POST REQUESTs ###########################
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                if($_POST['submit'] == 'addUser'){
                    $this->addUser();
                }
                if($_POST['submit'] == 'updateUser'){
                    $this->updateUser();
                }
            }

            // GET REQUESTs  ###########################
            if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if(isset($_GET["delete"]) && isset($_GET['id'])){
                    $this->deleteUser();
                }
                if(isset($_GET["edit"]) && isset($_GET['id'])){
                    $this->editUser();
                }
            }

        }

        public function getUsers() : array | null {

            $sql = "SELECT * FROM usuarios";
            $result = $this->db->run()->query($sql);
            $list = $this->user->ToArray($result);
            return $list;
        }

        public function getUser(int $user_id) : User | null
        {   
            $sql = "SELECT * FROM usuarios WHERE id = $user_id";
            $data = $this->db->run()->query($sql)->fetch_assoc();
            $get_user = $this->user->ToObject($data);
            return $get_user;
        }

        public function addUser(){

            $add = $this->user->ToObject($_POST);
            $sql = "INSERT INTO usuarios (NOMBRE, APELLIDO, EDAD) 
                    VALUES(
                        '$add->nombre', 
                        '$add->apellido', 
                        '$add->edad'
                    )";
            
            $this->db->run()->query($sql);
           
            header("Location:{$this->go}/views/user/home.php#main");
            exit;
        }

        public function deleteUser(){

            $user_id = $_GET['id'];
            $sql = "DELETE FROM usuarios WHERE ID = $user_id";
            $this->db->run()->query($sql);
            header("Location:{$this->go}/views/user/home.php?deleted=true#main");
            exit;
        }

        public function editUser(){
            $user_id = $_GET['id'];
            header("Location:{$this->go}/views/user/edit.php?id=$user_id");
            exit;
        }

        public function updateUser(){

            $user = $this->user->ToObject($_POST);
            $sql = "UPDATE usuarios 
                    SET NOMBRE='$user->nombre',
                        APELLIDO='$user->apellido',
                        EDAD='$user->edad'
                    WHERE id = $user->id";
                    
            $this->db->run()->query($sql);

            header("Location:{$this->go}/views/user/home.php#main");
            exit;
        }

    }

    if($_SERVER["REQUEST_METHOD"]){
        $controller = new UserController();
        $controller->Handler();
    }

?>

