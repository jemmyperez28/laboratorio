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
  require_once("database.php");
  ## PASO DE PARAMETROS DE ESTUDIANTE_RESERVAR
    $codigo =  $_SESSION['codigo'];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $experimento = $_POST["experimento"];
    $laboratorio = $_POST["laboratorio"];
    ## IF QUE CHEKEA SI HAY MAS DE 4 REGISTROS CON EL CODIGO DEL USUARIO.
    $check = "select Count(*) from reserva where codigo ='".$codigo."';";
    $check2 = mysqli_query($con,$check);
    $check3 = mysqli_fetch_array($check2);


    

    if ($check3[0] < 4)
    {
		
			    ##Ejecucion query insercon
			    $sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".$fecha."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
				if ($con->query($sql) === TRUE) {	

				/* PROBANDO PRIMER INNER JOIN 
				$queryhora = "select horas. descripcion as 'Horario Elegido' from horas inner join reserva on horas.codhor=reserva.codhora 
			                    where reserva.codigo = '".$codigo."';";
			    $resultadoqueryhora = mysqli_query($con,$queryhora);
			    $mostrarhora = mysqli_fetch_array($resultadoqueryhora);
			    */

			    //SUPER INNER JOIN PARA MOSTRAR TODOS LOS DATOS COMPLETOS.

			    $QueryTotal = "select experimento.descripcion ,
								horas.descripcion ,
								laboratorio.descripcion ,
								codreserva
								from reserva
								inner join experimento on experimento.codexp = reserva.codexp
								inner join horas on horas.codhor = reserva.codhora
								inner join laboratorio on laboratorio.codlab = reserva.codlab
								where codigo = '".$codigo."';";
				$ResultadoQueryTotal = mysqli_query($con,$QueryTotal);
				$MostrarDatos = mysqli_fetch_array($ResultadoQueryTotal);
				?> 

				<div class="form-group">
				<label for="codigotext"> <center > !!!!Su Lugar fue reservado!!!! </center> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Fecha Establecida : <?php echo $fecha ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Hora  : <?php echo $MostrarDatos[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Experimento  : <?php echo $MostrarDatos[0] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Laboratorio  : <?php echo $MostrarDatos[2] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Codigo de Reserva  : LB<?php echo $MostrarDatos[3] ;?> </label>
				</div>

				<?php
			    echo "Debera Acercarse a la hora establecida y Mostrar su Codigo de Reserva ";
			    echo "Recuerde que Si Ud. No se presenta a la hora pactada , La nota de este laboratorio no sera considerada";
					} 
					else {
						##BACKUP DEL MENSAJE 
						## echo "Error: . $sql . "<br>" . $con->error;
			    echo "Error: Alguien ya reservo este lugar";
						}	


    }
    else
    {
    	echo "Solo son permitidas 4 reservaciones , contacte con su profesor si le gustaria reprogramar";
    }

?>
		 			</div>			 		
 		</div>		
		</body>
</html>