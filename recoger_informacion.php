<?php
    include('cabecera.php');
    include('conexion.php');



        $consulta= $conexion->prepare("SELECT DISTINCT `ID_articulo`, `Titulo`, `Cuerpo` FROM `articulos` ORDER BY  ID_articulo DESC");
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    
?>