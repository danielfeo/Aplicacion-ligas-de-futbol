<!-- Autor Daniel andres feo-->

<?php 

require_once 'conexion.php';
		$conn = conectar();		
		$q = "CALL sp_cuenta();";
		
		$r1 = mysql_query($q,$conn) or mysql_error();
	    while ($row = mysql_fetch_array($r1)) {
		 $total=$row['cuenta'];
		}
		desconectar($conn);
		
					if ($total>=2){
						
									$conn = conectar();
									$q = "CALL sp_encuentros();";
											echo '<table><tr><td><h1 align="center" valign="middle">Local</h1></td><td align="center" valign="middle"><h1> vs </h1></td><td align="center" valign="middle"><h1>visitante</h1></td></tr>';
											$r1 = mysql_query($q,$conn) or mysql_error();
											while ($row = mysql_fetch_array($r1)) {
											 echo '<tr>
    <td align="center" valign="middle"><p><img src="Logica/imagenes/'.$row['img_local'].'" width="99" height="99"  alt=""/></p>
    <p>'.$row['nom_local'].'</p></td>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><p><img src="Logica/imagenes/'.$row['img_visitante'].'" width="99" height="99"  alt=""/></p>
    <p>'.$row['nom_visitante'].'</p></td>
  </tr>';
											 
											}
																	
									}		
		
		
desconectar($conn);
?>

<!-- Autor Daniel andres feo-->