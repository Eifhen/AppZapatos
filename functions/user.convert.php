<?php declare(strict_types=1);

    $path = dirname(__DIR__);
    include_once("$path/model/user.model.php");

    class UserModelManager{

        private User $user;
        
        // Convierte un array asociativo en un array de objectos de tipo User
        public function ToArray( mysqli_result $users ) : array | null {

            $list = array();
            if($users->num_rows > 0){
                while($row = $users->fetch_assoc()){
                    $this->user = new User(
                        (string)$row['NOMBRE'],
                        (string)$row['APELLIDO'],
                        (int) $row['EDAD'],
                        (int)$row['ID']
                    );
                    array_push($list, $this->user);
                }
                return $list;
            }
            
            return null;
        }

        // convierte un array asociativo en un objeto de tipo User
        public function ToObject( array $data ) : User | null {
            // Recibe un array asociativo con el usuario en cuestion
            // The PHP array_change_key_case() Function is used to 
            // convert all the keys in the array to Uppercase or Lowercase.

            $arr =  array_change_key_case($data, CASE_LOWER);
            if(!isset($arr['id'])){
                // el usuario es nuevo por lo tanto no tiene id
                $add = (object)$arr;
                $this->user = new User(
                    (string) $add->nombre,
                    (string) $add->apellido,
                    (int) $add->edad
                );
                return $this->user;
            }
            else{
                $add = (object)$arr;
                $this->user = new User(
                    (string) $add->nombre,
                    (string) $add->apellido,
                    (int) $add->edad,
                    (int) $add->id
                );
                return $this->user;
            }
        }

    }

?>