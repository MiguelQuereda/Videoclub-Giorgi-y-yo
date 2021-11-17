<?php
loginUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $vc = $_SESSION["videoclub"];
    $vc->listarSociosHTML(); ?>
    <form enctype="multipart/form-data" action="removeCliente.php" method="POST">
        <label for="usuario"> Escribe el nombre del cliente que quieras borrar: </label><br>
        <input type="text" name="nombre" /><br>
        <br>
        <label for="id"> Escribe el número del cliente que quieres eliminar: </label><br>
        <input type="text" name="id" /><br>
        <input type="reset" value="Restaurar">
        <input type="submit" name="btnSubir" value="Borrar" />
    </form>

    <a href="mainAdmin.php">Volver en la página general</a>
</body>

</html>