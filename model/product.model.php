<?php declare(strict_types=1); 

    class Product {

        public int $id;
        public string $name;
        public int $stock;
        public string $image;
        public string $tipo;

        public function __construct(string $_name, int $_stock, string $_image, string $_tipo, int $_id = 0){
            $this->id = $_id;
            $this->name = $_name;
            $this->stock = $_stock;
            $this->image = $_image;
            $this->tipo = $_tipo;
        }

    }

?>