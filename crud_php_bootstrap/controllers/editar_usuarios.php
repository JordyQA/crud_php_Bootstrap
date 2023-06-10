<?php
    if(!empty($_POST["btnguardarcambios"])){
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["fecha"])
        and !empty($_POST["correo"]) and !empty($_POST["dni"]) and !empty($_POST["contraseña"])){

            $id=$_POST["id"];
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $fecha=$_POST["fecha"];
            $correo=$_POST["correo"];
            $dni=$_POST["dni"];
            $contraseña=$_POST["contraseña"];


            $sql=$conexion->query("update usuarios set correo='$correo',contraseña='$contraseña' where id_user=$id");
            $sql=$conexion->query("update persona set nombre='$nombre',apellido='$apellido',dni='$dni',fecha_nac='$fecha' where id_user=$id");

            if($sql==1){
                header("location:registrar.php");
            }else{
                echo '<div class=alert alert-danger"> Error al modificar persona</div>';
            }

        } else{
            echo '<div class=alert alert-warning"> ALGUNOS CAMPOS ESTAN VACIOS</div>';
        }

        }
    
?>