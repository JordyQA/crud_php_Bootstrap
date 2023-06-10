<?php
include "../models/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query("select u.id_user,p.nombre,p.apellido,p.fecha_nac,u.correo,p.dni,u.contraseña from usuarios as u inner join persona as p on u.id_user=p.id_user where u.id_user=$id");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>

    <!--conexion bootstrap para el CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid row" style="justify-content:center">
    <h3 class="text-center text-secundary">REGISTRO</h3>
    <form  class="col-4" method="POST" >
    <h3 class="text-center text-secundary">EDICION DE REGISTRO</h3>
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <?php
        include "../controllers/editar_usuarios.php";
        while($user=$sql->fetch_object()) {
    ?>
        <div class="mb-3">
            <label for="labelNombre" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" id="NOMBRE" name="nombre" value="<?=$user->nombre?>">
        </div>
        <div class="mb-3">
            <label for="labelApellido" class="form-label">Apellido de la persona</label>
            <input type="text" class="form-control" id="APELLIDO" name="apellido" value="<?=$user->apellido?>">
        </div>
        <div class="mb-3">
            <label for="labelFechaNac" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="FECHA_NACI" name="fecha" value="<?=$user->fecha_nac?>">
        </div>
        <div class="mb-3">
            <label for="labelCorreo" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="CORREO" name="correo" value="<?=$user->correo?>">
        </div>
        <div class="mb-3">
            <label for="labelDNI" class="form-label">DNI de la persona</label>
            <input type="text" class="form-control" id="DNI" name="dni" value="<?=$user->dni?>">
        </div>
        <div class="mb-3">
            <label for="labelContraseña" class="form-label">CONTRASEÑA</label>
            <input type="password" class="form-control" id="CONTRASEÑA" name="contraseña" value="<?=$user->contraseña?>">
        </div>

        <?php
        }
        ?>

        <div id="btn" style="text-align:center">
            <button type="submit" class="btn btn-success" name="btnguardarcambios" value="OK">GUARDAR CAMBIOS</button>
            <a class="btn btn-danger" href="registrar.php" role="button">REGRESAR</a>
        </div>
        
    </form>
    



    </div>


    <!--conexion bootstrap para el java scrip-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>