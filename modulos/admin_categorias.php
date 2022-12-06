<?php
global $mysqli;
global $urlweb;
?>
<div class = "col s12 grey lighten-3">
    <br>
    <h3 class="center">Administrador de Categorias</h3>
    <table class="centered responsive-table">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Icon</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $strsql ="SELECT categorias.idcategoria, categorias.nombre_categoria, categorias.descripcion, categorias.url_icon FROM categorias";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows >0){
                    $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_icon);
                    while($stmt->fetch()){
                        ?>
                        <tr id="<?php echo $idcategoria ?>">
                            <td><?php echo $nombre_categoria?></td>
                            <td><?php echo $descripcion?></td>
                            <td><img src="<?php echo $url_icon?>" alt="" width="150px"></td>
                            <td><a href="<?php $urlweb ?>?modulo=editar_categoria&idcategoria=<?php echo $idcategoria ?>" class="btn gray">Editar</a></td>
                            <td><a class="btn red" href="javascript:eliminar2(<?php echo $idcategoria?>)">Eliminar</a></td>
                        </tr>
                        <?php
                        }
                    }else{
                        echo "No hay registros washo :(";
                    }
                }else{
                    echo "No se pudo encontrar la consulta";
                }
            ?>
        </tbody>
    </table>
    <br>
    <div class="col s12 m12 center">
        <a class="btn waves-light purple" href="<?php $urlweb ?>?modulo=admin_productos"><i class="material-icons left">desktop_mac</i>Administrador de Productos</a>
        <a class="btn waves-light blue" href="<?php $urlweb ?>?modulo=agregar_categoria"><i class="material-icons left">add_circle_outline</i>Agregar categorias</a>
    </div>
    <br>
</div>
<script>
    function eliminar2(idcategoria)
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_categorias.php?accion=eliminar2';
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                "idcategoria": idcategoria
            })
        })
        .then((response)=> response.json())
        .then((data)=> {
            console.log(data)
            const row = document.getElementById(idcategoria);
            row.remove();
            
        })
        .catch((error)=>{
            console.error(error);
        })
    }
</script>