<?php   
                $consulta= "SELECT * FROM correspondencia";
            $resultado= $conexion->query($consulta);
            while($row=mysqli_fetch_assoc($resultado)) 
            {
            
             echo '<tr align="center">';
             echo '<td>'.$row["folio"].'</td>';
             echo '<td>'.$row["interno"].'</td>';
             echo '<td>'.$row["no_oficio"].'</td>';
             echo '<td>'.$row["fecha_oficio"].'</td>';
             echo '<td>'.$row["asunto"].'</td>';
             echo '<td>'.$row["status"].'</td>';
             echo '<td>'.$row["detalle"].'</td>';
             echo '<td>'.$row["destinatario"].'</td>';
             echo '<td>'.$row["remitente"].'</td>';
             echo '<td>'.$row["fecha_recepcion"].'</td>';
             echo '<td>'.$row["turnado"].'</td>';
             echo "<td>";
             echo '<a href="mod_corresp.php?folio='.$row["folio"].'&detalle='.$row["detalle"].'&estatus='.$row["status"].'&no_oficio='.$row["no_oficio"].'&asunto='.$row["asunto"].'"><button type="button" class="fas fa-edit"></button></a>'; 
             echo '<a href="eliminar_corresp.php?folio='.$row["folio"].'"><button type="button" class="fas fa-trash-alt"></button></a>';
             echo '</td></tr>';
            
            } mysqli_free_result($resultado);
      
?>        