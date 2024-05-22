<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sedan:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/menu.css">
</head>

<body class="bg-light">
    <div class="row ml-auto" id="naveg">
        <nav class="navbar navbar-light bg-light" style="height: 50px; max-width: 100%; object-fit: cover;">
            <div class="container-fluid">
                <div class="d-flex justify-content-between w-100">
                    <ul class="nav justify-content-start">
                        <?php
                        session_start();
                        if (isset($_SESSION['usuario'])) {
                            echo '
                            <li class="nav-item mr-2">
                                <a class="nav-link" href="main.php#produtos" style="height: 40px; font-size: 20px;">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="max-width: 60px;">
                                    <li><a class="dropdown-item" href="#">Minha Conta</a></li>
                                    <li><a class="dropdown-item" href="#">Minhas Compras</a></li>
                                    <li><a class="dropdown-item" href="../controller/sair.php">Sair</a></li>
                                </ul>
                            </li>
                            <li class="nav-item mr-4">
                                <a class="nav-link" href="carrinhoT.php">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                    </svg>
                                </a>
                            </li>
                            ';
                        } else {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="main.php#produtos" style="height: 40px; font-size: 20px;">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php" style="height: 40px; font-size: 20px;">Entrar</a>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                    <a class="navbar-brand" id="logo" href="main.php" style="font-size: 30px;">Soof</a>
                </div>
            </div>
        </nav>
        <hr class="mt-1">
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script></body>

</html>
