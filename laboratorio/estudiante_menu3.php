<html>
	<title>
	Menu de estudiante
	</title>
		
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>

<?php
  ob_start();
  session_start();
  require_once("revision.php");
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
			 			<div class="panel-heading"> Seleccione laboratorio </div>
			 			<div class="panel-body">
			 				<a href="estudiante_reservar.php" class="list-group-item">
 							Reserve
 							</a>
			 				<a href="estudiante_menu.php" class="list-group-item">
 							Laboratorio 1
 							</a>
 							<a href="estudiante_menu2.php" class="list-group-item">
 							Laboratorio 2 
 							</a>
 							<a href="estudiante_consulta.php" class="list-group-item">
 							Consulte su Reserva
 							</a>
			 			</div>
			 		</div>
 		</div>
 		<div class ="col-sm-7"> 			
			<div class="panel panel-secondary">
			 			<div class="panel-body">
			 				<?php
 							echo "<center> Lab 2 Tabla Dinamica en produccion </center>";
			 				require_once("database.php");
			 				$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
							$hours = array('1.hour', '2.hour', '3.hour', '4.hour', '5.hour', '6.hour', '7.hour', '8.hour', '9.hour');

							echo "<section>";
							echo "<table class='table'>";

							foreach ($days as $day) {
							    echo "<tr>";
							    foreach ($hours as $hour) {
							        echo "<td>";
							        //$query = "SELECT nombre FROM usuario NATURAL JOIN subjects WHERE id_student= ".$_SESSION['nombre']. "AND day='$day' AND hour = '$hour'";

							        $query = "SELECT * FROM reserva";
							        $result = mysqli_query($con, $query);
							        $row = mysqli_fetch_assoc($result);
							        if ($row['codreserva']) {
							        	echo "----";
							           // echo $row['codreserva'];
							        }
							        echo "</td>";
							    }
							    echo "</tr>";
							}

							echo "</table>";
							echo "</section>";
							
							?>
 							
			 			</div>
			 		
 		</div>


 		

		</body>

</html>