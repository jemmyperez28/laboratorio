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
                			<div class="panel-heading">Login</div>         
                				<div class="panel-body">

                					<form method="post" action="validarusuario.php">
                						<div class="form-group">
                			 		    <label for="codigotext"> Codigo </label>      <input type="text" name="codigo" value="" placeholder="Ingrese Codigo de alumno"> </p>
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Clave  </label>      <input type="password" name="clave" value="" placeholder="Contraseña"> </p>
                						</div>

                						<div class="form-group">
                						<button class="btn btn-primary"> Iniciar Sesion </button>
                						</div>

      								</form>	

						                    
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
</html>