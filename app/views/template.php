<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Travel Card.">
  <meta name="author" content="flizcano">

  <title>Globals Tours Travel</title>


  <?php
    /*===============================
    =       Estilo Globales    =
    ===============================*/
    include 'modulos/head/estilos.php';
  ?>
</head>

<body>

  <?php

    if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

      /*===============================
      =            Lateral            =
      ===============================*/
      include "modulos/header.php";

      /*===============================
      =            Lateral            =
      ===============================*/
      include "modulos/left.php";
      
      if(isset($_GET["ruta"])){

        if($_GET["ruta"]== "inicio" ||
           $_GET["ruta"]== "premiumclub" ||
           $_GET["ruta"]== "salir"){

          include "modulos/".$_GET["ruta"].".php";

        }

      }


    } else {

      include "modulos/login.php";

    }

    /*==================================
    =        Vendors JS            =
    ==================================*/

    include "modulos/globalJS.php";

    if(isset($_GET["ruta"])) {
      echo '<script src="views/js/pages/'.$_GET["ruta"].'.js?rand='.rand().'"></script>';
    }else {
      echo '<script src="views/js/pages/login.js"></script>';
    }

  ?>
</body>
</html>
