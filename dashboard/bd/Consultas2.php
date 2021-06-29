<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_GET['valordeConsulta'])) ? $_GET['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:
            $consulta = "SELECT IDFactura, fechaEmision, cliente, total, total FROM factura WHERE tipofac=2";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            //$data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            //$conexion = NULL;
        break;
}