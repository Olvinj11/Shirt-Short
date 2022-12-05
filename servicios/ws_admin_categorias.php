<?php
require "../config.php";
$accion = isset($_GET['accion']) ? $_GET['accion']:"default";

    switch($accion)
    {
        case "eliminar2":
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            if(isset($data)){
                $strsql = "DELETE FROM categorias WHERE idcategoria = ?";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idcategoria);
                $stmt->execute();
                if($stmt->errno ==0){
                    $text = "La categoria se elimino correctamente locoo siuuuu";
                }else{
                    $text = "No se pudo ejecutar la consulta washo :(";
                }
            }else{
                $text = "No se recibieron los parametros";
            }
            break;

        case "default":
        break;

    }

    $jsonreturn = array(
        "text" => $text
    );

    echo json_encode($jsonreturn)
?>