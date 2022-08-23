<?php  
       include "conectarbd.php";
       
       $id = $_GET['perfil'];
      
       $cons = "SELECT * FROM Clientes WHERE Cod_cliente=$id;";

      $perfil = mysqli_query($conex,$cons) or die("Error");

      $dt = mysqli_fetch_array($perfil);
      
      $nombre = $dt['Nombre'];
      $direccion = $dt['Direccion'];
      $telefono = $dt['Telefono'];
      $email = $dt['Email'];
      $observaciones = $dt['Observaciones'];
      $vip = $dt['Vip'];
        
      $checked ="";

      if($vip==1){
        $checked="checked";
      }
   
      $query = "SELECT * FROM Contactos WHERE Cod_cliente=$id;";

      $cont = mysqli_query($conex,$query) or die("Error");

      if($_POST['accion']=="elimina"){
       
        foreach($_POST['elimina'] as $cd){
            
            $ids = $cd;
            $setencia = "DELETE FROM Contactos WHERE Cod_contactos = $ids;";
    
            mysqli_query($conex, $setencia) or die("Error al eliminar seleccionados");
            header("location:perfilCliente.php?perfil=$id");
        }
        
      }
      include "includes/menu.php";
?>

<table class="listado">
                <tr class="thead">
                    <th class="tcabecera">Nombre</th>
                    <th class="tcabecera">Direccion</th>
                    <th class="tcabecera">Telefono</th>
                    <th class="tcabecera">Email</th>
                    <th class="tcabecera">Observaciones</th>
                    <th class="tcabecera">Vip</th>
                </tr>
                <tr>
                    <td><?echo $nombre;?></td>
                    <td><?echo $direccion;?></td>
                    <td><?echo $telefono;?></td>
                    <td><?echo $email;?></td>
                    <td><?echo $observaciones; ?></td>
                    <td><input type="checkbox" <?echo $checked;?> disabled="disabled"></td>
                    <td>
                        <a></a>
                        <a></a>
                    </td>
                </tr>
      </table>

      <h2>Contactos</h2>

      <table class="listado">
            <tr class="thead">
                <th class="tcabecera"> Nombre</th>
                <th class="tcabecera"> Direccion</th>
                <th class="tcabecera"> Telefono</th>
                <th class="tcabecera"> Email </th>
                <th class="tcabecera"> Codigo cliente</th>
                <th class="tcabecera"> Acciones</th>
                <th class="tcabecera"> 
                   <a href='contacto.php?CodClient=<?echo $id;?>'>
                        <image src="https://storage.googleapis.com/support-kms-prod/7F4253B4DAF2B259FB4FECD2F7FD255F7CDB" class="imgPlus" />
                     </a>
                </th>
            </tr>
            <tr>
            <?php
                  
                  if($cont -> num_rows > 0){

                    while($row = $cont-> fetch_assoc()){
                        
                        $i = $row['Cod_contactos'];
                        echo
                        "<tr>
                            <td class='filas'>".$row['Nombre']."</td>
                            <td class='filas'>".$row['Direccion']."</td>
                            <td class='filas'>".$row['Telefono']."</td>
                            <td class='filas'>".$row['Email']."</td>
                            <td class='numero'>".$row['Cod_cliente']."</td>
                            <td class='filas'>
                                <a href='editarContacto.php?Contacto=".$i."' class='btnEditar'>Editar</a>
                                <a href='borrarContacto.php?Contacto=".$i."' class='btnBorrar'>Borrar</a>
                            </td>
                            <td>
                            <form method='post' action='perfilCliente.php?perfil=".$row['Cod_cliente']."'>
                            <input type='hidden' name='accion' value='elimina'>
                            <input type='checkbox'  name='elimina[]' value='".$i."' />
                            </td>
                            </tr>
                            "; 
                        }
                    }
                   ?>
                    <tr>
                        <td ></td>
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
            