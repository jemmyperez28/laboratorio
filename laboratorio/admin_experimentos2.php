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
						
			 			<?php
							$codexp= $_GET['codexp'];
						?>

						 <div class="span12" id="divMain">
						 <h3>Modificando el Experimento Codigo : <?php echo $_GET['codexp']; ?></h3>
						 </div> <br>

						<?php
						$sql = "SELECT * FROM `experimento` WHERE codexp= '".$codexp."';";
						$result = mysqli_query($con, $sql);
						$Registro = mysqli_fetch_array($result);
						$laboratorio = $Registro["fklab"];	
						$descripcion = $Registro["descripcion"];	
						?>	

						<form method="post" action="admin_experimentos3.php">

							<TD><input type="hidden" name="codexp" value="<?php echo $codexp;?>" /></TD>
							<TD><label for="codigotext"> Descripcion </label> 
							 <input type="text" name="descripcion" value="<?php echo $descripcion;?>" /></TD>
							<div class="form-group">
									<div class="form-group">
									<label for="codigotext"> Laboratorio</label> 
	                			 		     <select name="codlab" id="codlab">
									<option value="<?php echo $laboratorio;?>"><?php echo $laboratorio;?></option>
									<option value="lab1">C1-301</option>
									<option value="lab2">C2-302</option>
											</select> <br>
										</div>
							</div>
							<label for="codigotext"> C1-301 = lab1 </label>  <br>
							<label for="codigotext"> C1-301 = lab2 </label> 
							<div class="form-group">
                						<!-- <input type="button" value="Submit" />-->
                						<button class="btn btn-primary" onclick="javascript:document.location='admin_experimentos3.php'"> Actualizar </button> 
                						</div>
                		</form>	



			 			</div>
			 		
 		</div>


 		

		</body>
</html>