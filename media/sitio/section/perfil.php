
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Sky Film</title>
    <style>
      .name:hover{
        transition: 1000ms;
        color: purple;
      }
      .img{
        width: 250px;
      }
    </style>
</head>
<body>

<?php require('../../conf/cofig.php'); ?>

<?php include('../../db.php'); ?>

<?php $url="http://".$_SERVER['HTTP_HOST']."/media"; ?>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Sky Film</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/index.php">Pelis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/perfil.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/cerrar.php">Cerrar</a>
        </li>
      </ul>
      </div>
    </div>
</nav>

<div style="background:black;" >
  
</div>
<br>

<?php


session_start();

$user = $_SESSION['username'];

if (!isset($user)) {
  header("location:../entrar.php");
}else{

?>

<div class="container">
  <div class="row">
    <div class="col-md-4">

      <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
          <div class="card-body">
          <h4 class="card-title">Te damos la bienvenida </b></h4>
          <h4 class="card-title name"><b><?php echo $user; ?></b></h4>
          <p class="card-text">En esta seccion es donde tu puedes ver tus peliculas guardadas. </p>
        </div>
      </div>

    </div>


    <div class="col-md-8">

      <div class="card border-warning mb-3" style="max-width: 60rem;">
          <div class="card-body">
          <h4 class="card-title">Aqui estan tus peliculas guardadas</b></h4>
          <p class="card-text">A todas la peliculas que les des guardar se almacenaran aqui. </p><br>

        </div>
      </div>
      
    </div>

  </div>
</div>




<?php
}
?>




<?php include('../template/pie.php'); ?>