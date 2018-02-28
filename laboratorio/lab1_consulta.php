<html>
	<title>
	Menu de estudiante
	</title>
		
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>

<?php
  ob_start();
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  echo "Bienvenido : " . $_SESSION['nombre'];
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
			                    Menu del Estudiante			            
			                    </a>                   
			                </div>
			             </div>
			         </nav>
			 </div>
 <!-- FIN DE CABECERA -->

		<body>
 		<div class ="col-sm-3"> 			
			<div class="panel panel-primary">
			 			<div class="panel-heading"> Funciones</div>
			 			<div class="panel-body">
			 				<a href="estudiante_reservar.php" class="list-group-item">
 							Haga una Reserva
 							</a>
			 				<a href="estudiante_menu.php" class="list-group-item">
 							Disponibilidad Laboratorio 1
 							</a>
 							<a href="estudiante_menu2.php" class="list-group-item">
 							Disponibilidad Laboratorio 2 
 							</a>
 							<a href="estudiante_consulta.php" class="list-group-item">
 							Consulte sus Reservas
 							</a>
 							<a href="cerrar.php" class="list-group-item">
 							Cerrar Sesion
 							</a>
			 			</div>
			 		</div>
 		</div>
 		<div class ="col-sm-7"> 			
			<div class="panel panel-secondary">
			 			<div class="panel-body">
			 				<?php
			 				require_once("database.php");
			 				$fecha1 = $_POST["fecha1"];
			 				$lab = "lab1";

			 				$consulta_lab1 = "select reserva.codreserva, horas.descripcion as 'hora', experimento.descripcion 
								from reserva 
								inner join horas on horas.codhor = reserva.codhora
								inner join experimento on experimento.codexp = reserva.codexp
								inner join laboratorio on laboratorio.codlab = reserva.codlab
								where reserva.fecha = '".$fecha1."' and laboratorio.codlab ='".$lab."';";
							$resultado_lab1 = mysqli_query($con,$consulta_lab1);
							echo "<center><h3> Reservaciones de la fecha : '".$fecha1."' </h3> </center>";

					    $check = "select Count(*) from reserva where codlab='".$lab."' and fecha = '".$fecha1."';";
    					$check2 = mysqli_query($con,$check);
    					$check3 = mysqli_fetch_array($check2);
					   
					    if ($check3[0] > 0)
    					{

							echo "<table border='1'>
							<tr>
							<th>Codigo de Reserva</th>
							<th> <b>Hora Reservada<b> </th>
							<th>Experimento reservado </th>
							<th>Estado  </th>
						


							</tr>";
							
							while($row1 = mysqli_fetch_array($resultado_lab1))
							{
							
							
							echo "<tr>";
							echo "<td>" ."LB" .$row1['codreserva'] . "</td>";
							echo "<td> <b>" . $row1['hora'] . " </b></td>";
							echo "<td>" . $row1['descripcion'] . "</td>";
							echo "<td>" . "Reservado ." . "</td>";
							echo "</tr>";

							
							}
							echo "</table>";



						}
						else 
						{
							echo "<h3><center>NO HAY RESERVACIONES , SE EL PRIMERO EN RESERVAR</h3> </center>";
						}
						
						

						############ PROBANDO SEGUNDA CONSULTA 

						echo "<center> <td> <h3>" . "Horarios Disponibles ." . "</h3></center></td>";

						###################################


			 				?>
			 							
			 			</div>			 		
 		</div>		
		</body>
</html>