<?php

include("cabecera.php");
include("Conexion.php"); 

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //Create connection and select DB
        
        // Check connection

        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $conexion->query("INSERT into articulos (Cuerpo, Titulo) VALUES ('$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>