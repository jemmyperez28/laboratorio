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
 							Cerrar Sesión
 							</a>
			 			</div>
			 		</div>
 		</div>
 		<div class ="col-sm-7"> 			
			<div class="panel panel-secondary">
			 			<div class="panel-body">
			 				
			 				<form method="post" action="lab2_consulta.php">

			 							<div class="form-group">
                			 		    <label for="codigotext"> Seleccione Fecha Deseada : </label>  <input type="date" id="fecha1" name='fecha1' size='9' value="" /> 
                						</div>

                						<div class="form-group">
                						<!-- <input type="button" value="Submit" />-->
                						<button class="btn btn-primary"> Consultar Disponibilidad </button> 
                						</div>

										</form>	
 							
			 			</div>
			 		
 		</div>


 		

		</body>

</html>