<head>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/d118451a8b.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- ESTILO PROPIO -->
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/styles.css">
</head>

<main>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4 mt-5">
                <h3>Iniciar sesión</h3>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="userTornado" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="userTornado" name="userTornado" required>
                    </div>
                    <div class="mb-3">
                        <label for="passTornado" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="passTornado" name="passTornado" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="loginTornado">Iniciar sesión</button>
                    </div>
                    <div class="mb-3">
                        <a href="registro">Registrarse</a> | <a href="olvidaste">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>