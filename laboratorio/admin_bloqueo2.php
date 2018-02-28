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

						<?php 
						$codigo =  $_SESSION['codigo'];
						$codhor=$_POST["cerveza"]; 
						$codlab=$_POST["cerveza2"]; 
						$fecha = $_POST["fecha"]; 
						##//recorremos el array de cervezas seleccionadas. No olvidarse q la primera ##posición de un array es la 0 

						##for ($i=0;$i<count($cervezas);$i++)    
						#{     
						##echo "<br> Cerveza " . $i . ": " . $cervezas[$i];    
						#} 
						#echo $codhor[0] ."<br>";
						#echo $codhor[1]."<br>";
						#echo $codhor[2]."<br>";
						#echo $codhor[3]."<br>";

						#echo $codexp[0] ."<br>";
						#echo $codexp[1]."<br>";
						#echo $codexp[2]."<br>";
						#echo $codexp[3]."<br>";

						#echo $codlab[0] ."<br>";
						#echo $codlab[1]."<br>";
						#echo $codlab[2]."<br>";
						#echo $codlab[3]."<br>";

						#echo $fecha;

						##Ejecucion query insercon
					    #$sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".$fecha."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
					    $sql = " insert into reserva (codhora,codexp,codlab,codigo,fecha)
					    select horas.codhor , 	experimento.codexp , laboratorio.codlab , 
						'".$codigo."' as 'codigo',
						'".$fecha."' as 'fecha'
						from horas
						join experimento
						join laboratorio
						##primer filtro HORAS
						where (horas.codhor = '".$codhor[0]."' or horas.codhor = '".$codhor[1]."' or horas.codhor = '".$codhor[2]."' or horas.codhor = '".$codhor[3]."'  or horas.codhor = '".$codhor[4]."'  or horas.codhor = '".$codhor[5]."'  or horas.codhor = '".$codhor[6]."'  or horas.codhor = '".$codhor[7]."'
					 		or horas.codhor = '".$codhor[8]."'  or horas.codhor = '".$codhor[9]."'
					 	 or horas.codhor = '".$codhor[10]."'  or horas.codhor = '".$codhor[11]."'
					 	 or horas.codhor = '".$codhor[12]."'  or horas.codhor = '".$codhor[13]."'
					 	 or horas.codhor = '".$codhor[14]."'  or horas.codhor = '".$codhor[15]."'
					 	 or horas.codhor = '".$codhor[16]."'  or horas.codhor = '".$codhor[17]."')
						##segundo filtro EXPERIMENTO , LOS DE LAB 1 O LOS DE LAB 2
						and (experimento.codexp in (select experimento.codexp from experimento where fklab ='".$codlab."'))
						##tercer filtro los de laboratorio . todo lab 1 o todo lab2.
						and (laboratorio.codlab='".$codlab."');";
						echo "Codigo insertado : ".$codigo;
						if ($con->query($sql) === TRUE)
						{	
							echo "Horas  bloqueadas correctamente del laboratorio " . $codlab ." De La fecha " .$fecha ;
						}
						else 
						{
							echo "Al parecer hay un horario ya reservado , revise las reservaciones" ;
						}

						?>


			 			</div>		 		
 		</div>
		</body>
</html>