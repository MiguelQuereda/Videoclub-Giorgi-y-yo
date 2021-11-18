<?php 
namespace Dwes\ProyectoVideoclub;
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
    <form enctype="multipart/form-data" action="createCliente.php" method="POST">
        <label for="nombre"> Nombre del nuevo cliente: </label><br>
        <input type="text" name="nombre" /><br>
        <br>
        <input type="submit" name="btnSubir" value="Subir" />
    </form>

</body>

</html>