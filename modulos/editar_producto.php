<?php
global $mysqli;
global $urlweb;
$idproducto = $_GET['idproducto'];
$strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.idcategoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM productos INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria WHERE idproducto=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idproducto);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
        $stmt->fetch();
        ?>
        <div style="margin-bottom:20%;">
            <form class="col s12" method="POST">
                <div class="row center">
                    <div class="col s12 card-panel black"><h5 class="white-text">Actualizar Producto</h5><h5></h5></div>
                    <div class="input-field col l10 m12 s12">
                        <input placeholder="" name="nombre_producto" type="text" class="validate" value="<?php echo $nombre_producto ?>">
                        
                        <label>Nombre del Producto</label>
                    </div>
                    <div class="input-field col l2 m6 s12">
                        <input placeholder="" name="idcategoria" type="text" class="validate" value="<?php echo $categoria ?>">
                        <label>Id de Categoria</label>
                    </div>
                    <div class="input-field col l6 m6 s12">
                        <input placeholder="" name="url_imagen" type="text" class="validate" value=" <?php echo $url_imagen ?>">
                       
                        <label>URL de Imagen</label>
                    </div>
                    <div class="input-field col l3 m6 s12">
                        <input placeholder="" name="precio" type="text" class="validate" value="<?php echo $precio ?>">
                        
                        <label>Precio</label>
                    </div>
                    <div class="input-field col l3 m6 s12">
                        <input placeholder="" name="cantidad" type="text" class="validate" value=" <?php echo $cantidad ?>">
                        <label>Cantidad</label>
                       
                    </div>
                    <div class="input-field col l12 m12 s12">
                        <input placeholder="" name="descripcion" type="text" class="validate" value="<?php echo $descripcion?>">
                        
                        <label>Descripcion del Producto</label>
                    </div>
                    <a class="waves-effect black btn" href="?modulo=admin_productos">Volver atras</a>
                    <button class="btn waves-effect blue" type="submit" name="edit">Actualizar<i class="material-icons right">update</i></button>
                </div>
            </form>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_producto']) >= 1 &&
        strlen($_POST['idcategoria']) >= 1 && 
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['precio']) >=1 &&
        strlen($_POST['cantidad']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_producto= trim($_POST['nombre_producto']);
            $idcategoria= trim($_POST['idcategoria']);
            $descripcion= trim($_POST['descripcion']);
            $precio= trim($_POST['precio']);
            $cantidad= trim($_POST['cantidad']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="UPDATE productos SET nombre_producto = '$nombre_producto', idcategoria = '$idcategoria', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', url_imagen = '$url_imagen' WHERE idproducto = '$idproducto'";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <script>
                    M.toast({html: 'Producto actualizado exitosamente', classes: 'rounded'})
                </script>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <script>
                    M.toast({html: 'Error en actualizar', classes: 'rounded'})
                </script>
                <?php
            }
        }else {
            ?>
            <script>
                M.toast({html: 'Debe llenar todos los campos', classes: 'rounded'})
            </script>
            <?php
        }
    }
}
?>