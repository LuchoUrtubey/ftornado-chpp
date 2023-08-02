<?php
if (!isset($_SESSION['activo']) || $_SESSION['activo'] !== '1') {
    header('Location: inicio');
    exit();
}
?>
<!-- COMIENZA EL HEADER -->
<?php
include __DIR__ . '/../layout/header.php';
?>

<h1>Página privada para usaurios Tornado</h1>

<!-- COMIENZA EL FOOTERR -->
<?php
include __DIR__ . '/../layout/footer.php';
?>