<?php
    include "conectarbd.php";
     $cod=$_GET['CodClient'];
    if($_POST['accion'] == "guardar"){
        
        $nom =$_POST['nombre'];
        $direc =$_POST['direccion'];
        $telef =$_POST['telefono'];
        $email = $_POST['email'];
        $idCont = $_POST['codigo'];
        
       $insertar = "INSERT INTO Contactos(Cod_cliente,Nombre,Direccion,Telefono,Email) 
                        VALUES (".$idCont.",'".$nom."','".$direc."','".$telef."','".$email."');";

       mysqli_query($conex,$insertar) or die("Error en guardar datos"); 
       header("Location: contacto.php?CodClient=$idCont");
    }
            
     
?>