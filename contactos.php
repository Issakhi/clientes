<?php
       include "includes/menu.php";
       include "conectarbd.php";

       $select= "SELECT * FROM Contactos;";

       $listado = mysqli_query($conex,$select) or die("Error al cargar contactos");
?>

<h2>Listado de contactos</h2>
<table class="listado"> 
    <tr>
        <th class="thead">Nombre</th>
        <th class="thead">Direccion</th>
        <th class="thead">Teléfono</th>
        <th class="thead">Email</th>
        <th class="thead">Codigo cliente</th>
    </tr>
    
    <?php
        while($r = $listado -> fetch_assoc()){ 
           
            echo"
            <tr>
                <td class='filas'>".$r['Nombre']."</td>
                <td class='filas'>".$r['Direccion']."</td>
                <td class='tel'>".$r['Telefono']."</td>
                <td class='filas'>".$r['Email']."</td>
                <td class='numero'>".$r['Cod_cliente']."</td>
            </tr>";
        
        }
    ?>
   
</table>