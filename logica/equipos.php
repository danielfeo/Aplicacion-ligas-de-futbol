<!-- Autor Daniel andres feo-->

<?php

require_once 'conexion.php';
$conn = conectar();
$q = "SELECT * FROM `equipos`.`equipo` ; ";
		//echo $data;
		$r1 = mysql_query($q,$conn) or mysql_error();
		$i=0;
		echo '<table>';
		while ($row = mysql_fetch_array($r1)) {
			echo '<tr>';
			echo '<td align="center" valign="middle" ><input type="hidden" value="'.$row['id'].'"><h1>'.$row['nombre'].'</h1></td><td align="center" valign="middle"><img src="logica/imagenes/'.$row['imagen'].'" width="99" height="99"  alt=""/></td>';
			?><script>function cargar<?php echo $row['id'];?>(){
				 $.post("logica/acciones_equipos.php", { id: <?php echo $row['id'];?>  }, function(data){
                		$("#errores").html(data);
					});    
						} </script><td><form method="POST"><input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>"/><input name="borrar" onclick="cargar<?php echo $row['id'];?>()" type="button" value="borrar" /><?php
   					   		}
	    echo '</table>';
desconectar($conn);
?>

<!-- Autor Daniel andres feo-->