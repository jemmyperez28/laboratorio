<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("database.php");

//Paso de parametros
	$nombres =  $_POST["nombres"];
	$apellidos =  $_POST["apellidos"];
	$curso =  $_POST["curso"];
	$bloque =  $_POST["bloque"];
	$codigo =  $_POST["codigo"];
	$clave =  $_POST["clave"];
	$profesor =  $_POST["profesor"];
	$nivel = "2";

// Ejecucion de la insercion.
$sql="Insert into usuario values ('".$codigo."','".$clave."','".$nivel."','".$nombres."','".$apellidos."','".$curso."','".$bloque."','".$profesor."' );";

if ($con->query($sql) === TRUE) {
    echo " <center><h2> Registro realizado !! </h2> </center> 
    		<center><h2> Su usuario es : ".$codigo. "  </h2> </center>  
    		 <center> <h2> Su clave es : ".$clave. "  </center>  </h2>
    		  <center> <h2> Porfavor guarde estos datos para futuras reservaciones </h2> </center>  "
    		  ."<center> <h2> <a href=\"../login/index.html\">Inicie Sesión</a> </center> </h2>" 
    		  ."<center><button onClick=\"window.print()\">Imprimir</button> </h2> </center>";
} else {
	echo "Lo sentimos El código del alumno ya fue registrado , intente de nuevo o comuniquese con el profesor. <br>";
	#echo "Codigo de Error : <br>";
    #echo "Error: " . $sql . "<br>" . $conn->error;
}
	
?>
