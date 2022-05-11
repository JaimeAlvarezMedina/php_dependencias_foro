<?php
    include('cabecera.php');
    include('conexion.php');



        $consulta= $conexion->prepare("SELECT Categoria, count(Categoria) total FROM articulos GROUP BY Categoria ORDER BY total DESC LIMIT 5");
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    
?>