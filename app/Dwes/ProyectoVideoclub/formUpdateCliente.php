<?php 
loginAdmin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de nuevo cliente</title>
</head>

<body>
    <h3><?= $error ?></h3>
    <?php
    $vc = $_SESSION["videoclub"];
    $vc->listarSociosHTML(); ?>
    <form enctype="multipart/form-data" action="updateClient.php" method="POST">
        <label for="id"> Número del cliente: </label><br>
        <input type="text" name="id" /><br>
        <br>
        <label for="nombre"> Nombre del cliente: </label><br>
        <input type="text" name="nombre" /><br>
        <br>
        <label for="user"> Nuevo usuario del nuevo cliente: </label><br>
        <input type="text" name="user" /><br>
        <br>
        <label for="pass"> Nueva contraseña del cliente: </label><br>
        <input type="text" name="pass" /><br>
        <br>
        <input type="submit" name="btnSubir" value="Subir" />
    </form>

</body>

</html>