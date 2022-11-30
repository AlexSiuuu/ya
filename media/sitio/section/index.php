<?php include('../template/cabeza.php'); ?>

<?php require('../../conf/cofig.php'); ?>
<?php include('../../db.php'); ?>

<?php

session_start();

$user = $_SESSION['username'];

if (!isset($user)) {
  header("location:../entrar.php");
}else{

}

?>

<?php

$sentenciaSQL=$conex->prepare("SELECT*FROM pelis");
$sentenciaSQL->execute();
$listaPelis = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<br>

<div class="container">
    <div class="row">

    <?php foreach($listaPelis as $peli){ ?>

        <div class="col-md-3">

            <div class="card">
                <img class="card-img-top" src="../../img/<?php echo $peli['imagen']; ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $peli['titulo']; ?></h4>
                    <a name="" id="" class="btn btn-dark" href="peli.php?id=<?php echo $peli['id']; ?>&token=<?php echo hash_hmac('sha1',$peli['id'],KEY_TOKEN); ?>" role="button">Ver mas</a>
                    <a id="" name="" class="btn btn-light">Agregar</a>
                </div>
            </div>

        </div>

    <?php } ?>

    </div>
</div>


<?php include('../template/pie.php'); ?>