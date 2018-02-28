
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
						$consulta = "select * from experimento";
						$resultado = mysqli_query($con,$consulta);

						echo "<table border='1'>
							<tr>
							<center><th>Codigo de Experimento </th> </center>
							<center> <th>Nombre de Experimento </th></center>
							<center> <th>Laboratorio Asignado </th></center>
							</tr>";

							while($row = mysqli_fetch_array($resultado))
							{
							echo "<tr>";
							echo "<center>  <td>" . $row['codexp'] . "</td> </center> ";
							echo "<center>  <td>" . $row['descripcion'] . "</td> </center>";
							echo "<center>  <td>" . $row['fklab'] . "</td> </center>";
							echo "<center>  <td><a href=admin_experimentos2.php?codexp=";echo $row['codexp'];echo">Modificar-</a></td> </center>";
							echo "<center>  <td><a href=admin_eliminarexp.php?codexp=";echo $row['codexp'];echo"> Eliminar</a></td> </center>";

						echo "</tr>";	
							echo "</tr>";
							}
							echo "</table>";
						?>
						<br>
						<form action="/laboratorio/admin_nuevoexp.php">
    					<button class="btn btn-primary"> Nuevo Experimento </button>
						</form>
						

			 			</div>
			 		
 		</div>


 		

		</body>
</html>