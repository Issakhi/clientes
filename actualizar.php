<?php

     
     include "conectarbd.php";
     


    if($_POST['accion']=="actualizar"){

        $nombreed= $_POST['nombre'];
        $direccioned= $_POST['direccion'];
        $telefonoed= $_POST['telefono'];
        $emailed= $_POST['email'];
        $observacionesed= $_POST['observaciones'];
        $cod =$_POST['cod'];

        if(isset($_POST['vip']) == 1){
            $n = 1;
        }else{
            $n = 0;
        }

        echo $update = "UPDATE Clientes SET Nombre='".$nombreed."', Direccion ='".$direccioned."', Telefono='".$telefonoed."', Email='".$emailed."', Observaciones =' ".$observacionesed."', Vip=".$n."  WHERE Cod_cliente = ".$cod.";";

        mysqli_query($conex,$update);

        header('Location: index.php');
    
  }
?>