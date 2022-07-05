<?php declare(strict_types=1); 

    class ImageValidation{

        public function validate(array $file, $target_file, string $extension = '' ) : string | bool {
            // validamos que el archivo sea una imagén
            // getimagesize retorna la información de la imagén en un array asociativo
            // si el archivo no es una imagén entonces retorna false

            $is_image = $file['tmp_name'] != '' ? getimagesize($file["tmp_name"]) : false;
            $valid_type = $extension == 'jpg' or $extension == 'png' or $extension == 'jpeg' ? true : false;

            if($is_image != false){
                
                // validamos que la extensión no esté vacia
                if(empty($extension)){
                    //exit("Is empty");
                    return false;
                }

                // validamos la extensión
                if(!$valid_type){
                    //exit("Invalid extension");
                    return false;
                }  

                // validamos que el archivo no exista en la ruta especificada.
                // if(file_exists($target_file)){
                //     //exit("The file already exists");
                //     return false;
                // }

                // validar tamaño 500,000 = 500KB
                if($file["size"] > 500000 ){
                    //exit("The submited file is to heavy."); 
                    return false;
                }   

                // si todo está bien, cargamos el archivo y retornamos el nombre
                move_uploaded_file($file["tmp_name"], $target_file);
                return $file['name'];
            }
            else{
                //exit("Is not an image.");
                return false;
            }
           

        }

    }

?>