<?php
  include "conectarbd.php";

 if($_POST['accion']=="guardar"){

   $nombre =$_POST['nombre'];
   $direccion =$_POST['direccion'];
   $telefono =$_POST['telefono'];
   $email =$_POST['email'];
   $observaciones =$_POST['observaciones'];
   $vip =$_POST['vip'];
   
   if(isset($vip)){
       $vip = 1;
   }else{
       $vip=0;
   }

      $cliente = "INSERT INTO Clientes(Nombre, Direccion, Telefono, Email, Observaciones, Vip) VALUES('".$nombre."','".$direccion."','".$telefono."','".$email."','".$observaciones."',".$vip.")";

     
     mysqli_query($conex,$cliente) or die("Error al guardar cliente");
}

 if($_POST['accion']=="borra"){
       
    foreach($_POST['elimina'] as $cd){
        
        $ids = $cd;
        $setencia = "DELETE FROM Clientes WHERE Cod_cliente = $ids;";

        mysqli_query($conex, $setencia);
        header('Location:index.php');
    }
  }
 
?>

       <?include 'includes/menu.php';?>

       
        <h2> Clientes guardados </h2>
            <table class="listado">
                <tr class="thead">
                    <th class="tcabecera">Nombre</th>
                    <th class="tcabecera">Direccion</th>
                    <th class="tcabecera">Telefono</th>
                    <th class="tcabecera">Email</th>
                    <th class="tcabecera">Observaciones</th>
                    <th class="tcabecera">Vip</th>
                    <th class="tcabecera1">Acciones</th>
                    <th>
                        <a href="nuevoCliente.php" >
                            <image src="https://storage.googleapis.com/support-kms-prod/7F4253B4DAF2B259FB4FECD2F7FD255F7CDB" class="imgPlus" />
                         </a>
                    </th>
                </tr>
        
            <?php 
            $consulta = "SELECT * FROM Clientes";

            $resultado = mysqli_query($conex,$consulta) or die ("error de conexión");

            if ($resultado->num_rows > 0) {
                
                while($row = $resultado -> fetch_assoc()){

                    if($row['Vip'] == 1){
                        $valor = "SI";
                    }else{
                         $valor="NO";
            }
                echo "
                <tr>
                <td class='filas'>
                <a href='perfilCliente.php?perfil=".$row['Cod_cliente']."' class='linkPerfil'>".$row["Nombre"]."</a>
                </td>
                <td class='filas'>".$row["Direccion"]."</td>
                <td class='tel'>".$row["Telefono"]."</td>
                <td class='filas'>".$row["Email"]."</td>
                <td class='filas'> ".$row["Observaciones"]."</td>
                <td class='tel'> ".$valor."</td>
                <td class='filas'>   
                <a href='editar.php?editar=".$row['Cod_cliente']."' class='btnEditar'>Editar</a>
                <a href='borrar.php?idborrar=".$row['Cod_cliente']."' class='btnBorrar'>Borrar</a>
                </td>
                <td>
                <form method='post' action='index.php'>
                <input type='hidden' name='accion' value='borra'>
                <input type='checkbox'  name='elimina[]' value='".$row["Cod_cliente"]."' />
                </td>
                </tr>
                "; 
            }
        }
       ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btnSeleccionados">Eliminar seleccionados</button>
                </td>
            </tr>
        </form>
      </table>

    </body>
</html>