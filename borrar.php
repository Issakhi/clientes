<?php
   include "conectarbd.php";

   if($_POST['accion']=="borrar"){

    $codigo = $_POST['nid'];
     
    $delete = "DELETE FROM Clientes WHERE Cod_cliente = '".$codigo."';";

    $eliminado = mysqli_query($conex,$delete) or die("No se ha podido eliminar el registro");
   

    if($eliminado == true){
        Header('Location: index.php');
    }
}

  
   $id=  $_GET['idborrar'];

   $sql = "SELECT * FROM Clientes WHERE Cod_cliente = $id;";

   $cl = mysqli_query($conex,$sql);



    $dt = mysqli_fetch_array($cl); 

    $nom = $dt['Nombre'];
    $dir =$dt['Direccion'];
    $tel =$dt['Telefono'];
    $correo =$dt['Email'];
    $obser =$dt['Observaciones'];
    $vi =$dt['Vip'];

   if($vi == 1){
        $check ="checked";    
    }else{
         $check ="";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
          <h2>Eliminar cliente</h2>
            <div class="eliminarContacto">
             <form method='post' action='borrar.php'>
                <table class="tEliminar">
                    <input type="hidden" name="accion" value="borrar" />
                    <input type='hidden' name='nid' value='<?echo $id?>'/>
                    <tr>
                        <td class="etiqueta"> Nombre:</td>
                        <td class="dato"><?echo $nom;?></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Dirección:</td>
                        <td class="dato"><? echo $dir; ?></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Telefono: </td>
                        <td class="dato"><?echo $tel; ?></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Email:</td>
                        <td class="dato"><?echo $correo;?></td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Observaciones: </td>
                        <td class="dato"><?echo $obser;?></td>
                    </tr>
                    <tr>                    
                        <td class="etiqueta">Vip: <input type='checkbox'disabled="disabled" name='vip' <?echo $check;?>></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="index.php" class="btnCancelar">Cancelar</a>
                        </td>
                        <td> 
                            <input type="submit" value="Eliminar" class="btnEliminar">
                        </td>
                    </tr>
        </form>
    </body>
</html>