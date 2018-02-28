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
    ##FIX DE FECHA
    #$fechaoriginal = $_POST["fecha"];
	#$fecha=date("d-m-Y",strtotime($fecha));
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $experimento = $_POST["experimento"];
    $laboratorio = $_POST["laboratorio"];
    ## IF QUE CHEKEA SI HAY MAS DE 4 REGISTROS CON EL CODIGO DEL USUARIO.
    $check = "select Count(*) from reserva where codigo ='".$codigo."';";
    $check2 = mysqli_query($con,$check);
    $check3 = mysqli_fetch_array($check2);

    $experimento1 = "ddf";

    ### IF QUE CHEKEA SI EL ALUMNO , YA TIENE UN REGISTRO CON EL LABORATORIO Y EXPERIMENTO 1.

    $completo1 = " select count(*) from reserva where codigo ='".$codigo."' and (codexp = 'exp1' or codexp = 'exp2' or codexp = 'exp3') 
    				and (codlab = 'lab1');";
    #echo $completo1;
   	$completo2 = mysqli_query($con,$completo1);
   	$completo3 = mysqli_fetch_array($completo2);

   	##IF QUE CHEKEA SI EL ALUMNO YA TIENE UN EXPERIMENTO RESERVADO.
    #### 04-01-2018
   	$fixexperimento = "select count(*) from reserva where codigo ='".$codigo."' and (codexp = '".$experimento."');";

   	$fixexperimento1 = mysqli_query($con,$fixexperimento);
   	$fixexperimento2 = mysqli_fetch_array($fixexperimento1);

   	## IF QUE CHEKEA SI ELIJIO UNA FECHA QUE NO ESTA PERMITIDA
   	$fechafix = " select count(*) from fecha where fecha = '".$fecha."';";
   	$fechafix2 = mysqli_query($con,$fechafix);
   	$fechafix3 = mysqli_fetch_array($fechafix2);

   	## 04- FEBREREO - 2018 
   	## FIX QUE NO PERMITE REGISTRAR FECHAS PASADAS variable $fecha

   	 $fechadb = strtotime($fecha);
	 $now = date("Y-m-d");
	 $ahora = strtotime($now);
	 #echo $fechadb . " seleccionada ";
	 #echo "<br>";
	 #echo $ahora . " hoy";
	 #seleccionado $fechadb, 
	 #hoy $ahora.

#########AGREGANDO UN QUERY PARA SOLUCIONAR IMPRESION EXPERIMENTO ##########
$queryfix = "select * from experimento where codexp = '".$experimento."';";
$resultadoqueryfix = mysqli_query($con,$queryfix);
$muestrafix = mysqli_fetch_array($resultadoqueryfix);
##############################################################
##FIX 2 DE HORA PARA LA IMPRESION HORA###
$fixhora = " select * from horas where codhor = '".$hora."';";
$resultadofixhora = mysqli_query($con,$fixhora);
$muestrahora = mysqli_fetch_array($resultadofixhora);
######################FIX 3 IMPRESION DE LABORATORIO
$fixlab = " select * from laboratorio where codlab = '".$laboratorio."';";
$resultadofixlab = mysqli_query($con,$fixlab);
$muestralab = mysqli_fetch_array($resultadofixlab);
###################FIX CODIGO DE RESERVA
#$muestracod = "select codreserva from reserva order by codreserva DESC limit 1";
#$resultadomuestracod = mysqli_query($con,$muestracod);
#$fixcod = mysqli_fetch_array($resultadomuestracod);

### SI ESTA SELECCIONADO EL LABORATORIO 1 , O SI ESTA SELECCIONADO EL LABORATORIO 2 , SE SEPARNA LOS EVENTOS




if ($laboratorio == "lab1")
{

	##FIX 04-02-2018 NO PERMITE FECHAS PASADAS.
	if ($fechadb < $ahora)
	{
		echo "Usted ha seleccionado una fecha pasada , no se puede realizar el registro";
	}
	else
	{

	##FIX 06-01 -2018 FECHAS PERMITIDAS 
	if ($fechafix3[0] > 0)
	{
		echo "<h3> Lo sentimos , el día seleccionado no hay atención de laboratorio </h3>";
	}
	else
	{
	##FIX 04-01-2018################
	if ($fixexperimento2[0] > 0)
		{echo "<h3> Error Ud ya reservó el experimento Seleccionado <h3>";}
		else 
		{

    	###  SI YA HAY UN REGISTRO DE LABORATORIO 1 EXPERIMENTO 1 //Agregando mesa 1 2 3
   		if ($completo3[0] > 0 )
   		{	
   			## si no hay mas de 4 REGISTROS.
    		if ($check3[0] < 4)
    		{
		
			    ##Ejecucion query insercon
			    #date("d-m-Y",strtotime($fecha))
			    #ORIGINAL
			 $sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".$fecha."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
    			#PROBANDO NUEVO 
    			#$sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".date("d-m-Y",strtotime($fecha))."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
				if ($con->query($sql) === TRUE)
				{	
					#probando
					 $last_id = $con->insert_id;

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
				<label for="codigotext"> <center > !Su Registro fue realizado con Suceso! </center> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Fecha Establecida : <?php echo date("d/m/Y",strtotime($fecha)) ;?> </label>
				</div>
				<div class="form-group">

				<label for="codigotext"> Hora  : <?php echo $muestrahora[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Experimento  : <?php echo $muestrafix[1];//echo $MostrarDatos[0] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Laboratorio  : <?php echo $muestralab[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Codigo de Reserva  : LB<?php  echo $last_id ;?> </label>
				</div>

				<?php
			    echo "Deberá Acercarse al laboratorio 5 minutos antes de la hora establecida indicando su código de reserva ";
			    echo "*La ausencia del estudiante conlleva a automaticamente a una calificación desaprobatoria en la experiencia elejida sin posibilidad de poder reagendarla.";
				} 
				else 
				{
						##BACKUP DEL MENSAJE 
						## echo "Error: . $sql . "<br>" . $con->error;
			        echo "<h3>Lo sentimos, este horario ya se encuentra reservado</h3>";
				}	


    		}
    		else
    		{
    		echo "Solo son permitidas 4 reservaciones , contacte con su profesor si le gustaria reprogramar";
    		}
  		}
 		####  SI NO HAY REGISTROS DEL ALUMNO CON LABORATORIO 1 Y EXPERIMENTO 1
  		else if ($completo3[0] == 0)
  		{
  				### SI NO HAY REGISTROS , Y SELECCIONA LAB 1 Y EXP 1 , DEJA REGISTRAR ## modifique 20-02-2018
  				if (($experimento == "exp1" && $laboratorio == "lab1") or ($experimento == "exp2" && $laboratorio == "lab1") or ($experimento == "exp3" && $laboratorio == "lab1") )
  				{
  					##Ejecucion query insercon
			    $sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".$fecha."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
					if ($con->query($sql) === TRUE) 
					{	
						#probando
					 $last_id = $con->insert_id;

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
				<label for="codigotext"> <center >!Su Registro fue realizado con Suceso! </center> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Fecha Establecida : <?php echo date("d/m/Y",strtotime($fecha)) ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Hora  : <?php echo $muestrahora[1]  ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Experimento  : <?php echo $muestrafix[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Laboratorio  : <?php echo $muestralab[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Codigo de Reserva  : LB<?php echo $last_id ;?> </label>
				</div>

				<?php
			       echo "Deberá Acercarse al laboratorio 5 minutos antes de la hora establecida indicando su Código de reserva";
			       echo "*La ausencia del estudiante conlleva a automaticamente a una calificación desaprobatoria en la experiencia elejida sin posibilidad de poder reagendarla.";
					} 
					else 
					{
						##BACKUP DEL MENSAJE 
						## echo "Error: . $sql . "<br>" . $con->error;
			    echo "<h3>Lo sentimos, este horario ya se encuentra reservado</h3>";
					}	
 			 	}
 				else 
 					#### SI NO , SE LE OBLIGA A REGISTRAR ESE.
 				{

    			echo "<h3> Primero debe realizar el experimento \"Análisis de Errores y Medidas - Mesa 1 - 2 - 3 \" <h3>";
    			}

		}

####### FIX
		}
###### OTRO FIX
		}
####### OTRI FIX MAS 2 de febrero
	}
}
else 

{

##FIX 04-02-2018 NO PERMITE FECHAS PASADAS.
	if ($fechadb < $ahora)
	{
		echo "Usted ha seleccionado una fecha pasada , no se puede realizar el registro";
	}
	else
	{


##FIX 06-01 -2018 FECHAS PERMITIDAS 
	if ($fechafix3[0] > 0)
	{
		echo "<h3> Lo sentimos , el día seleccionado no hay atención de laboratorio </h3>";
	}
	else
	{
	##FIX 04-01-2018
	if ($fixexperimento2[0] > 0)
		{echo "<h3> Error Ud ya reservó el experimento Seleccionado <h3>";}
		else 
		{

			if ($check3[0] < 4)
    		{
		
			    ##Ejecucion query insercon
			    $sql = "Insert into reserva (fecha,codhora,codigo,codexp,codlab) values ('".$fecha."','".$hora."','".$codigo."','".$experimento."','".$laboratorio."'); ";
				if ($con->query($sql) === TRUE)
				{	
						#probando
					 $last_id = $con->insert_id;

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
				<label for="codigotext"> <center > !Su Registro fue realizado con Suceso! </center> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Fecha Establecida : <?php echo date("d/m/Y",strtotime($fecha)) ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Hora  : <?php echo $muestrahora[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Experimento  : <?php echo $muestrafix[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Laboratorio  : <?php echo $muestralab[1] ;?> </label>
				</div>
				<div class="form-group">
				<label for="codigotext"> Codigo de Reserva  : LB<?php echo  $last_id ;?> </label>
				</div>

				<?php
			    echo "Deberá Acercarse al laboratorio 5 minutos antes de la hora establecida indicando su código de reserva ";
			    echo "*La ausencia del estudiante conlleva a automaticamente a una calificación desaprobatoria en la experiencia elejida sin posibilidad de poder reagendarla.";
				} 
				else 
				{
						##BACKUP DEL MENSAJE 
						## echo "Error: . $sql . "<br>" . $con->error;
			        echo "<h3>Lo sentimos, este horario ya se encuentra reservado</h3>";
				}	


    		}
    		else
    		{
    		echo "Solo son permitidas 4 reservaciones , contacte con su profesor si le gustaria reprogramar";
    		}
    ##ultimos FIX
    	}
    	}
    }
    }




?>
		 			</div>			 		
 		</div>		
		</body>
</html>