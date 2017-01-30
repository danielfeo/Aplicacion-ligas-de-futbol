<!-- Autor Daniel andres feo-->
<?php 
		include ("conexion.php");
		if(isset($_POST['email'])){
		session_start();
		$email = $_POST['email'];
		$clave = $_POST['clave'];
		$q = "SELECT * FROM usuario WHERE (email='$email' AND clave='$clave');";
		$r1 = mysql_query($q,$con) or mysql_error();
		if(mysql_num_rows($r1)>0){
				$_SESSION['clave']=$clave;
				while ($row = mysql_fetch_array($r1)) {
				$_SESSION['rol']=$row["rol"];$_SESSION['id_usuario']=$row["id_usuario"];
				$_SESSION['email']=$row["email"];
				}
			if($_SESSION['rol']==1){ echo "<meta http-equiv=\"refresh\" content=\"0;URL=administrador.php\">";}
			 echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
			}else{echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";}
		}
		?>
		<!-- Autor Daniel andres feo-->