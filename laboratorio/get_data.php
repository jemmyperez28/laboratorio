
<?php
              require_once("database.php");
              $fecha1 = $_POST['dropdownValue1'];
              $lab = $_POST['dropdownValue2'];
              $experimento = $_POST['dropdownValue'];

              $consulta_lab1 = "select reserva.codreserva, horas.descripcion as 'hora', experimento.descripcion 
                from reserva 
                inner join horas on horas.codhor = reserva.codhora
                inner join experimento on experimento.codexp = reserva.codexp
                inner join laboratorio on laboratorio.codlab = reserva.codlab
                where reserva.fecha = '".$fecha1."' and laboratorio.codlab ='".$lab."' 
                and experimento.codexp='".$experimento."';";

              $resultado_lab1 = mysqli_query($con,$consulta_lab1);
              echo "<center><h3> Reservaciones de la fecha : '".$fecha1."' </h3> </center>";

              $check = "select Count(*) from reserva where codlab='".$lab."' and fecha = '".$fecha1."';";
              $check2 = mysqli_query($con,$check);
              $check3 = mysqli_fetch_array($check2);
             
              if ($check3[0] > 0)
              {

              echo "<center> <table border='1'>
              <tr>
              <th> <center> Codigo de Reserva  &#160</center> </th>
              <th> <center> <b>Hora Reservada </center> <b> </th>
              <th> <center> Experimento reservado </center> </th>
              <th> <center> Estado </center> </th>
            


              </tr>";
              
              while($row1 = mysqli_fetch_array($resultado_lab1))
              {
              
              
              echo "<tr>";
              echo "<td>" ."<center>" ."LB".$row1['codreserva'] . " </center> </td>";
              echo "<td> <b> <center> " . $row1['hora'] . "  </center> </b></td>";
              echo "<td> <center> "  . $row1['descripcion'] . "</center> </td>";
              echo "<td> <center> " . "Reservado  <img src=\"images/no.jpg\"> </center> "  . "</td>";
              echo "</tr>";

              
              }
              echo "</table> </center>";

               ############ PROBANDO SEGUNDA CONSULTA 

            echo "<center> <td> <h3>" . "Horarios Disponibles ." . "</h3></center></td>";
             $consulta_lab2 = "select horas.descripcion as 'Hora',
                experimento.descripcion as 'Experimento' ,
                laboratorio.descripcion as 'Laboratorio'
                from temporal_lab1
                 inner join horas on horas.codhor = temporal_lab1.codhora
                 inner join experimento on experimento.codexp = temporal_lab1.codexp
                 inner join laboratorio on laboratorio.codlab = temporal_lab1.codlab
                where ((temporal_lab1.codhora, temporal_lab1.codlab, temporal_lab1.codexp) 
                NOT IN(SELECT reserva.codhora, reserva.codlab , 
                reserva.codexp FROM reserva where (codlab='".$lab."')
                and (fecha = '".$fecha1."')))
                and (temporal_lab1.codlab='".$lab."')
                and (experimento.fklab='".$lab."')
                and (experimento.codexp='".$experimento."');";
            
             $resultado_lab2 = mysqli_query($con,$consulta_lab2);

              echo " <center> <table border='1'>
              <tr>
              <th> <center> <b>Hora Disponible <b> </center> </th>
              <th> <center>  Experimento </center> </th>
              <th> <center> Laboratorio  </center> </th>
              <th> <center> Disponibilidad </center> </th>
              </tr>";

             while($row2 = mysqli_fetch_array($resultado_lab2))
              {
              
              
              echo "<tr>";
              echo "<td> <b> <center> " .$row2['Hora'] . " </center> </b></td>";
              echo "<td> <center> " . $row2['Experimento'] . "</center> </td>";
              echo "<td> <center> " . $row2['Laboratorio'] . "</center> </td>";
              echo "<td> " . "Disponible . <center> <img src=\"images/ok.jpg\"> </center>  ". "</td>";
              echo "</tr>";

              
              }
              echo "</table> </center>";


            ###################################

            }
            else 
            {
              echo "<h3><center>NO HAY RESERVACIONES , SE EL PRIMERO EN RESERVAR</h3> </center>";
            }
            
            




              ?>

