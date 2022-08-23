<?php
    include "conectarbd.php";

    $id = $_GET['Contacto'];

    if($_POST['accion']=="actualizar"){
            
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $cd = $_POST['cod'];
            $idcod = $_POST['idcod'];
            

            $update = "UPDATE Contactos SET Nombre='".$nombre."', Direccion='".$direccion."', Telefono='".$telefono."', Email='".$email."', Cod_cliente=$cd WHERE  Cod_contactos = $idcod;";

            mysqli_query($conex,$update) or die("Error al actualizar datos");

            Header("Location: perfilCliente.php?perfil= $cd");  
    }

        $select = "SELECT * FROM Contactos WHERE Cod_contactos = ".$id;
        $lista = mysqli_query($conex,$select) or die("Error");
        $dt = mysqli_fetch_array($lista);
        
        $codigo = $dt['Cod_cliente'];
        $nom = $dt['Nombre'];
        $dir = $dt['Direccion'];
        $tel = $dt['Telefono'];
        $correo = $dt['Email'];

    

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="javascript/comprobardt.js"></script>
    </head>
    <body>
        <h2>Editar contacto</h2>
        <div class="eliminarContacto">
            <form method='post' action='editarContacto.php' name="formEdContacto">
        
                <input type="hidden" name="accion" value="actualizar" />
                <input type='hidden' name='idcod' value='<?echo $id;?>'/>
                <table class="tEliminar"> 
                    <tr>
                        <td> Nombre: </td>
                        <td><input type='text' name='nombre' id="nomEdContacto" value='<?echo $nom;?>'></td>
                    </tr>
                    <tr>
                        <td>Dirección: </td>
                        <td><input type='text' name='direccion' id="dirEdContacto" value='<?echo $dir; ?>'></td>
                    </tr>
                    <tr>
                        <td>Telefono: </td>
                        <td><input type='tel' name='telefono' id="telEdContacto" value='<?echo $tel;?>'></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type='text' name='email' id="emailEdContacto" value='<?echo $correo;?>'></td>
                    </tr>
                    <tr>
                        <td>Codigo cliente: </td>
                        <td class="numero"><input type='text' id="codEditar" name='cod' value='<?echo $codigo;?>'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="perfilCliente.php?perfil=<?echo $codigo;?>" class="btnCancelar"> Cancelar</a>
                        </td>
                        <td class="tdEditado">
                          <a href="javascript:editarContacto();" class="btnGuardar">Guardar </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>