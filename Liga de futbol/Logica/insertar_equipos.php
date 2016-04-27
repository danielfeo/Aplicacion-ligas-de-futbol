
<!-- Autor Daniel andres feo-->

<?php


foreach ($_POST as $campo => $value)
 {
        if (empty($value))
        {
          ?>
		 <script>alert(<?php echo " \"el campo $campo esta vacio\"" ; ?>);</script>
		 <?php
		exit("");
        }
}
require_once 'conexion.php';
$nombre="";
$imagen="blanco.jpg";
if(isset($_POST['nombre'])){
		$nombre= $_POST['nombre'];}
		
if($_FILES['imagen']['size']>0){	

				$uploadDir = 'imagenes/';
				$fileName = $_FILES['imagen']['name'];
				$tmpName = $_FILES['imagen']['tmp_name'];
				$fileSize = $_FILES['imagen']['size'];
				$fileType = $_FILES['imagen']['type'];
				$bandera="true";
				$filePath = $uploadDir . $fileName;

				if ($fileSize >2000000)
				{
				?>
						 <script>alert('El archivo supera el tamaño permitido reducelo');</script>
						 <?php	 exit("");
					
				$bandera="false";}
				echo $fileType;
				if (!($fileType =="image/jpeg" OR $fileType =="image/gif")){
				$bandera="false";
				?>
						 <script>alert('Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos');</script>
						 <?php
				exit("");
						 }

				if($bandera=="true") {
				$ext = substr(strrchr($fileName, "."), 1);

				$randName = md5(rand() * time());

		
				$filePath = $uploadDir . $randName . '.' . $ext;

				$result = move_uploaded_file($tmpName, $filePath);

				if (!$result) {
				echo "Error subiendo el archivo";
				exit;
				}
				$imagen = $randName . '.' . $ext;;
				}
				}
		$conn = conectar();		
		$q = "SELECT * FROM equipo WHERE nombre LIKE '$nombre';";
		
		$r1 = mysql_query($q,$conn) or mysql_error();
	    mysql_query($q,$conn) or mysql_error();
		
		
		if (mysql_fetch_array($r1)>0) {	
		 ?>
		 <script>alert('ya existe ese nombre');</script>
		 <?php
		exit;
		}
		desconectar($conn);
		$conn = conectar();
		$q = "CALL sp_agregar_equipo('$nombre','$imagen');";
		try{
		mysql_query($q,$conn) or mysql_error();
		//echo $q;
		}catch (Exception $e)
		{
		 throw new Exception( 'Datos invalidos', 0, $e);
		 echo $e;?>
		 <script>alert('no se guardo el registro error');</script>
		 <?php
		}
			?><td><script>alert("registro insertado con exito"); document.getElementById("form1").reset();</script>																																									
        </td><?php 
		
desconectar($conn);
?>

<!-- Autor Daniel andres feo-->