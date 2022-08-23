<?php
     
    include "includes/menu.php"; 
    include "includes/formNuevoCliente.php";
    include "conectarbd.php";

    if($_POST['accion']=="guardar"){
      
      $nombre = $_POST['nombre'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $observaciones = $_POST['observaciones'];
       $_POST['vip'];
      if($_POST['vip']=="true"){
        $vip = true;
      }else{
        $vip=false;
      }
      
      echo $insert = "INSERT INTO Clientes (Nombre, Direccion, Telefono,Email, Observaciones, Vip) 
                  VALUES ('".$nombre."','".$direccion."','".$telefono."','".$email."','".$observaciones."','".$vip."');";
      
      mysqli_query($conex,$insert) or die("Error al introducir los datos");

      header('Location: index.php');
        
    }


  
 ?>
