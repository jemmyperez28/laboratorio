<html>
	<title>
	Menu de estudiante
	</title>
		
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>



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
			                    Open - Lab Physics &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 	USIL
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
			 				<a href="inicio.php" class="list-group-item">
 							Inicio
 							</a>
			 				<a href="estudiante_reservar.php" class="list-group-item">
 							Haga una Reserva
 							</a>
 							<a href="estudiante_consulta.php" class="list-group-item">
 							Consulte sus Reservas
 							</a>
 							<a href="cerrar.php" class="list-group-item">
 							Cerrar Sesión
 							</a>
			 			</div>
			 		</div>
 		</div>
 		<div class ="col-sm-7"> 			
			<div class="panel panel-secondary">
			 			<div class="panel-body">

			 				<?php
							  ob_start();
							  session_start();
							  header("Content-Type: text/html; charset=utf-8");
							  require_once("revision.php");
							  require_once("database.php");
							  ## PASO DE PARAMETROS DE ESTUDIANTE_RESERVAR
							$codigo =  $_SESSION['codigo'];
							$consulta = "select experimento.descripcion as 'col1',
								horas.descripcion as 'col2',
								laboratorio.descripcion as 'col3' ,
								codreserva , fecha , experimento.codexp 
								from reserva
								inner join experimento on experimento.codexp = reserva.codexp
								inner join horas on horas.codhor = reserva.codhora
								inner join laboratorio on laboratorio.codlab = reserva.codlab
								where codigo = '".$codigo."';";

							$resultado = mysqli_query($con,$consulta);

							echo "<table border='1'>
							<tr>
							<th>Codigo de Reserva</th>
							<th>Fecha Reservada</th>
							<th>Hora Reservada</th>
							<th>Experimento Reservado</th>
							<th>Laboratorio Reservado</th>


							</tr>";
							
							while($row = mysqli_fetch_array($resultado))
							{
							$fechaoriginal =  $row['fecha'];
							$nuevafecha=date("d-m-Y",strtotime($fechaoriginal));
							echo "<tr>";
							echo "<td>" ."LB" .$row['codreserva'] . "</td>";

							#echo "<td> ". $row['fecha'] . "</td>";
							echo "<td>" . $nuevafecha . "</td>";
							echo "<td>" . $row['col2'] . "</td>";
							echo "<td>" . $row['col1'] . "</td>";
							echo "<td>" . $row['col3'] . "</td>";

							echo "  <td><a href=estudiante_elimina.php?codreserva=";echo $row['codreserva'];echo"> Eliminar Reserva</a></td>";
							echo "</tr>";
							}
							echo "</table>";

							?>

			 			</div>			 		
 		</div>		
		</body>
</html>
<script src="jquery-3.2.1.min.js"> </script>
