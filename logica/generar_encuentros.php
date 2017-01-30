<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="css/calendario.css" type="text/css" rel="stylesheet">
<script src="js/calendar.js" type="text/javascript"></script>
<script src="js/calendar-es.js" type="text/javascript"></script>
<script src="js/calendar-setup.js" type="text/javascript"></script>
</head>

<body>


<?php 

require_once 'conexion.php';
		$conn = conectar();		
		$q = "CALL sp_cuenta();";
		$n=1;
		$n1=1;
		$fil=1;
		$fi=2;
		$f=1;
		$r1 = mysql_query($q,$conn) or mysql_error();
	    while ($row = mysql_fetch_array($r1)) {
		 $total=$row['cuenta'];
		}
		
		$num=$total;
		$p=$total;
		$p1=10;
		desconectar($conn);
		
					if ($total>=2){
						
									$conn = conectar();
									$q = "CALL sp_encuentros();";
											echo '<table><tr>
											<td>&nbsp;</td>	
											<td><h1 align="center" valign="middle">       </h1></td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>	
											<td><h1 align="center" valign="middle">Local</h1></td>
											<td align="center" valign="middle"><h1> vs </h1></td>
											<td align="center" valign="middle"><h1>Visitante</h1></td>
											<td>&nbsp;</td>	
											<td align="center" valign="middle"><h1>Fecha</h1></td>
											<td>&nbsp;</td>	
											<td align="center" valign="middle"><h1>Fecha encuentro</h1></td>
											
											</tr>';
											
											$r1 = mysql_query($q,$conn) or mysql_error();
											while ($row = mysql_fetch_array($r1)) {
												
	
	if($p==$p1){	
	
	$p1=1;
	
	echo '<tr>
	<td>&nbsp;</td>		
	<td>&nbsp;</td>								 
    <td align="center" valign="middle"><p>Partidos de '.$row['nom_local'].'</p></td>
   
    </tr>';
	
	}
	
	
	
	
	
	if($num==$n){	
	$n=1;
	$n1=1;
	
	}
	
	//0== 0 1
	if($fil==$f){
								
	echo '<tr>
	<td>&nbsp;</td>	
	<td align="center" valign="middle"><p>'.$n1.'</p> </td>	
	<td>&nbsp;</td>		
	<td>&nbsp;</td>								 
    <td align="center" valign="middle"><p><img src="logica/imagenes/'.$row['img_local'].'" width="99" height="99"  alt=""/></p>
    <p>'.$row['nom_local'].'</p></td>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><p><img src="logica/imagenes/'.$row['img_visitante'].'" width="99" height="99" alt=""/></p>
    <p>'.$row['nom_visitante'].'</p></td>
	<td>&nbsp;</td>	
	<td align="center" valign="middle"><p>'.$n.'a </p> </td>
	<td>&nbsp;</td>	
	<td><input type="text" name="ingreso" id="ingreso" value="dd-mm-yyyy" width="86"/></td>
    <td><img src="ima/calendario.png" width="16" height="16" border="0" title="Fecha Inicial" id="lanzador"></td>
    </tr>';
										 
											}
		// 1== 1									
	if($fi==$f){
										
	echo '<tr>
	<td>&nbsp;</td>	
	<td align="center" valign="middle"><p>'.$n1.'</p> </td>	
	<td>&nbsp;</td>		
	<td>&nbsp;</td>								 
	<td align="center" valign="middle"><p><img src="logica/imagenes/'.$row['img_visitante'].'" width="99" height="99" alt=""/></p>
    <p>'.$row['nom_visitante'].'</p></td>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><p><img src="logica/imagenes/'.$row['img_local'].'" width="99" height="99"  alt=""/></p>
    <p>'.$row['nom_local'].'</p></td>
	<td>&nbsp;</td>	
	<td align="center" valign="middle"><p>'.$n.'a </p> </td>
	<td>&nbsp;</td>	
	<td><input type="text" name="ingreso" id="ingreso" value="dd-mm-yyyy" width="86"/></td>
    <td><img src="ima/calendario.png" width="16" height="16" border="0" title="Fecha Inicial" id="lanzador"></td>
    </tr>';
	$f=0;
										 
											}										
											
											$f++;
											$p1++;
											$n1++;	
											$n++;
											}
																	
									}		
		
		
desconectar($conn);
?>

<script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "ingreso",     // id del campo de texto 
     ifFormat     :     "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del botón que lanzará el calendario 
}); 
</script>
</body>
</html>

<!-- Autor Daniel andres feo-->