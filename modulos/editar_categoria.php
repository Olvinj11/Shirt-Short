<?php
global $mysqli;
global $urlweb;
$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT categorias.idcategoria, categorias.nombre_categoria, categorias.descripcion, categorias.url_icon FROM categorias WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_icon);
        $stmt->fetch();
        ?>
        <div class="container">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col l4 m4 s6">
                        <input name="nombre_categoria" type="text" class="validate">
                        <?php echo $nombre_categoria ?>
                        <label>Nombre de la Categoria</label>
                    </div>
                    <div class="input-field col l6 m6 s12">
                        <input name="descripcion" type="text" class="validate">
                        <?php echo $descripcion?>
                        <label>Descripcion de la Categoria</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col l3 m3 s6">
                        <input name="url_icon" type="text" class="validate">
                        <?php echo $url_icon ?>
                        <label>URL del Icono</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="edit">Actualizar Información de la Categoria
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <div>
                <a class="waves-effect waves-light btn-small" href="?modulo=admin_categorias">Volver a Admin</a>
            </div>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['url_icon']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $url_icon= trim($_POST['url_icon']);
            $strsql ="UPDATE categorias SET nombre_categoria = '$nombre_categoria', descripcion = '$descripcion', url_icon = '$url_icon' WHERE idcategoria = '$idcategoria'";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3>Producto actualizado de Manera Exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al actualizar el producto.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
}
?>