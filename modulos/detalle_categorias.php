<?php
global $mysqli;
global $urlweb;


$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT `idcategoria`, `nombre_categoria` FROM categorias WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param("i", $idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0){
        $stmt->bind_result($categoria, $nombre_categoria);
        while ($stmt->fetch()){
        ?>
            <div class="row center">
                <div class="col s12 card-panel black"><span class="white-text"><span><h4 style="text-transform: uppercase;"><b><?php echo $nombre_categoria ?></b></h4></span></div>
        <?php
        }
    }else{
        echo "No hay nada que mostrar";
    }
}else{
    echo "No se pudo preparar la consulta";
}

$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT `idproducto`, `idcategoria`, `nombre_producto`, `precio`, `url_imagen` FROM productos WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param("i", $idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0){
        $stmt->bind_result($idproducto, $idcategoria, $nombre_producto, $precio, $url_imagen);
        while ($stmt->fetch()){
            ?>
                    <a href="<?php echo $urlweb?>?modulo=detalle_productos&idproducto=<?php echo $idproducto ?>">
                        <div class="col s12 m6 l3.5">
                            <div class="col s6">
                                <img class="responsive-img" src="<?php echo $url_imagen?>" alt="">
                            </div>
                            <div class="col s6 black-text">
                                <p><b><?php echo $nombre_producto ?></b></p>
                                <p><?php echo "L ".number_format($precio, 2) ?></p>
                            </div>
                            <div class="col s6">
                                <a class="blue darken-3 btn"><i class="material-icons left">add_shopping_cart</i >AL CARRITO</a>
                            </div>
                        </div>
                    </a>
            <?php
            }
        }else{
            echo "No hay nada que mostrar";
        }
    }else{
        echo "No se pudo preparar la consulta";
    }
?>
                </div>