<?php 
  ob_start();
  session_start();
  header("Content-Type: text/html; charset=utf-8");

   // Recibimos por POST los datos procedentes del formulario anterior  
  $codigo = $_POST["codigo"];  
  $clave  = $_POST["clave"];  

  // Abrimos la conexion 
  require_once("database.php");


 
 # $consulta = "SELECT * FROM usuario WHERE codigo = '".$codigo."'"; 
 # CORRECCIONES 13 DE ENERO 2018
  $consulta = "SELECT * FROM usuario WHERE codigo = '".$codigo."' and clave =  '".$clave."';"; 	
  $resultado = mysqli_query($con,$consulta);
  //$Resultado = mysqli_query($con, $Consulta); 
  //echo $consulta;

	  	if( $Registro = mysqli_fetch_array($resultado))
	  	{   

	  		if($Registro["clave"] == $clave)
	  		{
	  		$_SESSION['nivel'] =  $Registro["nivel"];
	  		$_SESSION['codigo'] =  $Registro["codigo"];
	  		$_SESSION['clave'] =  $Registro["clave"];
	  		$_SESSION['nombre'] =  $Registro["nombre"];
	  		$_SESSION['clave'] =  $Registro["clave"];
	  		//echo "Bienvenido " . $_SESSION['nombre'] . " Usted inicio sesion";
	  			//redireccionamiento segun nivel

	  		 switch ($_SESSION['nivel'])
          {   case 1:
                    header("Location: admin_menu.php");
                    exit(); 
              case 2:
                    header("Location: inicio.php");
                    exit(); 
              Default:
                    header("Location: index.php");
                    exit(); 
          }          

	  		}
	  		else 
	  		{echo "<script languaje='javascript'>
              alert('Contraseña incorrecta , Inicie sesión');
              location.href = '/login/index.html';
              </script>";
              session_destroy();
              die;
	  		}
	  	} 
	  	else
	  	{ echo "<script languaje='javascript'>
              alert('Contraseña incorrecta , Inicie sesión');
              location.href = '/login/index.html';
              </script>";
              session_destroy();
              die;
	  		}

  // 

  //echo "Bienvenido " . $Registro["nombre"] . "Su nivel es : " . $_SESSION['nivel'] . "Su clave  es : " . $_SESSION['clave'];

?>