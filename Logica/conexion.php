<?php 

function conectar(){
	
	$coneccion = mysql_connect("localhost","root","");
	mysql_select_db("equipos1",$coneccion);
	return $coneccion;
}

function desconectar($coneccion){
	mysql_close($coneccion);
}
?>

<!-- Autor Daniel andres feo-->