
# PROYECT 03 

Live Demo http://proyect003.000webhostapp.com/Proyect_03/index.php

Este proyecto se conecta a una  base de datos en mysql para almacenar la información; 
la idea de este proyecto es simular un sistema de gestión de usuarios y 
de gestión de productos, en el mismo podrás registrar usuarios, así como también editarlos 
y eliminarlos; también podrás registrar productos, en este caso lo ideal es que sean zapatos, 
editar productos y eliminarlos. Dentro de las tecnologías utilizadas
están: 

* HTML5 
* CSS 
* Bootstrap5 
* JavaScript 
* GSAP (animaciones)
* Php (back-end)
* Mysql (base de datos)      

En el fichero "./database" se encuentra un archivo "database.sql"
el cual nos permitirá recrear la base de datos que estamos utilizando.

Luego de recrear la base de datos deberá ajustar la cadena de 
conección en la ruta: "./database/database.manager.php".
sustituyendo las variables correspondientes.

    private string $serverName =   "localhost"; //host
    private string $dataBase =     'practica';
    private string $username=          "root";
    private string $password=              "";
    private int $port =                  3306;

# Pantallas  


## Pantalla de inicio
![pantalla inicio](/z-imagenes_de_funcionamiento/intro.png "pantalla de inicio")

Una vez en esta pantalla pulsamos la opción "User Management" para manejar los usuarios
 o la opción "Product Management" para manejar los productos.

## User Management - Home
![pantalla usuario01](/z-imagenes_de_funcionamiento/usuarios_home01.png "pantalla de usuarios01")
![pantalla usuario02](/z-imagenes_de_funcionamiento/usuarios_home02.png "pantalla de usuarios02")

Desde esta pantalla podremos agregar nuevos usuarios, así como también eliminar 
usuarios existentes.   

## User Management - Edit
![editar usuario01](/z-imagenes_de_funcionamiento/edit_user01.png "editar usuario01")
![editar usuario02](/z-imagenes_de_funcionamiento/edit_user02.png "editar usuario02")

Desde esta pantalla podremos editar la información de nuestro usuario.

## Product Management - Home
![pantalla productos01](/z-imagenes_de_funcionamiento/productos_home01.png "pantalla de productos01")
![pantalla productos02](/z-imagenes_de_funcionamiento/productos_home02.png "pantalla de productos02")

Desde esta pantalla podremos visualizar nuestro catálogo de productos (en este caso zapatos),
podremos eliminar y editar productos pulsando los iconos correspondientes en las tarjetas.

## Product Management - Add
![agregar productos01](/z-imagenes_de_funcionamiento/add_product01.png "agregar de productos01")
![agregar productos02](/z-imagenes_de_funcionamiento/add_product02.png "agregar de productos02")

Desde esta pantalla podremos agregar un nuevo producto, tenemos la posibilidad de agregar una imagen
que queramos (preferiblemente la de un zapato para ajustarse a la temática de la práctica)
las imágenes son guardadas en el fichero "./files" de nuestro proyecto.

## Product Management - Edit
![editar productos01](/z-imagenes_de_funcionamiento/edit_product01.png "editar productos01")
![editar productos02](/z-imagenes_de_funcionamiento/edit_product02.png "editar productos02")

Desde esta pantalla podremos editar toda la información de nuestro producto: 
cambiar el stock, cambiar la imagen u el nombre de nuestro producto.

## Menú 
![menu](/z-imagenes_de_funcionamiento/menu.png "menu")

Desde el menú podremos movernos de un área a otra.

