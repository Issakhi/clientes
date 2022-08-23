<?php include "includes/addContacto.php"?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="javascript/comprobardt.js"></script>
    </head>
    <body>
        <h2> Nuevo contacto</h2>

        <div class="eliminarContacto">
        <form method="post" action="contacto.php" name="formContacto">
            <h3 id="textoer"></h3>
            <input type="hidden" name="accion" value="guardar">
            <input type="hidden" name="codigo" value="<?echo $cod?>">
            <table class="tEliminar" >
                <tr><td></td><td><h4 id="clienteMensaje"></h4></td></tr>
            <tr>
                <td><p id="codColor">Código cliente: *</p></td>
                <td><input type="text" name="cod_Cliente" class="nb" id="cod" value="<?echo $cod;?>" disabled="disabled"></td>
            </tr>
            <tr>
                <td>Nombre: *</td>
                <td><input type="text" name="nombre" class="nb" id="nomContacto"></td>
            </tr>
            <tr>
                <td>Direccion: *</td> 
                <td><input type="text" name="direccion" class="nb" id="dirContacto"></td>
            </tr>
            <tr>
                <td><p id="telContColor">Telefono: *</p></td>
                <td><input type="tel" name="telefono" class="nb" id="telContacto"></td>
            </tr>
                <td><p id="emailContColor"> Email: *</p></td>
                <td><input type="text" name="email" class="nb" id="emailContacto"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="perfilCliente.php?perfil=<?echo $cod;?>" class="btnCancelar">Cancelar</a>
                </td>
                <td>
                    
                    <a href='javascript: comprobarContacto();' class='btnGuardar'> Guardar Contacto</a>
                </td>
            <tr>
         </table>
        </form>
        </div>
        

        