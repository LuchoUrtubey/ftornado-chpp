<!doctype html>
<html lang="es">

<head>

    <!-- METADATOS GENERALES -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Organizador de torneos y competencias amistosas para hattrick.org">
    <meta name="keywords" content="hattrick, futbol, manager, federacion, tornado, chpp, torneos, copas">
    <meta name="author" content="Federación Tornado">
    <meta name="robots" content="index, follow">

    <!-- TÍTULO DE LA PÁGINA -->
    <title><?php echo $_SESSION['pageTitle']; ?></title>
    <!-- Icono de la página (favicon) -->
    <link rel="icon" href="<?php echo ROOT ?>/assets/img/LogoTornado.png" type="image/png">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/d118451a8b.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- ESTILO PROPIO -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/styles.css">
    <script src="js/app.js"></script>
    <!-- Open Graph (Facebook) -->
    <meta property="og:title" content="Título para compartir en Facebook">
    <meta property="og:description" content="Descripción para compartir en Facebook">
    <meta property="og:image" content="ruta-de-la-imagen.jpg">
    <meta property="og:url" content="URL-de-la-página">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Título para compartir en Twitter">
    <meta name="twitter:description" content="Descripción para compartir en Twitter">
    <meta name="twitter:image" content="ruta-de-la-imagen.jpg">

</head>

<body>
    <header>
        <nav class="first-navbar">
            <ul class="navbar-social-icons">
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
            <div class="first-navbar-user">
                <?php if (isset($_SESSION['userTornado'])) : ?>
                    <span class="user-nav">Bienvenido! <?php echo htmlspecialchars($_SESSION['userTornado']); ?></span>
                <?php endif; ?>
                <i class="fa-solid fa-user-shield user-icon"></i>

            </div>
        </nav>

        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <div class="navbar-brand d-flex align-items-start">
                            <div class="d-flex flex-column align-items-center banderin">
                                <div class="logo1">
                                    <img src="<?php echo ROOT ?>/assets/img/LogoTornado.png" alt="Logo" height="100%" class="d-inline-block align-text-top">
                                </div>
                                <div class="logo2">
                                    <img src="<?php echo ROOT ?>/assets/img/chpp.svg" alt="Logo" class="d-inline-block align-text-top">
                                </div>
                            </div>
                        </div>
                    </div>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end align-items-start col-10" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="principal">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nuevos datos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CFT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ranking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fixture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Otros</a>
                            </li>
                            <?php if (isset($_SESSION['activo']) && $_SESSION['activo'] === '1') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                        <i class="fa-solid fa-right-from-bracket"></i>Logout
                                    </a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Login</a>
                                </li>
                            <?php endif; ?>


                        </ul>
                    </div>
            </div>
        </div>

    </header>

    <!-- Modal de confirmación de logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmación de Desconexión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas desconectarte, <?php echo htmlspecialchars($_SESSION['userTornado']); ?>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="<?php echo ROOT ?>/logout/doLogout">Desconectar</a>
                </div>
            </div>
        </div>
    </div>