<?php
global $mysqli;
global $urlweb;
?>
<h3 class="center">Administrador de Categorias</h3>
<table class="white centered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $strsql ="SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
            if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows >0){
                    $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                    while($stmt->fetch()){
                        ?>
                        <tr id="<?php echo $idproducto ?>">
                            <td><?php echo $nombre_producto?></td>
                            <td><?php echo $categoria ?></td>
                            <td><?php echo $descripcion?></td>
                            <td><img src="<?php echo $url_imagen?>" alt="" width="150px"></td>
                            <td><?php echo $precio ?></td>
                            <td><?php echo $cantidad ?></td>
                            <td><a href="<?php $urlweb ?>?modulo=editar_producto&idproducto=<?php echo $idproducto ?>" class="btn gray">Editar</a></td>
                            <td><a class="btn red" href="javascript:eliminar(<?php echo $idproducto?>)">Eliminar</a></td>
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
<a class="btn waves-light" href="<?php $urlweb ?>?modulo=agregar_producto">Agregar productos</a>

<a class="btn waves-light purple" href="<?php $urlweb ?>?modulo=admin_productos">Administrador de Productos</a>
<script>
    function eliminar(idproducto)
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                "idproducto": idproducto
            })
        })
        .then((response)=> response.json())
        .then((data)=> {
            console.log(data)
            const row = document.getElementById(idproducto);
            row.remove();
            
        })
        .catch((error)=>{
            console.error(error);
        })
    }
</script>