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
    <div style="margin-bottom:20%;">
        <form class="col s12" method="POST">
            <div class="row center">
                <div class="col s12 card-panel black"><h5 class="white-text">Actualizar Categoria</h5><h5></h5></div>
                <div class="input-field col l8 m8 s12">
                    <input placeholder="" name="nombre_categoria" type="text" class="validate" value="<?php echo $nombre_categoria ?>">
                    
                    <label>Nombre de la Categoria</label>
                </div>
                <div class="input-field col l4 m4 s12">
                    <input placeholder="" name="url_icon" type="text" class="validate" value="<?php echo $url_icon ?>">
                    
                    <label>URL del Icono</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <input placeholder="" name="descripcion" type="text" class="validate" value="<?php echo $descripcion?>">
                    
                    <label>Descripcion de la Categoria</label>
                </div>
                <a class="waves-effect black btn" href="?modulo=admin_categorias">Volver atras</a>
                <button class="btn waves-effect blue" type="submit" name="edit">Actualizar
                    <i class="material-icons right">update</i>
                </button>
            </div>
         </form>
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
                <script>
                    M.toast({html: 'Categoria actualizada exitosamente', classes: 'rounded'})
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