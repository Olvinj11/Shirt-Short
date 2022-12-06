<?php
global $mysqli;

$idproducto = $_GET['idproducto'];
    $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`,`url_imagen` FROM `productos` WHERE idproducto=?";
    if($stmt = $mysqli->prepare($strsql)){
        $stmt->bind_param("i", $idproducto);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen);
            $stmt->fetch();
    
        }else{
            echo "No hay nada que mostrar";
        }
    }else{
        echo "No se pudo preparar la consulta";
    }
?>

<div class="row">
    <div class="col l6 m6 s12">
        <img src="<?php echo $url_imagen?>" alt="" width="100%">
    </div>
    <div class="col l6 m6 s12">
        <div class="card-panel blue-grey darken-4 white-text center-align"><b><h5><?php echo $nombre_producto ?></h5></b></div>
        Descripcion del producto: <br><b><span><?php echo $descripcion ?></span></b><br><br>
        Cantidad en existencia: <b><span><?php echo $cantidad ?></span></b>
        <h5>Precio: <b><?php echo "L ".number_format($precio) ?></b></h5>
        <a class="red darken-3 btn"><i class="material-icons left">add_shopping_cart</i>AGREGAR AL CARRITO</a>
    </div>
</div>