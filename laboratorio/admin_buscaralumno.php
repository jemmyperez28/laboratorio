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
			 						Busqueda por Codigo
						<form method="post" action="admin_buscaralumnoprocesa.php">
                						<div class="form-group">
                			 		    <label for="codigotext"> Codigo </label> <input type="text" name="codigoo" value="" placeholder="Ingrese Codigo del alumno"> </p>
                						</div>

                						<div class="form-group">
                						<button class="btn btn-primary"> Buscar </button>
                						</div>

      								</form>	
      								Busqueda por Nombre
      						<form method="post" action="admin_buscarpornombre.php">
                						<div class="form-group">
                			 		    <label for="codigotext"> Nombre </label> <input type="text" name="codigoo" value="" placeholder="Ingrese Codigo del alumno"> </p>
                						</div>

                						<div class="form-group">
                						<button class="btn btn-primary"> Buscar  </button>
                						</div>

      								</form>	
      									Busqueda por Apellido
      						<form method="post" action="admin_buscarporape.php">
                						<div class="form-group">
                			 		    <label for="codigotext"> Apellido </label> <input type="text" name="codigoo" value="" placeholder="Ingrese Codigo del alumno"> </p>
                						</div>

                						<div class="form-group">
                						<button class="btn btn-primary"> Buscar  </button>
                						</div>

      								</form>	

			 			</div>
			 		
 		</div>


 		

		</body>
</html>