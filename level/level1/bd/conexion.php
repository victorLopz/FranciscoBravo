<?php

 class Conexion{
     public static function Conectar(){        
        // Recepción de los datos enviados mediante POST desde el JS   
        
        $valor = true;

        if($valor){
            define('servidor','localhost');
            define('nombre_bd','residencial');
            define('usuario','root');
            define('password',''); 
        }else{
            define('servidor','localhost');
            define('nombre_bd','u128272301_doshermanos_IV');
            define('usuario','u128272301_u122030778_vic');
            define('password','123456Root'); 
        } 
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
     
 }
?>