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
							  require_once("database.php");
							  
							  $codreserva= $_GET['codreserva'];

							  $consulta = "select experimento.codexp as 'exp',
							  reserva.codreserva as 'res' ,
							  reserva.fecha as 'fecha' ,
							  reserva.codigo as 'alumno'
							  from reserva
							  inner join experimento 
							  on experimento.codexp = reserva.codexp
							  where reserva.codreserva = '".$codreserva."';";

							  $resultado = mysqli_query($con,$consulta);
							  $row = mysqli_fetch_array($resultado);
							  #echo $consulta;
							  #echo "aaa";
							  #echo $row['exp'];
							  #echo $row['res'];
							  #echo $row['fecha'];
							  #echo $row['alumno'];
							  $alumno = $row['alumno'];
							  $codreserva = $row['res'];
							  $fechadb = strtotime($row['fecha']);
							  $now = date("Y-m-d");
							  $ahora = strtotime($now);
							  $diferencia = $fechadb - $ahora;
							  #echo $diferencia;
							  #echo "<br>";
							  #echo "fecha ".$row['fecha'] .$fechadb;
							  #echo "<br>";
							  #echo "ahora " .$ahora;
							  
						if ($row['exp']=='exp1')
						{ #echo "experimento " .$row['exp']. " seleccionado , borrar TODOS LOS REGISTROS";

							   if ($diferencia > 86400)
							   {
							   		$sql = "delete from reserva where codigo = '".$alumno."';";
					           		if ($con->query($sql) === TRUE) 
					           		{
								 	 echo "Todas Las reservas Fueron Eliminadas";
									} else {
								 	 echo "Error: " . $sql . "<br>" . $con->error;
									}

							   }
							   elseif ($diferencia < 86400)
							   {
							   	echo " Lo sentimos , No puede eliminar esta reserva, contacte con el profesor";
							   }

							   elseif ($diferencia = 86400)
							   {
							   	echo " Lo sentimos , No puede eliminar esta reserva, contacte con el profesor";
							   }
					    }
					    else
					    {
					    	#echo "otro experimento seleccionado , borrar solo exp  seleccionado" ; 

					    	  if ($diferencia > 86400)
							   {
							   	$sql = "delete from reserva where codreserva = '".$codreserva."';";
					           		if ($con->query($sql) === TRUE) 
					           		{
								 	 echo "Reserva Eliminada! ";
									} else {
								 	 echo "Error: " . $sql . "<br>" . $con->error;
									}
							   }
							   elseif ($diferencia < 86400)
							   {
							   		echo " Lo sentimos , No puede eliminar esta reserva, contacte con el profesor";
							   }

							   elseif ($diferencia = 86400)
							   {
							   	echo " Lo sentimos , No puede eliminar esta reserva , contacte con el profesor";
							   }
					    }

					    #echo $diferencia;

							  #$now = time();
							  #echo "<br>";
							  #echo  $now ;


							?>

			 			</div>			 		
 		</div>		
		</body>
</html>