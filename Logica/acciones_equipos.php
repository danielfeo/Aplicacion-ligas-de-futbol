<?php 

if(isset($_POST['id'])){
		$id= $_POST['id'];}
		
require_once 'conexion.php';
		$conn = conectar();		
		$q = "CALL sp_borrar_equipo('$id');";
try{
		mysql_query($q,$conn) or mysql_error();
		//echo $q;
		}catch (Exception $e)
		{
		 throw new Exception( 'Datos invalidos', 0, $e);
		 echo $e;
		}	
		
desconectar($conn);

?>

<!-- Autor Daniel andres feo-->