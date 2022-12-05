<?php
global $mysqli;
global $urlweb;
?>
<h3 class="center">Administrador de Categorias</h3>
<table class="white centered">
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
<a class="btn waves-light" href="<?php $urlweb ?>?modulo=agregar_categoria">Agregar categorias</a>

<a class="btn waves-light purple" href="<?php $urlweb ?>?modulo=admin_productos">Administrador de Productos</a>
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