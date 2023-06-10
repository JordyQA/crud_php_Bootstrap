<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form de registro</title>

    <!--conexion bootstrap para el CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid row">
    <h3 class="text-center text-secundary">REGISTRO</h3>
    <form  class="col-4" method="POST">
    <h3 class="text-center text-secundary">REGISTRO DE PERSONA</h3>
    <?php
        include "../models/conexion.php";
        include "../controllers/registrar_usuario.php";
        include "../controllers/eliminar_usuarios.php";
    ?>
        <div class="mb-3">
            <label for="labelNombre" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" id="NOMBRE" name="nombre">
        </div>
        <div class="mb-3">
            <label for="labelApellido" class="form-label">Apellido de la persona</label>
            <input type="text" class="form-control" id="APELLIDO" name="apellido">
        </div>
        <div class="mb-3">
            <label for="labelFechaNac" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="FECHA_NACI" name="fecha">
        </div>
        <div class="mb-3">
            <label for="labelCorreo" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="CORREO" name="correo">
        </div>
        <div class="mb-3">
            <label for="labelDNI" class="form-label">DNI de la persona</label>
            <input type="text" class="form-control" id="DNI" name="dni">
        </div>
        <div class="mb-3">
            <label for="labelContraseña" class="form-label">CONTRASEÑA</label>
            <input type="password" class="form-control" id="CONTRASEÑA" name="contraseña">
        </div>

        <button type="submit" class="btn btn-primary" name="btnregistrar" value="OK">REGISTRAR</button>
        <a class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
    </form>
    <!--generamos la creacion de la table-->
    <div class="col-8 p-4" >
        <table class="table table-success table-striped" style="text-align:center">
            <thead class="bg-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">FECHA NACIMIENTO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">DNI</th>
                    <th scope="col">CONTRASEÑA</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <!--usamos para conectarnos con la modelo conexion a nuestra bd-->
            <?php
            include "../models/conexion.php";
            $sql=$conexion->query("select u.id_user,p.nombre,p.apellido,p.fecha_nac,u.correo,p.dni,u.contraseña from usuarios as u inner join persona as p on u.id_user=p.id_user");
            while($user=$sql->fetch_object()){  
            ?>
                <tr>
                    <td><?=$user->id_user?></td>
                    <td><?=$user->nombre?></td>
                    <td><?=$user->apellido?></td>
                    <td><?=$user->fecha_nac?></td>
                    <td><?=$user->correo?></td>
                    <td><?=$user->dni?></td>
                    <td><?=$user->contraseña?></td>
                    <td>
                    <a href="editar.php?id=<?=$user->id_user?>" class="btn btn-info">Editar</a>
                    <a href="registrar.php?id=<?=$user->id_user?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    

    </div>


    <!--conexion bootstrap para el java scrip-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>