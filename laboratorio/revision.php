<?php
//Comprobamos que la sesión existe

    if(empty($_SESSION)){
      echo "<script languaje='javascript'>
              alert('Alerta! Debe iniciar sesion.');
              location.href = '/login/index.html';
              </script>";
              #require('cerrar.php');
              die;    
            }else{
        


    if (!isset($_SESSION['codigo']))
    {   echo "<script languaje='javascript'>
              alert('Alerta! Debe iniciar sesion.');
              location.href = '/login/index.html';
              </script>";
              #require('cerrar.php');
              die;
    } 
   //Comprobamos el nivel del usuario
    if ($_SESSION['nivel'] == 1)
    {   echo "<script languaje='javascript'>
              alert('No tiene autorización para esta página.');
              location.href = '/login/index.html';
              </script>";
              #require('cerrar.php');
              die;
    }


    }

?>
