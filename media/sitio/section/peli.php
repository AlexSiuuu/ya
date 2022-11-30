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

$id = isset($_GET['id']) ? $_GET['id'] : '' ;
$token = isset($_GET['token']) ? $_GET['token'] : '' ;

if($id == '' || $token == '' ){
    ?>
        <script>
            alert("Error al procesar su peticion");
        </script>
    <?php
    echo "Error con su peticion...";
    exit;
}else{

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if( $token == $token_tmp ){

        $sentenciaSQL=$conex->prepare("SELECT count(id) FROM pelis WHERE id=?");
        $sentenciaSQL->execute([$id]);
        if($sentenciaSQL->fetchColumn()>0){

            $sentenciaSQL=$conex->prepare("SELECT * FROM pelis WHERE id=?");
            $sentenciaSQL->execute([$id]);
            $peli = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

            $titulo = $peli['titulo'];
            $año = $peli['año'];
            $genero = $peli['genero'];
            $descripcion = $peli['descripcion'];
            $imagen = $peli['imagen'];

        }
    }else{
        ?>
        <script>
            alert("Error al procesar su peticion");
        </script>
        <?php
        echo "Error con su peticion...";
        exit;
    }

}

?>


<br>

<div class="container">
  <div class="row">
    <div class="col-md-4">

      <div class="card text-white mb-3" style="max-width: 20rem;">
          <div class="card-body">
          <img class="card-img-top" src="../../img/<?php echo $peli['imagen']; ?>" alt="">
        </div>
        <div class="col-md-12">
        <center><button type="button" class="btn btn-danger" onclick="addPeli(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Agregar</button></center><br>
        </div>  
    </div>

    </div>


    <div class="col-md-8">

      <div class="card border-warning mb-3" style="max-width: 60rem;">
          <div class="card-body">
          <h2 class="card-title"><?php echo $titulo; ?></b></h2>
          <h4 class="card-title"><?php echo $genero; ?></b></h4>
          <h4 class="card-title"><?php echo $año; ?></b></h4>
          <h4 class="card-title"><?php echo $descripcion; ?></b></h4>
          <h4></h4>
        </div>
      </div>
      
    </div>

  </div>
</div>

<script>

    function addPeli(id, token){
        let url = 'agg.php'
        let formData = new FormData()
        formData.append('id',id)
        formData.append('token',token)

        fetch(url,{
            method:'POST',
            body: formData,
            mode:'cors'
        }).then(response => response.json() )
        .then(data =>{
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }

</script>

<?php include('../template/pie.php'); ?>