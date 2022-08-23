<?php 
  include "conectarbd.php";
     
        $id = $_GET['Contacto'];

         if($_POST['accion']=="borrar"){
             
                $nc = $_POST['nc'];
                $idBor= $_POST['nid'];
                $id;

            $delete = "DELETE FROM Contactos WHERE Cod_contactos = ".$idBor.";";

        
            mysqli_query($conex,$delete) or die("Error al borrar");

             
            header("Location: perfilCliente.php?perfil=$nc");
        }
      
             $select = "SELECT * FROM Contactos WHERE Cod_contactos =$id;";

            $lista = mysqli_query($conex,$select) or die("Error!");
           
            $dt = mysqli_fetch_array($lista);
        
            $nom = $dt['Nombre'];
            $dir = $dt['Direccion'];
            $tel = $dt['Telefono'];
            $correo = $dt['Email'];
            $codCliente = $dt['Cod_cliente'];
    
?>
<!DOCTYPE html>
<html>
        <head>
          <link rel="stylesheet" type="text/css" href="css/estilo.css">
        </head>
      <body>
          <h2>Eliminar contacto</h2>
          <div class="eliminarContacto">
          <form method='post' action='borrarContacto.php'>

                  <input type="hidden" name="accion" value="borrar" />
                  <input type='hidden' name='nid' value='<?= $id?>'/>
                  <input type="hidden" name="nc" value="<?echo $codCliente;?>">
              <table class="tEliminar">
                  <tr>
                    <td class="etiqueta">Nombre:</td>
                    <td class="dato"> <? echo $nom;?></td>
                </tr>
                <tr>
                    <td class="etiqueta"> Dirección:</td>
                    <td class="dato"><? echo $dir;?></td>
                </tr>
                <tr>
                    <td class="etiqueta"> Telefono:</td> 
                    <td class="dato"><? echo $tel;?></td>
                </tr>
                <tr>
                    <td class="etiqueta">Email:</td> 
                    <td class="dato"><? echo $correo;?></td>
                </tr>
                <tr>
                    <td class="etiqueta">Codigo cliente:</td> 
                    <td class="dato"><? echo $codCliente;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="perfilCliente.php?perfil=<?echo $codCliente;?>" class="btnCancelarBorrado">Cancelar</a>
                    </td>
                   <td><input type="submit" value="Eliminar" class="btnElimanar"></td>
                </tr>

          </form>
          </div>
      </body>