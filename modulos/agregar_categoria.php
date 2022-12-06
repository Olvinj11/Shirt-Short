<?php
global $mysqli;
global $urlweb;
?>

<div style="margin-bottom:20%;">
    <form class="col s12" method="POST">
        <div class="row center">
            <div class="col s12 card-panel black"><h5 class="white-text">Nueva Categoria</h5><h5></h5></div>
            <div class="input-field col l8 m4 s12">
                <input placeholder="" name="nombre_categoria" type="text" class="validate">
                <label>Nombre de la Categoria</label>
            </div>
            <div class="input-field col l4 m2 s12">
                <input placeholder="" name="url_icon" type="text" class="validate">
                <label>URL del Icono</label>
            </div>
            <div class="input-field col l12 m12 s12">
                <input placeholder="" name="descripcion" type="text" class="validate">
                <label>Descripcion de la Categoria</label>
            </div>
            <a class="waves-effect black btn left" href="?modulo=admin_categorias">Volver atras</a>
            <button class="btn waves-effect green right" type="submit" name="agregar">Agregar categoria<i class="material-icons right">note_add</i></button>
        </div>
    </form>
</div>

<?php
    if (isset($_POST['agregar'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['url_icon']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);
            $url_icon= trim($_POST['url_icon']);
            $strsql ="INSERT INTO categorias(nombre_categoria, descripcion, url_icon) VALUES ('$nombre_categoria','$descripcion','$url_icon')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <script>
                    M.toast({html: 'Categoria agregada exitosamente', classes: 'rounded'})
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