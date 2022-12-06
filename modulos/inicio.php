<?php
global $mysqli;
?>

<div class="row">
  <div class="col s12 m12 l8 xl8">
    <div class="slider" style="margin-top: 0.5%;">
      <ul class="slides">
        <li><img class="responsive-img" src="app/img/slider1_1.jpg"></li>
        <li><img class="responsive-img" src="app/img/slider1_2.jpg"></li>
        <li><img class="responsive-img" src="app/img/black2.png"></li>
      </ul>
    </div>
  </div>
  <div class="col s12 m12 l4 xl4">
    <div class="slider" style="margin-top: 1%;">
      <ul class="slides">
        <li><img class="responsive-img" src="app/img/slider2_1.jpg"></li>
        <li><img class="responsive-img" src="app/img/slider2_2.jpg"></li>
        <li><img class="responsive-img" src="app/img/slider2_3.jpg"></li>
        <li><img class="responsive-img" src="app/img/slider2_4.jpg"></li>
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
          <div class="col s6 m6 l2">
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
  <div class="col s12 card-panel black"><span class="white-text"><h6>PRODUCTO DESTACADO</h6><h6></h6></span></div>
    <center>
      <div class="col s12">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE idproducto=14";
        if($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows>0){
              $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_imagen);
              $stmt->fetch();
            }else{
              echo "No hay nada que mostrar";
            }
        }else{
          echo "No se pudo preparar la consulta";
        }
        ?>
        <a class="center" href="?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
          <div class="col s12 center">
            <img src="<?php echo $url_imagen ?>" width="20%"><p class="black-text centered"><b><?php echo $nombre_producto ?><br> <?php echo "L ".number_format($precio).".00"?></b></p>
          </div>
        </a>
      </div>
    </center>
  </div>
</div>