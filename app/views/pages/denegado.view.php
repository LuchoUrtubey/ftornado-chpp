<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FEDERACIÓN TORNADO | Acceso Denegado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ESTILO PROPIO -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/styles.css">
</head>

<body class="vh-100">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-danger">Acceso Denegado</h1>
            <p class="fs-3"> <span class="text-danger">Opps!</span> Tarjeta roja!</p>
            <p class="lead">
                No tienes permiso para acceder a ésta Página.
            </p>
            <a href="inicio" class="btn btn-success">INICIO</a>
        </div>
        <div class="acceso-denegado">
            <img src="<?php echo ROOT ?>/assets/img/hattrick/Tarjeta-Roja.png" alt="Logo">
        </div>
    </div>
</body>

</html>