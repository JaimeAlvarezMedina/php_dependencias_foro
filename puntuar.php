<?php
    include("cabecera.php");
    include("conexion.php"); 

        $interaccion=$_POST["interaccion"];
        $id=$_POST["id"];
        $usuario=$_POST["user"];
        $consulta=("SELECT * FROM articulos where ID_articulo='$id'");
        
        try{
            foreach(($conexion->query($consulta)) as $dato){
                if($interaccion=="like"){
                    
                        $consulta = ("UPDATE articulos SET Gusta='".($dato["Gusta"]+1)."' where ID_articulo='$id'");/* Hacemos la consulta */
                        $conexion->query($consulta);/* La ejecutamos */
                       

                        $consulta=("SELECT * FROM usuarios where User='$usuario'");
                        foreach(($conexion->query($consulta)) as $info){

                            $consulta =("UPDATE usuarios SET Gusta='".$info["Gusta"].$id."//*//"."' where User='$usuario'");
                            $conexion->query($consulta);/* La ejecutamos */
                        } 
                        echo json_encode("Realizado_Gusta"); 
                }
                if($interaccion=="dislike"){  
                        $consulta = ("UPDATE articulos SET No_gusta='".($dato["No_gusta"]+1)."' where ID_articulo='$id'");/* Hacemos la consulta */
                        $conexion->query($consulta);/* La ejecutamos */
                        
                        $consulta=("SELECT * FROM usuarios where User='$usuario'");
                        foreach(($conexion->query($consulta)) as $info){

                            $consulta =("UPDATE usuarios SET No_gusta='".$info["No_gusta"].$id."//*//"."' where User='$usuario'");
                            $conexion->query($consulta);/* La ejecutamos */
                        }
                        echo json_encode("Realizado_NO_Gusta"); 
                }
            }
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
?>