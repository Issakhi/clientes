
<h2>Nuevo cliente</h2>
        <div class="eliminarContacto">
            <form method="post" action="nuevoCliente.php" name="formcliente">
                <input type="hidden" name="accion" value="guardar" />
                <table class="tEliminar">
                    <tr><td></td><td><h4 id="clienteMensaje"></h4></td></tr>
                <tr>
                <td>Nombre: *</td>
                <td><input type="text" name="nombre" class="nb" id="nombContacto" ></p></td>
                <tr>
                 <td>Dirección: *</td>
                 <td><input type="text" name="direccion" class="nb" id="dirContacto" ></td>
                </tr>
                <tr>
                 <td><p id="colorCTel">Teléfono: *</p></td> 
                 <td><input type="tel" name="telefono" class="nb" id="telContacto" ></td>
                </tr>
                <tr>
                 <td><p id="colorCEmail">Email: *</td> 
                 <td><input type="text" name="email" class="nb" id="emailContacto" ></td>
                </tr>
                <tr>
                 <td>Observaciones:</td> 
                 <td><textarea name="observaciones" class="nb" ></textarea></td>
                </tr>
                <tr>
                 <td>Vip:</td> 
                 <td><input type="checkbox" name="vip" value="true" class="nb"></td>
                </tr>
                <td></td>
                <td><a href="index.php" class="btnCancelar">Cancelar</a></td>
                <td>
                    <a href='javascript:comprobarCliente();' class='btnGuardar'> Guardar cliente</a>
                </td>
                
                </table>
            </form>
        </div>