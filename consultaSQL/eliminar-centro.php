<?php
// esta clase es para habilitar el funcionamiento con la base de datos y conexion con el servidor
include("DataBaseClass.php");
//esta variable me permite invocar el variable $sql por que existe un instanciamente
$objDB=NULL;
// por medio del TRYCATH logro visualizar mis error y corregirlos
try{
    $cod_centro = $_POST['codC'] ;
    $desc_centro = $_POST['desC'];
    $tel = $_POST['tel'];
    $dir = $_POST['dir'];
    $cod_ciudad = $_POST['cod'];
//variable que permite la consulta en Mysql       
$sql= "delete from centro where cod_centro = " . $cod_centro;    
	   
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root','Sena2014'); 

$objDB->getInstance()->beginTransaction();
$objDB->getInstance()->exec($sql);
$objDB->getInstance()->commit();
// se utiliza para que nos lleve de regreso a la pagina principal	
header("location:index.php");
    exit;
	
	
}catch (PDOException $exc){
 $objDB->getInstance()->rollback();
 echo $exc->getMessage();
}
?>