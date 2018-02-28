<html>
	<title>
	Laboratorio
	</title>
		<body>
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>

<?php
##Conexion a la base de datos
require_once("database.php");
## Ojo estilos de bootswatch
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
			                        Reservas de laboratorio
			                    </a>                   
			                </div>
			             </div>
			         </nav>
			 </div>
 <!-- FIN DE CABECERA -->

  <!-- SECCION CONTENIDO  -->
			 <div class="container" align="center">
    			<div class="row">
        			<div class="col-md-8 col-md-offset-5">
            			<div class="panel panel-default">
                			<div class="panel-heading">Registro</div>         
                				<div class="panel-body">

                					<form method="post" action="registraralumno.php">
                						<div class="form-group">
                			 		    <label for="codigotext"> Nombres </label>      <input type="text" name="nombres" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Apellidos  </label>      <input type="text" name="apellidos" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Curso </label>      <input type="text" name="curso" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Bloque </label>      <input type="text" name="bloque" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Codigo </label>      <input type="text" name="codigo" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Clave  </label>      <input type="password" name="clave" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Confirme Contraseña </label> <input type="password" name="confirme" value="" placeholder=""> </p>
                						</div>

                						<div class="form-group">
                						<button class="btn btn-primary"> Registrese!  </button>
                						</div>

      								</form>	

						                    
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
</html>