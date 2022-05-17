<?php
    include("cabecera.php");
    include("conexion.php"); 

    try{
        $cuerpo=$_POST["cuerpo"];
        $user=$_POST["creador"];

        // $texto = implode("//-//",$cuerpo);

        $consulta = ("INSERT INTO articulos(Titulo, Cuerpo, Categoria, User_creador) VALUES ('Prueba','$cuerpo','Nuevo','$user')");/* Hacemos la consulta */
        $conexion->query($consulta);/* La ejecutamos */
        echo json_encode("Correcto");
    
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
?>