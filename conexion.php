<?php 

function conectar(){
	
	$coneccion = mysql_connect("127.0.0.1","root","");
	mysql_select_db("equipos",$coneccion);
	return $coneccion;
}

function desconectar($coneccion){
	mysql_close($coneccion);
}
?>

<!-- Autor Daniel andres feo-->
