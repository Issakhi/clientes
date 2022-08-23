<?php
   
    include "conectarbd.php";
    

     $codigo = $_GET['editar'];
      
         $select = "SELECT * FROM Clientes WHERE Cod_cliente = $codigo;";

         
         
         $datos = mysqli_query($conex,$select) or die("Error de conexión");
        
         $clien = mysqli_fetch_array($datos);

         $nom = $clien['Nombre'];
         $dir =$clien['Direccion'];
         $tel =$clien['Telefono'];
         $correo =$clien['Email'];
         $obser =$clien['Observaciones'];
         $vi =$clien['Vip'];
          
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
            <script src="javascript/comprobardt.js"></script>
        </head>
       <body>
           <h2>Editar cliente</h2>
            <div class="eliminarContacto">
          <form method='post' action='actualizar.php' name="clienteEditado">
            <input type="hidden" name="accion" value="actualizar" />
            <input type='hidden' name='cod' value='<?echo $codigo?>'/> 
            <table class="tEliminar">
            <tr>
             <td >Nombre:*</td>
             <td > <input type='text' name='nombre' id="nomEditar" value='<?echo $nom;?>'></td>
            </tr>
            <tr>
             <td>Dirección:*</td> 
             <td ><input type='text' name='direccion' id="dirEditar" value='<? echo $dir; ?>'></td>
            </tr>
            <tr>
             <td>Teléfono:*</td>
             <td><input type='tel' name='telefono' id="telEditar" value='<?echo $tel; ?>'></td>
            </tr>
            <td>Email:*</td>
            <td> <input type='text' name='email' id="emailEditar" value='<?echo $correo;?>'></td>
            </tr>
            <tr>
            <td>Observaciones:</td>
            <td><textarea type="textarea" name='observaciones'><?echo $obser;?></textarea></td>
            </tr>
            <tr>
            <td>Vip: </td>
            <td><input type='checkbox' name='vip'  <?echo $check;?>></td>
            </tr>
            <tr>
              <td></td>
              <td>
                 <a href="index.php" class="btnCancelar">Cancelar</a>
              </td>
            <td>
              <a href="javascript: editarCliente()"  class="btnGuardar"> Guardar </a>
            </td>
            </tr>
            </table>
        </form>
        </div>
       </body>
     </html>