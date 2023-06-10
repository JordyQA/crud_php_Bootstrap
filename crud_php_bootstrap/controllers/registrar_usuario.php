<?php
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["fecha"])
    and !empty($_POST["correo"]) and !empty($_POST["dni"]) and !empty($_POST["contraseña"])){

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $fecha=$_POST["fecha"];
        $correo=$_POST["correo"];
        $dni=$_POST["dni"];
        $contraseña=$_POST["contraseña"];

        $sql=$conexion->query("insert into usuarios(correo,contraseña) values ('$correo','$contraseña')");
        $sql=$conexion->query("insert into persona(nombre,apellido,dni,fecha_nac) values ('$nombre','$apellido','$dni','$fecha')");

        if($sql==1){
            echo '<div class="alert alert-success"> Persona Registrada correctamente</div>';
        }else{
            echo '<div class="alert alert-danger"> Error al registrar persona</div>';
        }

    }else{
        echo '<div class="alert alert-warning"> ALGUNOS CAMPOS ESTAN VACIOS </div>';
    }

}



?>