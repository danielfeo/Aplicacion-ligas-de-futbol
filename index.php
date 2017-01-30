<!-- Autor Daniel andres feo-->


<?php
require_once 'conexion.php';
$conn = conectar();

desconectar($conn);
?>

<!DOCTYPE HTML>

<html>
	<head>
    <div id="errores" name="errores"></div>		
    	<title>aplicacion seleccion de equipos</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-normal.css" />
		</noscript>
		</head>
	<body>
	<div id="errores" name="errores"></div>
			<header id="header">

				
					<h1 id="logo"> Liga de futbol</h1>
				
				
					<nav id="nav">
						<ul>
							<li><a href="#intro">Intro</a></li>
							<li><a href="#creacion">Crear equipos</a></li>
							<li><a href="#equipos">Ver equipos</a></li>
                            <li><a href="#encuentros">Ver encuentros</a></li>
						</ul>
					</nav>

			</header>
			
		
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content container small">
					<header>
						<h2>Aplicacion seleccion de equipos 1° vuelta</h2>
					</header>
					<p>&nbsp;</p>
					<footer>
					</footer>
				</div>
			</section>
		
		<!-- Autor Daniel andres feo-->
			<section id="creacion" class="main style1 dark fullscreen">
				<div class="content container small">
				  <header>
						<h2>Creacion de equipos</h2>
					</header>
					<form method="post" enctype="multipart/form-data" name="form1" id="form1" action="logica/insertar_equipos.php">
					  <p>
					    <label for="nombre">Ingrese nombre del equipo:<br>
					      <br>
                        </label>
					    <input name="nombre" type="text" id="nombre" maxlength="100">
					  </p>
					  <p>
					    <label for="imagen">Seleccione el escudo del equipo:<br>
					      <br>
					    </label>
                        <input name="imagen" type="file" id="imagen">
                      </p>
					  <p>
					    <input type="button" name="button" id="button" value="Crear equipo">
					  </p>
                  </form>
					<p>&nbsp;</p>
					<footer>
						<a href="#equipos" class="button style2 down">Ver equipos</a>
					</footer>
				</div>
			</section>
		
		
			<section id="equipos" class="main style1 dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Equipos actuales</h2>
					</header>
					<div id="tabla_equipos"></div>
                    </div>
				<a href="#encuentros" class="button style2 down anchored">Ver fechas</a>
			</section>
		
	
			<section id="encuentros" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Listado de encuentros</h2>
					</header>
					<p>El listado de encuentros se vera a continuacion</p>
					<form action="logica/generar_encuentros.php" method="post" name="form2" id="form2">
					  <input type="button" name="boton_enc" id="boton_enc" value="Generar encuentros">
			     	 </form>
					<p>&nbsp;</p>
                    <div id="tabla_enc"></div>
				</div>
				<a href="#intro" class="button style2 down anchored">inicio</a>
			</section>


            <!-- Autor Daniel andres feo-->
<script type="text/javascript">
              
$("#boton_enc").click(function()
     {
         
     $("#form2").submit();
    
});

     $("#form2").submit(function(e)
{

    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false,
    success: function(data, textStatus, jqXHR)
    {
     $("#tabla_enc").html(data);
    },
     error: function(jqXHR, textStatus, errorThrown)
     {
     $("#tabla_enc").html(errorThrown);
     }        
    });
    e.preventDefault();
});
</script>


<!-- Autor Daniel andres feo-->
<script type="text/javascript">
              
$("#button").click(function()
     {
         
     $("#form1").submit();
    
});

     $("#form1").submit(function(e)
{

    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false,
    success: function(data, textStatus, jqXHR)
    {
     $("#errores").html(data);
    },
     error: function(jqXHR, textStatus, errorThrown)
     {
     $("#errores").html(errorThrown);
     }        
    });
    e.preventDefault();
});


</script>			
		
<script language="javascript">
function recargar(){   
    
    var variable_post='true';
    
    $.post("logica/equipos.php", { variable: variable_post }, function(data){
              
        $("#tabla_equipos").html(data);
    });        
<!-- Autor Daniel andres feo-->

}

timer = setInterval("recargar()", 2000);
</script>
	</body>
</html><!-- Autor Daniel andres feo-->
