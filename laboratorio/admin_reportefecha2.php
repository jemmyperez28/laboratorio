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
							
								  $fecha = $_POST["fecha"];
								  $laboratorio = $_POST["laboratorio"];

								$consulta = "select experimento.descripcion as 'col1',
								horas.descripcion as 'col2',
								laboratorio.descripcion as 'col3' ,
								reserva.codreserva as 'col4' , 
								reserva.codigo as 'col5', 
								usuario.nombre as 'col6', 
								usuario.apellidos as 'col7' ,
								reserva.asistio  as 'col8', 
								reserva.fecha  as 'col9' , 
								usuario.profesor as 'col10'
								from reserva
								inner join experimento on experimento.codexp = reserva.codexp
								inner join horas on horas.codhor = reserva.codhora
								inner join laboratorio on laboratorio.codlab = reserva.codlab
								inner join usuario on usuario.codigo = reserva.codigo 
								where (reserva.fecha = '".$fecha."' ) 
								and ( reserva.codlab = '".$laboratorio."' ) ;";

							$resultado = mysqli_query($con,$consulta);
						


							echo "<table border='1' width=\"800\" >
							<tr>
							<th>Codigo de Reserva</th>
							<th>Experimento Reservado</th>
							<th>Apellidos  -</th>
							<th>Nombres  -</th>
							<th>Hora  -</th>
							<th>Laboratorio -</th>
							<th>Profesor -</th>
							<th>Asisitio</th>

							</tr>";


							while($row = mysqli_fetch_array($resultado))
							{
							echo "<tr>";
							echo "<td>" ."LB" .$row['col4'] . "</td>";
							echo "<td>" . $row['col1'] . "</td>";
							echo "<td>" . $row['col7'] . "</td>";
							echo "<td>" . $row['col6'] . "</td>";
							echo "<td>" . $row['col2'] . "</td>";
							echo "<td>" . $row['col3'] . "</td>";
							echo "<td>" . $row['col10'] . "</td>";
							echo "<td>" . $row['col8'] . "</td>";
						echo "</tr>";	
							echo "</tr>";
							}

							echo "</table>";
							echo " <a href=admin_generarimpresion.php?fecha=";echo $fecha;echo"&hora=";echo $hora;echo"&laboratorio=";echo $laboratorio;echo"> Generar Impresion </a>";	



							?>
							

			 			</div>
			 		
 		</div>


 		

		</body>
</html>