<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$valordeConsulta = (isset($_GET['valordeConsulta'])) ? $_GET['valordeConsulta'] : '';

switch($valordeConsulta){
    case 1:
            //$consulta = "SELECT * FROM `vistadeudas`";    
            $consulta = "SELECT
            fac.IDFactura AS IDFactura,
            fac.fechaEmision AS fechaEmision,
            fac.cliente AS cliente,
            fac.codigoRUCcedula AS codigoRUCcedula,
            fac.Total AS total,
            (
            SELECT
                SUM(
                    residencial.abonoshis.montoAbonado
                )
            FROM
                residencial.abonoshis
            WHERE
                residencial.abonoshis.idFactura = fac.IDFactura
        ) AS SumaAbonos,
        fac.Total -(
            SELECT
                SUM(
                    residencial.abonoshis.montoAbonado
                )
            FROM
                residencial.abonoshis
            WHERE
                residencial.abonoshis.idFactura = fac.IDFactura
        ) AS resta
        FROM
            residencial.factura fac
        WHERE
            fac.tipofac = 2 AND fac.Total -(
            SELECT
                SUM(
                    residencial.abonoshis.montoAbonado
                )
            FROM
                residencial.abonoshis
            WHERE
                residencial.abonoshis.idFactura = fac.IDFactura
        ) > 0";   
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;

    case 2:
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';
        $consulta = "SELECT * FROM abonoshis WHERE idFactura = $id";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $data['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data); //enviar el array final en formato json a JS
        $conexion = NULL;        
        break;

    case 3:
            $consulta = "select fac.IDFactura AS IDFactura,fac.fechaEmision AS fechaEmision,fac.cliente AS cliente,fac.codigoRUCcedula AS codigoRUCcedula,fac.Total AS total,(select sum(residencial.abonoshis.montoAbonado) from residencial.abonoshis where residencial.abonoshis.idFactura = fac.IDFactura) AS SumaAbonos,fac.Total - (select sum(residencial.abonoshis.montoAbonado) from residencial.abonoshis where residencial.abonoshis.idFactura = fac.IDFactura) AS resta from residencial.factura fac where fac.tipofac = 2 and fac.Total - (select sum(residencial.abonoshis.montoAbonado) from residencial.abonoshis where residencial.abonoshis.idFactura = fac.IDFactura) = 0";    
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;

    case 4:
            $consulta = "SELECT * FROM catalogodatos";    
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            $data1['data']= $resultado->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data1); //enviar el array final en formato json a JS
            $conexion = NULL;
        break;
}