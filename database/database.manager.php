<?php declare(strict_types=1); 

    class DataBaseManager{

        private string $serverName =   "localhost"; //host
        private string $dataBase =     'practica';
        private string $username=          "root";
        private string $password=              "";
        private int $port =                  3306;
        private mysqli $connection;

        public function __construct(){
            $this->connection = new mysqli(
                $this->serverName, 
                $this->username, 
                $this->password, 
                $this->dataBase, 
                $this->port
            ) or die ('<div class="p-3 bg-danger text-white">Fail to connect.</div>'); 
        }

        public function run() : mysqli {
            return $this->connection;
        }

    }

?>