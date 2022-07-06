
<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./index.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Proyect 03</title>
</head>
<body>
    <main class="h-full bg-light d-flex wallpaper">

        <div class="page-title col-12 pb-4 pt-5 p-1 p-md-3 align-self-center text-center opacity-1 bg-dark-prestige text-white shadow-lg">
            <div class="pt-3">
                <h1 class="display-4 text-yellow">
                    Proyect 03
                </h1>
                <p class="lead text-light text-brek">
                    Aplicación de práctica: gestión catálogo de zapatos.
                </p>
                <p class="description col-12 col-md-10 col-lg-5 mx-auto text-break ">
                    Este proyecto se conecta a una  base de datos en mysql para almacenar la información; 
                    la idea de este proyecto es simular un sistema de gestión de usuarios y 
                    de gestión de productos, en el mismo podrás registrar usuarios, así como también editarlos 
                    y eliminarlos; también podrás registrar productos, en este caso lo ideal es que sean zapatos, 
                    editar productos y eliminarlos. dentro de las tecnologías utilizadas
                    están: <br class="d-none d-md-block">
                    <span class="text-yellow">HTML5, CSS, Bootstrap5, JavaScript, GSAP, Php, Mysql.</span>
                </p>
            </div>
            
            <div class="d-flex justify-content-center">
                <div class="nav-item">
                    <a class="btn btn-outline-light border rounded-pill me-4 user-management" href="<?php print_r("./views/user/home.php")?>">
                        Users Management
                    </a>
                </div>
                <div class="nav-item">
                    <a class="btn btn-outline-light border rounded-pill product-management" href="<?php print_r("./views/product/home.php")?>">
                        Product Management
                    </a>
                </div>
            </div>

            <div class="pt-3">
                <p class="small text-muted">
                    By <br>
                    Gabriel Jiménez
                </p>
            </div>
        </div>

    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" defer></script>
    <script src="./scripts/animations.js" defer></script>
    <script src="./scripts/intro.animation.js" defer></script>
</body>
</html>