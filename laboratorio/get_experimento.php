

<?php
header("Content-Type: text/html;charset=utf-8");
	 require_once("database.php");
	 	 $output='';

	 $lab = $_POST['dropdownValue'];
	 $sql= "select * from experimento where fklab ='".$lab."';";
	 $result= mysqli_query($con,$sql);
	// $output="<option value \"\">Seleccione un experimento </option>" ;
?>
	
    <option value="">Seleccione experimento</option>
    
	<?php while($row3 = mysqli_fetch_array($result)):; ?>			 	
	<?php	echo "<option value=".$row3[0].">".$row3[1]."</option>"; ?>
	<?php endwhile; ?>	
	 
	 
	

?>
