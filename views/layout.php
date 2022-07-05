<?php declare(strict_types=1);
    // $path = dirname(__DIR__);
    // $path_ = str_replace(DIRECTORY_SEPARATOR,'/', $path);
    $path_r = "../.."; // relative path

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../index.css" rel="stylesheet"/>
    <title>Proyect 03</title>
</head>
<body class="bg-light">
    <header>
        <nav class="navbar navbar-nav  navbar-light bg-white shadow">
            <div class="container">
                <div class="navbar-brand">
                    <a class="text-decoration-none" href="<?php print_r("$path_r/index.php")?>">
                        <h4 class="m-0 p-0 display-6 text-dark">Proyect 03</h4> 
                        <small class=" m-0 p-0 text-yellow text-intro">Gabriel Jiménez</small>
                    </a>
                </div>
 
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end bg-dark-prestige text-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header border-bottom border-secondary">
                        <h5 class="offcanvas-title text-yellow" id="offcanvasNavbarLabel">Menú</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?php print_r("$path_r/views/user/home.php")?>">Listado de usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?php print_r("$path_r/views/product/home.php")?>">Listado de productos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>    

    