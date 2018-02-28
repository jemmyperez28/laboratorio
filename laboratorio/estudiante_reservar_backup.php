<html>
	<title>
	Menu de estudiante
	</title>
		
			<link href="css/bootstrap.css" rel="stylesheet">
			<script src="js/bootstrap.js"></script>

<?php
  ob_start();
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  echo "Bienvenido : " . $_SESSION['nombre'];
  require_once("database.php");
  ##POSIBLES CONSULTAS MULTIPLES
  ##ROW1
  $laboratorio = "SELECT * FROM laboratorio"; 
  $resultadolaboratorio = mysqli_query($con,$laboratorio);
  ##ROW2
  $experimento = "SELECT * FROM experimento";
  $resultadoexperimento = mysqli_query($con,$experimento);
  ##ROW3
  $hora = "SELECT * FROM horas";
  $resultadohora = mysqli_query($con,$hora);

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
			                       
			                    Open - Lab Physics &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 &#160 	USIL
			                    
			                    </a>                   
			                </div>
			             </div>
			         </nav>
			 </div>
 <!-- FIN DE CABECERA -->
		<body>
		<?php
		require_once("database.php");
		?>
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
			 				
			 				<form method="post" action="reservar.php">
                	
                						<div class="form-group">
                			 		    <label for="codigotext"> Fecha : </label>  <input type="date" id="fecha" name='fecha' size='9' value="" /> 
                						</div>

                						<div class="form-group">
                			 		    <label for="codigotext"> Laboratorio :</label> 
	                			 		     <select name="laboratorio" id="laboratorio">
											 <option value="">Seleccione laboratorio</option>			 
											 	<?php while($row1 = mysqli_fetch_array($resultadolaboratorio)):; ?>
											 	<?php	echo "<option value=".$row1[0].">".$row1[1]."</option>"; ?>
											 	<?php endwhile; ?>										 
											</select> <br>
										</div>

										<div class="form-group">
										<label for="codigotext"> Experimento :</label> 
											<select name="experimento" id="experimento">
												

											</select> <br>
										</div>
										<div class="form-group">
											<label for="codigotext"> Horario :</label> 
											<select name="hora" id="hora">
												<option value="">Seleccione</option>
												<?php while($row3 = mysqli_fetch_array($resultadohora)):; ?>
											 	<?php	echo "<option value=".$row3[0].">".$row3[1]."</option>"; ?>
											 	<?php endwhile; ?>
											</select> <br>


                						</div>

                						<div class="form-group">
                						<!-- <input type="button" value="Submit" />-->
                						<button class="btn btn-primary"> Reservar </button> 
                						</div>
      								</form>			
			 			</div>		 		
 		</div>

</body>

<div id='post'></div>

<script src="jquery-3.2.1.min.js"> </script>
 		<script>

            $(document).ready(function(){
            $('#laboratorio').change(function(){
                //Selected value
                var inputValue = $(this).val();
                //Ajax for calling php function   

                 $.post('get_experimento.php', { dropdownValue: inputValue  }, 
                	function(data1){   
                	//alert('ajax completed. Response:  '+data);
                	//$('#experimento1').empty();            
                	
                	document.getElementById('experimento').options.length = 0;
                	$('#experimento').append(data1);
                	});    
            });
        });

            $(document).ready(function(){
            $('#experimento').change(function(){
                //Selected value
                var inputValue2 = $('#laboratorio').val();
                var inputValue1 = $('#fecha').val();
                var inputValue = $(this).val();
                //Ajax for calling php function
                $.post('get_data.php', { dropdownValue: inputValue ,dropdownValue1:inputValue1 }, 
                	function(data){   
                	//alert('ajax completed. Response:  '+data);
                	$('#post').empty();            
                	$('#post').append(data);
                	});      
            });
        });



           

            
            


        </script>