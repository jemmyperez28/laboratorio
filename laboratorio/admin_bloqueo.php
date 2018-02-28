<html>
	<title>
	Menu del Profesor
	</title>
		
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>
<?php
  ob_start();
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  echo "Bienvenido : " . $_SESSION['nombre'];
  require_once("database.php");		
  require_once("revisionadmin.php");
?>
<!-- CABECERA -->
			<div id="app">
			        <nav class="navbar navbar-default navbar-static-top">
			            <div class="container">
			                <div class="navbar-header">

			                    <!-- Collapsed Hamburger -->
			                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
			                        <span class="sr-only">Toggle Navigation</span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                        <span class="icon-bar"></span>
			                    </button>

			                    <!-- Branding Image -->
			                    <a class="navbar-brand" href="">
			                        Menu del Administrador
			                    </a>                   
			                </div>
			             </div>
			         </nav>
			 </div>
 <!-- FIN DE CABECERA -->
 		<body>
 		<div class ="col-sm-3"> 			
		<div class="panel panel-primary">
			 			<div class="panel-heading"> Menu </div>
			 			<div class="panel-body">
			 				<a href="/laboratorio/admin_menu.php" class="list-group-item">
 							Buscar Codigo De reserva
 							</a>
 							<a href="/laboratorio/admin_buscaralumno.php" class="list-group-item">
 							Buscaar Codigo De Alumno
 							</a>
 							<a href="/laboratorio/admin_elimina.php" class="list-group-item">
 							Eliminar Codigo de Reserva 
 							</a>
 							<a href="/laboratorio/admin_reportediario.php" class="list-group-item">
 							Asistencia
 							</a>
 							<a href="/laboratorio/admin_experimentos.php" class="list-group-item">
 							Configurar experimentos
 							</a>
 							<a href="/laboratorio/admin_horarios.php" class="list-group-item">
 							Configurar Horarios
 							</a>
 							<a href="/laboratorio/admin_bloqueo.php" class="list-group-item">
 							Bloquear Horarios
 							</a>
 							<a href="/laboratorio/admin_reportefecha.php" class="list-group-item">
 							Reporte Por fecha
 							</a>
 							<a href="/laboratorio/admin_fechas.php" class="list-group-item">
 							Inhabilitar Fechas
 							</a>
 							<a href="cerrar.php" class="list-group-item">
 							Cerrar Sesión
 							</a>
			 			</div>
			 </div>
 		</div>
 		<div class ="col-sm-8"> 			
			<div class="panel panel-secondary">
			 			<div class="panel-body">

			 			<form method="post" action="/laboratorio/admin_bloqueo2.php">	
			 				
			 				<?php
			 				$laboratorio = "SELECT * FROM laboratorio"; 
  							$resultadolaboratorio = mysqli_query($con,$laboratorio);

							 $experimento = "SELECT * FROM experimento";
							 $resultadoexperimento = mysqli_query($con,$experimento);
							 ##ROW3
							 $hora = "SELECT * FROM horas";
							 $resultadohora = mysqli_query($con,$hora);
			 				?>

			 				<label for="codigotext"> Ingrese los datos para restringirlos . </label> 
			 				<div class="form-group">
                			 <label for="codigotext"> Fecha a bloquear : </label>  <input type="date" id="fecha" name='fecha' size='9' value="" /> 
                			</div>

			 				<label for="codigotext"> Horarios a Bloquear :</label> 
			 				<select multiple name="cerveza[]" size="10"> 
			 					<?php while($row3 = mysqli_fetch_array($resultadohora)):; ?>
								<?php	echo "<option value=".$row3[0].">".$row3[1]."</option>"; ?>
								<?php endwhile; ?>
							</select><br>   
							<br> 

							<label for="codigotext"> Laboratorio a Bloquear :</label> 
							<select name="cerveza2" size="1"> 
			 					<?php while($row1 = mysqli_fetch_array($resultadolaboratorio)):; ?>
								<?php	echo "<option value=".$row1[0].">".$row1[1]."</option>"; ?>
								<?php endwhile; ?>
							</select><br>   
							<br> 

			 			<div class="form-group">
                		<button class="btn btn-primary"> Bloquear </button>
                		</div>

      								</form>		
			 			</div>		 		
 		</div>
		</body>
</html>