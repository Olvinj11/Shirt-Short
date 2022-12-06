<?php
global $mysqli;
global $urlweb;
?>

<div style="margin-bottom:20%;">
    <form class="col s12" method="POST">
        <div class="row center">
            <div class="col s12 card-panel black"><h5 class="white-text">Nuevo Producto</h5><h5></h5></div>
            <div class="input-field col l7 m12 s12">
                <input placeholder="" name="nombre_producto" type="text" class="validate">
                <label>Nombre del Producto</label>
            </div>
            <div class="input-field col l3 m12 s12">
                <input placeholder="" name="url_imagen" type="text" class="validate">
                <label>URL de la Imagen</label>
            </div>
            <div class="input-field col l1 m6 s12">
                <input placeholder="" name="precio" type="text" class="validate">
                <label>Precio</label>
            </div>
            <div class="input-field col l1 m6 s12">
                <input placeholder="" name="cantidad" type="text" class="validate">
                <label>Cantidad</label>
            </div>
            <div class="input-field col l10 m12 s12">
                <input placeholder="" name="descripcion" type="text" class="validate">
                <label>Descripcion del Producto</label>
            </div>
            <div class="input-field col l2 m12 s12">
                <input placeholder="" name="idcategoria" type="text" class="validate">
                <label>Id Categoria</label>
            </div>
            <a class="waves-effect black btn left" href="?modulo=admin_productos">Volver atras</a>
            <button class="btn waves-effect green right" type="submit" name="agregar">Agregar producto
                <i class="material-icons right">note_add</i>
            </button>
        </div>
    </form>
</div>

<?php
    if (isset($_POST['agregar'])){
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
            $strsql ="INSERT INTO productos(nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen) VALUES ('$nombre_producto','$idcategoria','$descripcion','$precio','$cantidad','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <script>
                    M.toast({html: 'Producto agregado exitosamente', classes: 'rounded'})
                </script>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <script>
                    M.toast({html: 'Error', classes: 'rounded'})
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
?>