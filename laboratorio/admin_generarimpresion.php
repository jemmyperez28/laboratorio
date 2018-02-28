<?php

 ob_start();
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  echo " Asistencia ";
  require_once("database.php");		
  require_once("revisionadmin.php");

								$fecha = $_GET['fecha']; 
								$hora = $_GET['hora']; 
								$laboratorio = $_GET['laboratorio']; 

$consulta = "select experimento.descripcion as 'col1',
								horas.descripcion as 'col2',
								laboratorio.descripcion as 'col3' ,
								reserva.codreserva as 'col4' , 
								reserva.codigo as 'col5', 
								usuario.nombre as 'col6', 
								usuario.apellidos as 'col7' ,
								reserva.asistio  as 'col8', 
								reserva.fecha  as 'col9' , 
								usuario.profesor as 'col10'
								from reserva
								inner join experimento on experimento.codexp = reserva.codexp
								inner join horas on horas.codhor = reserva.codhora
								inner join laboratorio on laboratorio.codlab = reserva.codlab
								inner join usuario on usuario.codigo = reserva.codigo 
								where (reserva.fecha = '".$fecha."' ) 
								and ( reserva.codlab = '".$laboratorio."' ) ;";

							$resultado = mysqli_query($con,$consulta);
						


							echo "<table border='1' width=\"800\" >
							<tr>
							<th>Codigo de Reserva</th>
							<th>Experimento Reservado</th>
							<th>Apellidos  -</th>
							<th>Nombres  -</th>
							<th>Hora  -</th>
							<th>Laboratorio -</th>
							<th>Profesor -</th>
							<th>Firma </th>

							</tr>";


							while($row = mysqli_fetch_array($resultado))
							{
							echo "<tr>";
							echo "<td>" ."LB" .$row['col4'] . "</td>";
							echo "<td>" . $row['col1'] . "</td>";
							echo "<td>" . $row['col7'] . "</td>";
							echo "<td>" . $row['col6'] . "</td>";
							echo "<td>" . $row['col2'] . "</td>";
							echo "<td>" . $row['col3'] . "</td>";
							echo "<td>" . $row['col10'] . "</td>";
							echo "<td> </td>";
						echo "</tr>";	
							echo "</tr>";
							}

							echo "</table>";


							echo "<a href=admin_reportefecha.php> Atras </a>";
