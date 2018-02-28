<?php
//Comprobamos que la sesión existe
   if ($_SESSION['codigo']='')
    {   echo "<script languaje='javascript'>
              alert('Alerta! Debe iniciar sesion.');
              location.href = '/login/index.html';
              </script>";
              die;
    } 


    if (!isset($_SESSION['codigo']))
    {   echo "<script languaje='javascript'>
              alert('Alerta! Debe iniciar sesion.');
              location.href = '/login/index.html';
              </script>";
              die;
    }	
	 //Comprobamos el nivel del usuario
    if ($_SESSION['nivel'] == 2)
    {   echo "<script languaje='javascript'>
              alert('No tiene autorización para esta página.');
              location.href = '/login/index.html';
              </script>";
    }
?>
