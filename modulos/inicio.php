<?php
global $mysqli;
?>

<div class="row" style="margin-top: 1%;">
  <div class="col s12 m10 l8 xl8">
    <div class="slider">
      <ul class="slides">
        <li><img src="app/img/black1.png"></li>
        <li>
          <img src="app/img/black2.png">
        </li>
        <li>
          <img src="app/img/black1.png">
        </li>
        <li>
          <img src="app/img/black2.png">
        </li>
      </ul>
    </div>
  </div>
  <div class="col s12 m2 l4 xl4">
    <div class="slider">
      <ul class="slides">
        <li><img src="app/img/uwu.png"></li>
        <li>
          <img src="app/img/uwu.png">
          <div class="caption left-align black-text">
            <h3>FIEBRE MUNDIALISTA</h3>
            <h5>Apoya a tu seleccion preferida</h5>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="row center">
  <div class="col s12 card-panel black"><span class="white-text"><span><h6>CATEGORIAS</h6><h6></h6></span></span></div>
  <?php
  $strsql = "SELECT `idcategoria`, `nombre_categoria`, `url_icon` FROM `categorias` ";
  if($stmt = $mysqli->prepare($strsql)){
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0){
      $stmt->bind_result($idcategoria, $nombre_categoria, $url_icon);
      while($stmt->fetch()){
        ?>
        <a href="?modulo=detalle_categorias&idcategoria=<?php echo $idcategoria ?>">
          <div class="col s12 m6 l2">
            <img class="responsive-img" src="<?php echo $url_icon?>" alt="" width="100px">
            <p class="black-text"><b><?php echo $nombre_categoria?></b></p>
          </div>
        </a>
        <?php
      }
    }else{
      echo "No hay datos para mostrar :o";
    }
  }else{
    echo "No se pudo preparar la consulta TwT";
  }
  ?>
  </div>
</div>

<div class="row center">
  <div class="col s12 card-panel black"><span class="white-text"><h6>PRODUCTOS DESTACADOS</h6><h6></h6></span></div>
  <center>
    <div class="col s6"><img src="app/img/camisa14.jpg" alt="" width="80%"><p>New Balance zx568 <br> $37.59</p></div>
    <div class="col s6"><img src="app/img/camisa16.jpg" alt="" width="80%"><p>$37.59</p></div>
  </center>
</div>