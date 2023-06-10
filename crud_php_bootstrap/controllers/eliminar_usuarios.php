<?php
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conexion->query("delete from persona where id_user=$id");
        $sql=$conexion->query("delete from usuarios where id_user=$id");

        if($sql==1){
            header("registrar.php");
        }else{
            echo '<div class="alert alert-danger"> Erroe al eliminar persona</div>';
        }

    }
?>