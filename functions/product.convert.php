<?php declare(strict_types=1);

    $path = dirname(__DIR__);
    include_once("$path/model/product.model.php");

    class ProductModelManager{

        private Product $product;
        
        public function ToArray( mysqli_result $products ) : array | null  {

            $list = array();
            if($products->num_rows > 0){
                while($row = $products->fetch_assoc())
                {
                    $this->product = new Product(
                        (string)$row['NAME'],
                        (int) $row['STOCK'],
                        (string) $row['IMAGE'],
                        (string) $row['TIPO'],
                        (int) $row['ID']
                    );
                    array_push($list, $this->product);
                }
                return $list;
            }
            return null;
        }

        public function ToObject( array $data, string $image_name='' ) : Product  {
            
            $tipo = "zapato";
            $arr = array_change_key_case($data, CASE_LOWER);
            if(!isset($arr['id'])){
                // el producto es nuevo por lo tanto no tiene id
                $add = (object) $arr;
                $this->product = new Product(
                    (string) $add->name,
                    (int) $add->stock,
                    (string) $image_name,
                    (string) $tipo,
                );

                return $this->product;
            }
            else {
                $add = (object) $arr;
                $this->product = new Product(
                    (string) $add->name,
                    (int) $add->stock,
                    (string) $image_name,
                    (string) $tipo,
                    (int) $add->id
                );

                return $this->product;
            }
        }

    }

?>