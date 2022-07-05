<?php declare(strict_types=1);


    class User {

        public int $id;
        public string $nombre;
        public string $apellido;
        public int $edad;

        public function __construct(string $_nombre, string $_apellido, int $_edad, int $_id = 0){

            $this->id = $_id;
            $this->nombre = $_nombre;
            $this->apellido = $_apellido;
            $this->edad = $_edad;
            
        }


    }


?>